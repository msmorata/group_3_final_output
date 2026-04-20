<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function getProducts()
    {
        return response()->json(Product::all(), 200);
    }

    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();

        return response()->json(['message' => 'Product created', 'data' => $product], 201);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id); // Laravel knows to use product_id because of our model
        if (!$product) return response()->json(['error' => 'Not found'], 404);

        $product->update($request->all());
        return response()->json(['message' => 'Product updated', 'data' => $product], 200);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['error' => 'Not found'], 404);

        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }

    public function getProductsWithCategories()
    {
        return response()->json(Product::with('category')->get(), 200);
    }

    public function getAnalytics()
    {
        $totalProducts = Product::count();
        $totalRevenue = Sale::sum('total_sales');
        $MonthlySales = Sale::sum('monthly_sales');
        $averageSales = Sale::avg('average_sales');

        $salesByProduct = Product::select('product_id', 'product_name')
            ->withSum('sales as total_lifetime_revenue', 'total_sales')
            ->withSum('sales as monthly_revenue', 'monthly_sales')
            ->withAvg('sales as average_revenue', 'average_sales')
            ->get()
            ->map(function ($product) {
                $product->total_lifetime_revenue = round($product->total_lifetime_revenue, 2);
                $product->monthly_revenue = round($product->monthly_revenue, 2);
                $product->average_revenue = round($product->average_revenue, 2);
                return $product;
            });
        return response()->json([
            'system_overview' => [
                'total_products_in_system' => $totalProducts,
                'total_lifetime_revenue' => round($totalRevenue, 2),
                'monthly_revenue' => round($MonthlySales, 2),
                'average_revenue' => round($averageSales, 2)
            ],
            'sales_breakdown' => $salesByProduct
        ], 200);
    }
}