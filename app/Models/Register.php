<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PragmaRX\Google2FA\Exceptions\Contracts\Google2FA;
use PragmaRX\Google2FALaravel\Traits\Google2FAUser;


class Register extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'email', 'password', 'google2fa_secret'];

    
}
