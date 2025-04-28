<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::user()->role === 'etudiant') {
            return '/mes-requetes';
        } elseif (Auth::user()->role === 'agent') {
            return '/agent/assigned-requests';
        }elseif (Auth::user()->role === 'responsable') {
            return '/responsable/requests';
        }else{
            return '/home'; // ou une autre route selon ton besoin
        }
    }

}
