<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(): View
    {

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:12',
        ]);

        $user = User::where('login', $request->input('login'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('login')->with('error', 'Неправильный логин или пароль');
            
        }

        if (auth()->check()) {
            $userId = auth()->user()->id;
            session(['user_id' => $userId]);
        }

        $request->session()->put('user', $user);
        $request->session()->put('user_id', $user->id); // Зберегти ID користувача в сесії

        return redirect()->route('home');
    }

    public function logout(Request $request): RedirectResponse
    {
    $request->session()->flush();

    return redirect()->route('login');
    }

}
