<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    public $incrementing = true;
    protected $primaryKey = 'category_id'; // Tells Laravel the custom ID name
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}