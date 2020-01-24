<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function create()
    {
        //
    }

       public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('users/profile',['user'=> $user]);
    }
    
     public function edit($id)
    {
       $user= User::findOrFail($id);
       
       $this->authorize($user);
       

    }
   
     public function update(Request $request, $id)
    {
        $user= User::findOrFail($id);
       
        $this->authorize($user);

        $user->update($request->all());

    }
    
    public function destroy($id)
    {
        //
    }
}
