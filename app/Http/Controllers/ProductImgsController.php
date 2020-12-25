<?php

namespace App\Http\Controllers;

use App\Product_imgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImgsController extends Controller
{


    public function store(Request $request){

        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('filename'))
        {

            $imgs=$request->file('filename');
            foreach($imgs as $image)
            {
                $store= new Product_imgs();
                $name=$image->getClientOriginalName();
                $newName= time() . $name;
                $image->move(public_path().'/images/productimgs/', $newName);
                $store->images=$newName;
                $store->product_id= $request['product_id'];

                $store->save();
            }
        }

        return back();
    }








}
