<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Products';
    protected $primaryKey = 'product_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['product_name', 'product_price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_id', 'product_id');
    }
}   