<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_categorie;

class ShopController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('Shop.shop', $data);
    }
}
