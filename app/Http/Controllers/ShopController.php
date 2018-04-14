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

    public function index(Request $request)
    {
        // Filter 1
        // if(request()->has('category_id'))
        // {
        //     $categories = Product_categorie::where('category_id', request('category_id'))
        //     ->paginate(9)
        //     ->appends('category_id', request('category_id'));
        // }
        // else
        // {
        //     $data['products'] = Product::paginate(9);
        // }

        //Filter 2
        $filterBy = $request->get('option');

        // switch ($filterBy)
        // {
        //     case "Elektronika":
        //     // Get product categorie ID by name
        //         $id = Product_categorie::where();
        //     // Filter products by categorie ID
        //         $data['products'] = Product::where('product', 'like', '%$id%');
        //         break;
        //     case "Datori":
        //         return 2;
        //         break;
        //     default:
        //         
        // }

        $data['products'] = Product::orderBy('published_at', 'desc')->paginate(9);
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