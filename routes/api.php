<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

// Every route inside this group requires the x-api-key header!
Route::middleware(['api.key'])->group(function () {
    
    // Lucero's CRUD Routes
    Route::get('/analytics/get_products', [AnalyticsController::class, 'getProducts']);
    Route::post('/analytics/create_product', [AnalyticsController::class, 'createProduct']);
    Route::put('/analytics/update_product/{id}', [AnalyticsController::class, 'updateProduct']);
    Route::delete('/analytics/delete_product/{id}', [AnalyticsController::class, 'deleteProduct']);

    // Baricanosa's Relationship Route
    Route::get('/analytics/get_products_with_categories', [AnalyticsController::class, 'getProductsWithCategories']);

    // Manaig's Analytics Route
    Route::get('/analytics/get_analytics', [AnalyticsController::class, 'getAnalytics']);

});