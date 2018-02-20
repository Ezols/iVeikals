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
        $data['units'] = ['KG', 'L'];
        return view('Products.addnew', $data);
    }

    public function submit($id = null)
    {
        //dd(request()->all());
        $data = request()->validate([
            'title' => 'required',
            'weight' => 'required|integer',
            'unit' => 'nullable',
            'price' => 'required|integer',
            //'img' => 'nullable|image',
            'manufacturing_date' => 'nullable',
            'best_before_date' => 'nullable',
        ]);
        


        $product = $id ? Product::find($id) : new Product;

        $product->title = $data['title'];
        $product->weight = $data['weight'];
        $product->unit = $data['unit'];
        $product->price = $data['price'];
        //$product->img = $data['img'];
        $product->manufacturing_date = $data['manufacturing_date'];
        $product->best_before_date = $data['best_before_date'];
        $product->save();

    }
    
}
