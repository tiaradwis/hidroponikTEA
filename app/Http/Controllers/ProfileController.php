<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile() {
        $user = User::where('id', Auth::id())->first();

        return view('profileBuyer',compact('user'));
    }

    public function editProfile(Request $request) {

        $validator = Validator::make($request->all(), [
            
            'photo_profile' => [ 'image', 'mimes:jpeg,png,jpg,gif', 'max:5000'],
        
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
            $profile->alamat = $request->input('alamat');
            $profile->no_hp = $normalizedPhoneNumber;

            // if ($request->hasFile('photo_profile')) {
            //     $photo_profile = $request->file('photo_profile');
            //     $filenamex = $photo_profile->getClientOriginalName();
            //     $photo_profile->storeAs('public/images/profil', $filenamex);
            //     $profile->photo_profile = $filenamex;
            // }

            $profile->save();

            $user = User::where('id',Auth::id())->first();

            return redirect()->route('Profile', compact('user'))->with('success','Profil anda berhasil diubah');
        }
    }
}
