<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function addUser()
   {
       return view('SimpleEcomerce.UserAdd.add_user');
   }
    public function newUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->remember_token = str_random(10);
        $user->save();
        return redirect('/user/add')->with('status','User added Successfully');
    }
}
