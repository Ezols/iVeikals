<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $data['Products'] = Product::all();
        
        return view('Products.products', $data);
    }

    public function addnew()
    {
        return view('Products.addnew');
    }

    
}
