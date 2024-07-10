<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name_es', 'name_en', 'price','description_es','description_es', 'image','category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
}
