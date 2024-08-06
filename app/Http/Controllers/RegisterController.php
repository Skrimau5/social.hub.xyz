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

        if ($_SESSION != null) {
            return redirect('/schedules');
        }
        return view('form');
    }

    public function enviarCodigo2FA($correo, $codigo2fa)
    {
        try {
            Mail::to($correo)->send(new Google2faSecretMail($codigo2fa));
            return true; // Éxito al enviar el correo
        } catch (\Exception $e) {
            return false; // Error al enviar el correo
        }
    }

    public function store(Request $request)
    {
        $message = "¡Guardado con éxito!";

        $google2fa = app('pragmarx.google2fa');
        $dataUsers = $request->except('_token');
        $dataUsers['google2fa_secret'] = $google2fa->generateSecretKey();
        $request->session('dataUsers', $dataUsers);

        $twoFa = new Google2FA();
        $key = $twoFa->generateSecretKey();
        $QR_Image = $twoFa->getQRCodeInline(
            config('app.name'),
            $dataUsers['email'],
            $dataUsers['google2fa_secret']
        );

        Register::insert($dataUsers);

        $this->enviarCodigo2FA($dataUsers['email'], $dataUsers['google2fa_secret']);

        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $dataUsers['google2fa_secret']]);
    }

    public function completeRegistration()
    {
        $session = session()->get('key');
        return view('google2fa.index', $session);
    }
}
