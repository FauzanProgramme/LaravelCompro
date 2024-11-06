<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login.index');
    }
    public function aksi_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            ]);
            $credentials = $request->only(['email', 'password']);
            //mengecek email dan password
            if (Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->route('backend.blog');
            }
            return redirect()->back()->with('error', 'Email atau Password salah');
    }
}
