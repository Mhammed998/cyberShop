<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    // function to redirect to users view

    public function index(){
        $users= User::all();
        $pending=User::where('status','=','not-approved');
        return view('dashboard.users.index',['users'=>$users]);
    }


    //function to display profile user

    public function show($id){
        $user=User::find($id);
        return view('dashboard.users.show',['user'=>$user]);
    }

    // delete user function

    public function delete($id){
        $user=User::find($id);
        $user->delete();

        return back();
    }




    // search user by name

    public function search(Request $request){
        $name= $_GET['username'];
        $user= User::where('name','LIKE','%'.$name.'%')->get();

        return view('dashboard.users.search',['user'=>$user]);
    }


    // Approve function

    public function Approved(Request $request ,$id ){
        $user = User::find($id);
        $user->status = "approved";
        $user->save();

        session()->flash('success','User has been  approved successfully');

        return back();
    }

    // Convert to Admin

    public function BeAdmin(Request $request ,$id ){
        $user = User::find($id);
        $user->role = "admin";
        $user->save();

        session()->flash('success','User has been promoted successfully');

        return back();
    }

    // cancel to Admin role

    public function CancelAdmin(Request $request ,$id ){
        $user = User::find($id);
        $user->role = "user";
        $user->save();
        session()->flash('success','User has been canceled from promotion successfully');

        return back();
    }



    //Update user function
     public function update(Request $request , $id){
        $user=User::find($id);
        $data=$request->validate([
            'name' => 'required|string|min:4|max:20',
            'email' => 'email|required',
            'phone' => 'string|min:11|max:30',
            'facebook' => 'url',
            'about' => 'string|min:20|max:600'

        ]);

             $user->update($data);

             session()->flash('success','Your data has been updated successfully');

        return back();
     }


}
