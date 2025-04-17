<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthControllerWeb extends Controller
{
    public function index()
    {
        return view('Auth');
    }
    public function store(Request $request)
    {
        $validData = $request->validate(['email' => 'email|required', "password" => 'required']);
        if (Auth::attempt($validData)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/category');
        }

        return back()->withErrors([
            'email' => 'Неверные данные для входа.',
        ]);
    }
}
