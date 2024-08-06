<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        session_start();

        if ($_SESSION != null) {
            return redirect('/schedules');
        }
        return view('login');
    }

    public function validateUser(Request $request)
    {
        $message = "¡Error de datos!";
        $email = request('email');
        $password = request('password');
        $otp = request('google2fa_secret');

        $dataUser = Register::where('email', $email)
                            ->where('password', $password)
                            ->where('google2fa_secret', $otp)
                            ->first();

        session_start();

        if ($dataUser) {
            $request->session()->put('key', $dataUser);
            $_SESSION['Hola'] = 'Hola';
            return redirect('/');
        } else {
            return redirect('/')->with('status', $message);
        }
    }
}
