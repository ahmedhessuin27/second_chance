<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $category=Category::all();
        $products = Product::with('category')->get();
        return view('front.index',compact('category' , 'products'));
    }
}
