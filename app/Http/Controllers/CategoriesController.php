<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function index(){
        $allCates=Category::all();
        $categories=Category::all()->where('parent_id',0);
        $subcates=Category::all();
        return view('dashboard.categories.index' , ['categories' => $categories,
            'allCates'=>$allCates,
            'subcates' =>$subcates
            ]);
    }


    public function show($id){
        $category=Category::findOrFail($id);
        return view('dashboard.categories.show' , ['category' => $category]);
    }




    public function delete($id){
        $cate=Category::find($id);
        $cate->delete();
        session()->flash('success','Category has been deleted successfully');

        return back();
    }



    public function create(){
        return view('dashboard.categories.create');
    }

    public function store(Request $request){

        $this->validate(request(),[
            'cate_name' => 'string|unique:categories|min:4|max:100|required',
            'cate_desc' => 'string|min:10|max:300|required'
        ]);

        $new= New Category;
        $new->cate_name= $request['cate_name'];
        $new->cate_desc= $request['cate_desc'];
        $new->parent_id=$request['parent_id'];
        $new->save();
        session()->flash('success','Category has been added successfully');

        return redirect(route('categories.index'));

    }


    public function update(Request $request , $id){

       $data= $this->validate(request(),[
            'cate_name' => 'string|unique:categories|min:4|max:100|required',
            'cate_desc' => 'string|min:10|max:300|required'
        ]);

        $new=Category::findOrFail($id);
        $new->update($data);
        session()->flash('success','category has been updated successfully');
        return redirect(route('categories.index'));
    }























}
