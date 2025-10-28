<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function login(){
        return view('client.login');
    }

    public function register(){
        return view('client.register');
    }
}
