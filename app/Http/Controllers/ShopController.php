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
        $data['cartProducts'] = Cart::find('1')->toArray();
        return view('Shop.shop', $data);
    }

    public function category($id)
    {
        $data['categories'] = Product_categorie::orderBy('title', 'asc')->get();
        $data['products'] = Product::where('category_id', $id)->paginate(9);
        return view('Shop.shop', $data);
    }

    public function search(Request $request)
    {
        $data['categories'] = Product_categorie::orderBy('title', 'asc')->get();

        if(($term = $request->get('term')))
        {
            $data['products'] = Product::where('title', 'like', '%'. $term . '%')->paginate(9);
        }

        return view('Shop.shop', $data);
    }

    public function addToCart()
    {  
        
        $data = request()->validate([
            'id' => 'required|exists:products,id'
        ]);

        $cart = Cart::findOrNew(1);

        if (Auth::id())
        {
            $product = Product::find($data['id']);
            $cart->addProduct($product, 1);
            $cart->user_id = Auth::id();
            $cart->save();
        }
        else
        {
            $product = Product::find($data['id']);
            $cart->addProduct($product, 1);
            $cart->user_id = mt_rand(0,10000000);
            $cart->save();
        }
       
        // request()->cookie('cartId')
        // Todo

        return redirect()->back()->cookie(
            'cartId', mt_rand(0,10000000)
        );
    }

    public function shoppingCart()
    {
        return view('Shop.shoppingcart');
    }

    public function delivery()
    {
        return 5;
    }

    public function contacts()
    {
        return view('about.contacts');
    }
}