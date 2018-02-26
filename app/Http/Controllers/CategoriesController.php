<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_categorie;

class CategoriesController extends Controller
{
    public function index()
    {
        $data['categories'] = Product_categorie::all();
        return view('categories.index', $data);
    }

    public function newEdit($id = null)
    {
        $data['id'] = $id;
        $data['categorie'] = $id ? Product_categorie::find($id) : new Product_categorie;
        return view('categories.newEdit', $data);
    }

    public function submit($id = null)
    {
        $data = request()->validate([
            'title' => 'required|max:255',
        ]);

        $categorie = $id ? Product_categorie::findOrFail($id) : new Product_categorie;

        $categorie->title = $data['title'];
        $categorie->save();

        return redirect()->route('categories');
    }
}
