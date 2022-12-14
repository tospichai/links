<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index(Request $request,$username)
    {
        $data = User::where('username',$username)->first();

        return View('display.index',compact('data'));
    }
}
