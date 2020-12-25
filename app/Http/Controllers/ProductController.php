<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('dashboard.products.index', ['products' => $products,
            'categories' => $categories


            ]);
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('dashboard.products.show', ['product' => $product , 'categories'=> Category::all()]);
    }



    public function allow($id){
        $product=Product::findOrFail($id);
        $product->allow="yes";
        $product->save();

        return redirect(route('products.index'));

    }
    // search user by name

    public function search(Request $request)
    {
        $p = $_GET['product_name'];
        $product = Product::where('product_name', 'LIKE', '%' . $p . '%')->get();

        return view('dashboard.products.search', ['product' => $product]);
    }




    public function searchForProduct(Request $request)
    {
        $q= $_GET['product_name'];
        $searchProduct =Product::where('product_name','LIKE','%'. $q .'%')->get();;
        return view('frontend.products.search', ['searchProduct' => $searchProduct]);

    }

    public function searchByTags($tag){
        $allTags= DB::Table('products')->select('tags')->distinct()->get()->toArray();

            $productsTag = Product::where('tags', 'LIKE', '%' . $tag . '%')->get();
            return view('frontend.products.search-tag', ['productsTag' => $productsTag]);

    }






    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('success', 'Product has been deleted successfully');
        return back();
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'string|min:4|max:300|required',
            'product_desc' => 'string|min:10|max:100000|required',
            'product_price' => 'string|required|max:1000000',
            'quantity' => 'string|max:1000',
            'category_id' => '',
            'tags' => 'string|max:100|min:2'

        ]);



        $new = Product::create([
            'product_name' => $request['product_name'],
        'product_desc' =>  $request['product_desc'],
        'product_price' => $request['product_price'],
        'quantity' => $request['quantity'],
        'category_id' => $request['category_id'],
            'tags' =>$request['tags']
        ]);

        session()->flash('success','Product has been added successfully');
        return redirect(route('products.index'));
    }


    public function update(Request $request , $id){

        $data=$this->validate($request, [
            'product_name' => 'string|min:4|max:300|required',
            'product_desc' => 'string|min:10|max:100000|required',
            'product_price' => 'string|required|max:1000000',
            'quantity' => 'string|max:1000',
            'category_id' => '',
            'tags' => 'string|max:100|min:2'

        ]);

        $product=Product::find($id);

        $product->update($data);

        session()->flash('success','Product has been Updated successfully');

        return redirect(route('products.index'));
    }











}
