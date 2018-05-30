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
        $userId = Auth::id() ? Auth::id() : request()->session()->get('guestId');
        $cart =  Cart::where('user_id', $userId)->first();
        $cartIds = $cart ? array_keys($cart->products) : [];
        
        $cartProducts = Product::whereIn('id', $cartIds)->get()->toArray();

        foreach($cartProducts as $key =>  $product)
        {
            $cartProducts[$key]['quantity'] = $cart->products[$product['id']];
        } 

        $data['categories'] = Product_categorie::orderBy('title', 'asc')->get();
        $data['products'] = Product::orderBy('published_at', 'desc')->paginate(9);
        $data['cartProducts'] = $cartProducts;

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
        $userId = Auth::id();
        $request = request();
       
        $data = $request->validate([
            'id' => 'required|exists:products,id'
        ]);
        
        if (!$userId)
        {
            $guestId = $request->session()->get('guestId');
            if(!$guestId) {
                $guestId = 'guest'.mt_rand(0,10000000);
                $request->session()->put('guestId', $guestId);
            }
            
            $userId = $guestId;
        }

        
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        $product = Product::find($data['id']);

        $cart->addProduct($product, 1);

        
        $cart->save();

        return redirect()->back();
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