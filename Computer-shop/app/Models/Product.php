<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'about',
        'price',
        'category_id',
        'photo'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
    public function basket() 
    {
        return $this->belongsTo(Basket::class);
    }
}
