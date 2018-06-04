<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Product_categorie;
use Session;
use Auth;


### Veciit vajag tad uztaisit, lai defaulta useris ir parasts useris un pec vajadzibas nomainit uz administratoru
# ee uzprasi nikitam ka iztikt bez paginate, tipa, kad scroolo uz leju, tad paradas jaunie itemi

class ShopController extends Controller
{

    public function index()
    {
        $userId = Auth::id() ? Auth::id() : request()->session()->get('guestId');
        $cart =  Cart::where('user_id', $userId)->first();
        $cartIds = $cart ? array_keys($cart->products) : [];
        
        $cartProducts = Product::whereIn('id', $cartIds)->get()->toArray();
        $finalCartPrice = 0;

        foreach($cartProducts as $key => $product)
        {
            $q =  $cart->products[$product['id']];
            $cartProducts[$key]['quantity'] = $q;
            $finalCartPrice += $product['price']*$q;
        } 

        $data['categories'] = Product_categorie::orderBy('title', 'asc')->get();

        $data['products'] = Product::orderBy('published_at', 'desc')->paginate(9);
        $data['cartProducts'] = $cartProducts;
        $data['finalCartPrice'] = round($finalCartPrice, 2);
        
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

    public function removeFromCart()
    {
        $id = request()->id;
       
        $userId = Auth::id() ? Auth::id() : request()->session()->get('guestId');
  
        $cart =  Cart::where('user_id', $userId)->first();
        
        $newProducts = array_filter($cart->products, function($key) use ($id) {
            return $key != $id;
        }, ARRAY_FILTER_USE_KEY);

        $cart->products = $newProducts;
        $cart->save();

        return back();
    }

    public function shoppingCart()
    {
        $userId = Auth::id() ? Auth::id() : request()->session()->get('guestId');
        $cart =  Cart::where('user_id', $userId)->first();
        $cartIds = $cart ? array_keys($cart->products) : [];
  
        $cartProducts = Product::whereIn('id', $cartIds)->get()->toArray();
        $finalCartPrice = 0;

        foreach($cartProducts as $key =>  $product)
        {
            $q =  $cart->products[$product['id']];
            $cartProducts[$key]['quantity'] = $q;
            $finalCartPrice += $product['price']*$q;
        } 

        $data['cartProducts'] = $cartProducts;
        $data['finalCartPrice'] = round($finalCartPrice, 2);
        

        return view('Shop.shoppingcart', $data);

    }

    public function delivery()
    {
        $userId = Auth::id() ? Auth::id() : request()->session()->get('guestId');
        $cart =  Cart::where('user_id', $userId)->first();
        $cartIds = $cart ? array_keys($cart->products) : [];
  
        $cartProducts = Product::whereIn('id', $cartIds)->get()->toArray();
        $finalCartPrice = 0;

        foreach($cartProducts as $key =>  $product)
        {
            $q =  $cart->products[$product['id']];
            $cartProducts[$key]['quantity'] = $q;
            $finalCartPrice += $product['price']*$q;
        } 

        $data['cartProducts'] = $cartProducts;
        $data['finalCartPrice'] = round($finalCartPrice, 2);

        return view('about.delivery', $data);
    }

    public function contacts()
    {
        $userId = Auth::id() ? Auth::id() : request()->session()->get('guestId');
        $cart =  Cart::where('user_id', $userId)->first();
        $cartIds = $cart ? array_keys($cart->products) : [];
  
        $cartProducts = Product::whereIn('id', $cartIds)->get()->toArray();
        $finalCartPrice = 0;

        foreach($cartProducts as $key =>  $product)
        {
            $q =  $cart->products[$product['id']];
            $cartProducts[$key]['quantity'] = $q;
            $finalCartPrice += $product['price']*$q;
        } 

        $data['cartProducts'] = $cartProducts;
        $data['finalCartPrice'] = round($finalCartPrice, 2);

        return view('about.contacts', $data);
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function submitOrder()
    {
        request()->session()->flush();
        return view('about.thankyou');
    }
}

