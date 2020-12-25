<?php

namespace App;
use App\Product_imgs;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use  App\Tag;
class Product extends Model
{
    protected $fillable=['product_name','product_desc','product_price','product_status','allow',
        'products_imgs','quantity','category_id','tags'];


    public function productImgs(){
        return $this->hasMany(Product_imgs::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }




}
