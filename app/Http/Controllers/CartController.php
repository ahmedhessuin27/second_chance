<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartRepository $cart)
    {
       
        $items=$cart->get();
        return view('front.all_cart',compact('items'));
    }


    public function store(Request $request , CartRepository $cart)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'nullable|integer',
        ]);
        $product=Product::findOrFail($request->product_id);
        $cart->add($product,$request->quantity);
        return to_route('carts.index');
    }

    public function update(Request $request,CartRepository $cart)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'nullable|integer',
        ]);
        $product = Product::findOrFail($request->product_id);
        $cart->update($product, $request->quantity);
        return to_route('carts.index');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartRepository $cart,$id)
    {
        $cart->delete($id);
    }
}
