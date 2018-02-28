<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_categorie;
use Image;

class ProductsController extends Controller
{  
    const UNITS = ['KG', 'L'];

    public function index()
    {
        $data['products'] = Product::all();        
        return view('products.products', $data);
    }

    public function newEdit($id = null)
    {
        $product = $id ? Product::findOrFail($id) : new Product;
        $data['product'] = $product;
        $data['id'] = $id;
        $data['units'] = static::UNITS;
        $data['categories'] = Product_categorie::select(['title', 'id'])->get()->mapWithKeys(function($cat) { return [$cat->id => $cat->title]; });
        return view('products.newEdit', $data);
    }

    public function submit($id = null, Request $request)
    {
        //dd(request()->all());
        $data = request()->validate([
            'title' => 'required|max:255',
            'weight' => 'required|integer',
            'unit' => 'required',
            'category_id' => 'required|exists:product_categories,id',
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
        $product->category_id = $data['category_id'];
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
