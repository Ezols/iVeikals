<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id'];

    protected $casts = [
        'products' => 'array',
    ];

    public function addProduct(Product $newProduct, $quantity)
    {
        $products = $this->products ?: [];

        // 1. Atrast no produktu saraksta, produktu pec id vai nav pievienots un dabu countu cik tadas preces pievienots
        $existingQuantity = array_get($products, $newProduct->id, 0);
        // 2. Pieksaitit jauno quantity klat esošajam
        $newQuantity = $existingQuantity + $quantity;
        // 3. Saglabat produktu saraksta jauno quantity
        $products[$newProduct->id] = $newQuantity;

        $this->products = $products;
    }    
}

