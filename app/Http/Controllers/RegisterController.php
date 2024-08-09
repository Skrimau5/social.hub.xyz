<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FAQRCode\Google2FA;
use Illuminate\Support\Facades\Mail;
use App\Mail\Google2faSecretMail;

class RegisterController extends Controller
{
    public function index()
    {
        session_start();

        if (session('dataUsers') != null) {
            return redirect('/schedules');
        }
        return view('form');
    }

    public function enviarCodigo2FA($email, $codigo2fa)
    {
        try {
            Mail::to($email)->send(new Google2faSecretMail($codigo2fa));
            return true; // Éxito al enviar el correo
        } catch (\Exception $e) {
            \Log::error('Error al enviar el correo: ' . $e->getMessage());
            return false; // Error al enviar el correo
        }
    }
    

 
            public function store(Request $request)
        {
            $message = "¡Guardado con éxito!";

            $google2fa = app('pragmarx.google2fa');
            $dataUsers = $request->except('_token');
            $dataUsers['google2fa_secret'] = $google2fa->generateSecretKey();
            session(['dataUsers' => $dataUsers]); // Almacenar los datos en la sesión

            $twoFa = new Google2FA();
            $key = $twoFa->generateSecretKey();
            $QR_Image = $twoFa->getQRCodeInline(
                config('app.name'),
                $dataUsers['email'],
                $dataUsers['google2fa_secret']
            );

            // Guardar el usuario en la base de datos
            Register::insert($dataUsers);

            // Enviar el código 2FA por correo
            $this->enviarCodigo2FA($dataUsers['email'], $dataUsers['google2fa_secret']);

            // Mostrar el código QR al usuario
            return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $dataUsers['google2fa_secret']]);
        }

}

    
