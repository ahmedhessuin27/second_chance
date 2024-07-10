<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::all();
        return view('dash.products.all',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategories=Category::all(['id','name']);
        return view('dash.products.add',compact('allcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_es' => 'required|unique:categories,name',
            'name_en' => 'required|unique:categories,name',
            'description_es' => 'required|unique:categories,name',
            'description_en' => 'required|unique:categories,name',
            'price' => 'required|numeric',
            'image' => 'image|mimes:png,jpg',
            'caregory_id'=> 'nullable|exists:App\Models\Category',
        ]);
        $requested_data = $request->except('image');
        if ($request->file('image')) {

            $imagename = uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))->resize(442, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/product/' . $imagename));

            $requested_data['image'] = $imagename;
        }
        Product::create($requested_data);
        return to_route('dashboard.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $allcategories = Category::all(['id', 'name']);

        return view('dash.products.edit',compact('product', 'allcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
