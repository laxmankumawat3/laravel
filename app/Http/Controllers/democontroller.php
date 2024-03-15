<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class democontroller extends Controller
{
    //make a public function to view 
    public function index(){
        echo"index";
        return view("demo");
    }
}
