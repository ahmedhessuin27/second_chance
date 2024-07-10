<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('front.index',compact('category'));
    }
}
