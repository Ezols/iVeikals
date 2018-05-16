<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_categorie;
use Image;
use Carbon\Carbon;

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
       // dd(request()->all());
        $data = request()->validate([
            'title' => 'required|max:255',
            'weight' => 'required|integer',
            'unit' => 'required',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'required|numeric',
            'img' => 'nullable|image',
            'manufacturing_date' => 'required|date',
            'best_before_date' => 'required|date',
            'published_at' => 'required|date',
        ]);          
    
 

        $product = $id ? Product::findOrFail($id) : new Product;
    
        if($request->hasFile('img'))
        {
            $img = $request->file('img');
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $fileName));
            Image::make($img)->resize(180, 120)->save(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . $fileName));
            $Thumbnail = Image::make($img)->resize(26, 26)->save(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $fileName));
            $product->img = $fileName;
        }
      
        $product->category_id = $data['category_id'];
        $product->title = $data['title'];
        $product->weight = $data['weight'];
        $product->unit = $data['unit'];
        $product->price = $data['price'];
        $product->manufacturing_date = $data['manufacturing_date'];
        $product->best_before_date = $data['best_before_date'];
        $published_at = Carbon::parse($data['published_at']);
        $product->published_at = $published_at->format('Y-m-d G:i:s');

        $product->save();
   
        return redirect()->route('products');

    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete($id);
        return redirect()->route('products');
    }
    
}
