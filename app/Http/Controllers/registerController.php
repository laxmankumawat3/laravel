<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    //
    public function index(){
        return view('form');
    }
    
    public function login1(){
        return view('login');
    }
    public function login2(Request $request){
      
        $request->validate([
            'email'=> 'required | email',
            'password'=> 'required',
        ]);
        echo "<pre>";
        print_r($request->all());
    }

    public function register(Request $request)  {

        $request->validate([
            'email'=> 'required | email',
            'password'=> 'required',
        ]);
        echo "<pre>";
        print_r($request->all());
    }
}
