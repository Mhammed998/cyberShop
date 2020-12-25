<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    public function index(){
        $users= User::all();
        $sampleUser=User::paginate(6)->where('role','user');
        $categories=Category::all();
        $sampleCates=Category::paginate(5);
        $products=Product::all();
        $sampleProducts=Product::paginate(5)->where('allow','yes');
        $orders= Order::all();
        $sampleOrder=Order::paginate(5);
        $ptags= DB::Table('products')->select('tags')->get();

        return view('dashboard.index',['users'=>$users
            , 'SampleUsers' =>$sampleUser,
            'categories'=>$categories,
            'SampleCates'=>$sampleCates,
            'SampleProducts'=>$sampleProducts,
            'products'=>$products,
            'orders' =>$orders,
            'SampleOrder'=>$sampleOrder,
            'ptags' =>$ptags

            ]);
    }










}
