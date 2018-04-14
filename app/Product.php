<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $dates = [
        'published_at'
    ];
     
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (int) ($value * 100);
    }

    public function getPriceAttribute()
    {
        return array_get($this->attributes, 'price', 0) / 100;
    }

}