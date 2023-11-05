<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(): View
    {

        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'login' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|max:12',
        ]);
    
        $user = new User();
        $user->login = $request->input('login');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user';
        $user->save();
    
        // Зберегти ID користувача в сесії
        $request->session()->put('user', $user);
        $request->session()->put('user_id', $user->id); // Зберегти ID користувача в сесії
    
        return redirect('/')->with('success', 'Реєстрація пройшла успішно!');
    }

}
