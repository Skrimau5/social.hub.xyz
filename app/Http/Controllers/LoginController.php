<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Register;
use Illuminate\Http\Request;

use PragmaRX\Google2FA\Google2FA;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer as BaconQrCodeWriter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        if ($_SESSION != null) {
            return redirect('/schedules');
        }
        return view('login');
    }

    /**
     * Funcion para validar los datos del usuario
     */

    public function validateUser(Request $request)
    {

        $message = "¡Error de datos!";
        $email = request('email');
        $password = request('password');

        //Tomar los datos delabase de datos
        $dataUser = Register::all()
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->toArray();

        session_start();

        if ($dataUser) {
            $request->session()->put('key', $dataUser);

            $_SESSION['Hola'] = 'Hola';

            return redirect('/schedules');
        } else {

            return redirect('/')->with('status', $message);
        }
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
