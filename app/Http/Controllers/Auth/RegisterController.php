<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp' => ['required','min:11']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $phone_old = $data['no_hp'];
        $normalizedPhoneNumber = '';

        if (Str::startsWith($phone_old, '0')) {
            if (strpos($phone_old, '-') !== false || strpos($phone_old, '+') !== false) {
                $normalizedPhoneNumber1 = '62' . ltrim($phone_old, '0');
                $normalizedPhoneNumber = str_replace(['-', '+'], '', $normalizedPhoneNumber1);
            } else {
                $normalizedPhoneNumber = '62' . ltrim($phone_old, '0');
            }
        } else { 
            if (strpos($phone_old, '-') !== false || strpos($phone_old, '+') !== false) {
                $normalizedPhoneNumber = str_replace(['-', '+'], '', $phone_old);
            } else {
                $normalizedPhoneNumber = $data['no_hp'];
            }
        }

        return $user = User::create([
            'nama_lengkap' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_hp' => $normalizedPhoneNumber,
            'is_seller' => $data['is_seller'],
            'photo_profile' => 'mother.png'
        ]);



    }
}
