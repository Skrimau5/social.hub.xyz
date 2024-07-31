<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(){
        session_start();
        session_destroy();

        return redirect('/');
    }
}
