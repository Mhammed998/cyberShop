<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=Category::all();
        $products=Product::orderBy('created_at','DESC')->where('allow', 'yes')->paginate(16);
        $tags= DB::Table('products')->select('tags')->distinct()->get();
        return view('home',['categories'=>$categories,
            'products'=>$products,
            'tags' => $tags

            ]);
    }

    public function singleProduct($id){
        $product=Product::findOrFail($id);
        return view('frontend.products.show', ['product' => $product]);
    }



    public function getCategory($id){
        $category=Category::findOrFail($id);
        $categories=Category::all();
        return view('frontend.category',['category'=>$category,'categories'=>$categories]);
    }



    public function showProfile($id){
        $user=User::findOrFail($id);
        return view('frontend.profile',['user'=>$user]);
    }



}








