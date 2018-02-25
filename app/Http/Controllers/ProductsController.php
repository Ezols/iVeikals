<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;

class ProductsController extends Controller
{  
    const UNITS = ['KG', 'L'];

    public function index()
    {
        $data['products'] = Product::all();        
        return view('products.products', $data);
    }

    public function addnew()
    {
        $data['units'] = static::UNITS;
        return view('products.addnew', $data);
    }

    public function edit($id)
    {
        $data['units'] = static::UNITS;
        $data['product'] = Product::findOrFail($id);
        return view('products.edit', $data);
    }

    public function submit($id = null, Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'weight' => 'required|integer',
            'unit' => 'required',
            'price' => 'required|integer',
            'img' => 'nullable|image',
            'manufacturing_date' => 'required|date',
            'best_before_date' => 'required|date',
        ]);             

        $product = $id ? Product::findOrFail($id) : new Product;

        if($request->hasFile('img'))
        {
            $img = $request->file('img');
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $fileName));
            $Thumbnail = Image::make($img)->resize(26, 26)->save(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $fileName));
            $product->img = $fileName;
        }

        // Do this
        $product->category_id = 5;
        $product->title = $data['title'];
        $product->weight = $data['weight'];
        $product->unit = $data['unit'];
        $product->price = $data['price'];
        $product->manufacturing_date = $data['manufacturing_date'];
        $product->best_before_date = $data['best_before_date'];
        $product->save();

        return redirect()->route('products');
    }
    
}
