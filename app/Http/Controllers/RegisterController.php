<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'card_number' => 'required|string|unique:users',
            'phone' => 'required|string|unique:users',
            'login' => 'required|string|unique:users',
            'password' => 'required|string',
            'role' => 'required|in:user,admin',
        ]);

        $user = new User();
        $user->card_number = $data['card_number'];
        $user->phone = $data['phone'];
        $user->login = $data['login'];
        $user->password = bcrypt($data['password']);
        $user->role = $data['role'];

        if ($request->has('seed')) {
            $user->seed = $request->get('seed');
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Користувач успішно зареєстрований',
        ]);
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
            'seed' => 'required_if:role,admin',
        ]);

        $user = User::where('login', $data['login'])->first();

        if ($user && $user->checkPassword($data['password'])) {
            if ($user->role == 'admin' && $data['seed'] != $user->seed) {
                return response()->json([
                    'success' => false,
                    'message' => 'Невірний сід',
                ], 401);
            }

            Auth::login($user);

            return response()->json([
                'success' => true,
                'user' => $user,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Неправильний логін або пароль',
        ], 401);
    }
}
