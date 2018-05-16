<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Product_categorie;
use Session;
use Auth;

class ShopController extends Controller
{

    public function index()
    {
        $data['categories'] = Product_categorie::orderBy('title', 'asc')->get();
        $data['products'] = Product::orderBy('published_at', 'desc')->paginate(9);
        return view('Shop.shop', $data);
    }

    public function category($id)
    {
        $data['categories'] = Product_categorie::orderBy('title', 'asc')->get();
        $data['products'] = Product::where('category_id', $id)->paginate(9);
        return view('Shop.shop', $data);
    }

    public function addToCart()
    {
       
        $data = request()->validate([
            'id' => 'required|exists:products,id'
        ]);
 
        // request()->cookie('cartId')
        // Todo
        $cart = Cart::findOrNew(1);

        $product = Product::find($data['id']);

        $cart->addProduct($product, 1);
        $cart->save();

        return redirect()->back()->cookie(
            'cartId', mt_rand(0,10000000)
        );
    }

    public function shoppingCart()
    {
        return view('Shop.shoppingcart');
    }

}