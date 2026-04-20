<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'Sales';
    public $incrementing = true;
    protected $primaryKey = 'sales_id';
    public $timestamps = false;
    protected $fillable = ['product_id', 'total_sales', 'monthly_sales', 'average_sales'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}