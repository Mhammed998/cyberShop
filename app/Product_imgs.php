<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Product_imgs extends Model
{

    protected $fillable=['images','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }









}
