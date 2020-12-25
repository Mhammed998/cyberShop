<?php

namespace App;
use App\SubCategory;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['cate_name','cate_desc','status','parent_id'];


     public function products(){
         return $this->hasMany(Product::class);
     }







}
