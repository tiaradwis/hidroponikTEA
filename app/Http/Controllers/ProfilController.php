<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profil()
    {
        $data = User::where('id',Auth::id())->first();
        
        return view('seller/Profil',compact('data'));
    }

    public function updateProfil(Request $request) {

        $validator = Validator::make($request->all(), [
            
            'photo_profile' => [ 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'no_hp' =>['required','numeric','min:11']
        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else { 
            $phone_old = $request->input('no_hp');
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
                    $normalizedPhoneNumber = $request->input('no_hp');
                }
            }

            $profile = User::where('id',Auth::id())->first();
            $profile->nama_lengkap = $request->input('nama_lengkap');
            $profile->nama_toko = $request->input('nama_toko');
            $profile->no_hp = $normalizedPhoneNumber;
            $profile->alamat_toko = $request->input('alamat_toko');
            $profile->lokasi_toko = $request->input('lokasi_toko');
            $profile->deskripsi = $request->input('deskripsi_toko');

            if ($request->hasFile('photo_profile')) {
                $photo_profile = $request->file('photo_profile');
                $filenamex = $photo_profile->getClientOriginalName();
                $photo_profile->storeAs('public/images/profil', $filenamex);
                $profile->photo_profile = $filenamex;
            }

            $profile->save();

            $data = User::where('id',Auth::id())->first();

            return redirect()->route('Profil', compact('data'));
        }
    
    }
}
