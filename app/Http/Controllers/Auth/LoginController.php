<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    
    public function login(Request $request)
{
    $input = $request->all();
    $this->validate($request, [
        'username' => 'required|string', //VALIDASI KOLOM USERNAME
        //TAPI KOLOM INI BISA BERISI EMAIL ATAU USERNAME
        'password' => 'required|string|min:6',
    ]);

    //LAKUKAN PENGECEKAN, JIKA INPUTAN DARI USERNAME FORMATNYA ADALAH EMAIL, MAKA KITA AKAN MELAKUKAN PROSES AUTHENTICATION MENGGUNAKAN EMAIL, SELAIN ITU, AKAN MENGGUNAKAN USERNAME
    if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))){
    if (auth()->user()->jabatan == 'kasir') {
        return redirect()->route('kasir');
    }elseif (auth()->user()->jabatan == 'kabeng'){
        return redirect()->route('kabeng');
    }elseif (auth()->user()->jabatan == 'management'){
        return redirect()->route('management');
    }elseif (auth()->user()->jabatan == 'sparepart'){
        return redirect()->route('sparepart');
    }
    }else{
    return redirect()->route('login')
        ->with('error','Email-Address And Password Are Wrong.');
}
  
}
}