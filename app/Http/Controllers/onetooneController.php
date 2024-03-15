<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

use App\Models\Members;

class onetooneController extends Controller
{
    //
    public function index(){
        return Members::with('getGroups')->get();
        // return Members::find(1)->getGroups;

    }
    public function group(){
        return Groups::with('member')->get();
    }
}
