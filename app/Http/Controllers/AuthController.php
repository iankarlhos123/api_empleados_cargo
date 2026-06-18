<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|string|min:8',
        ], [
            'name.required'     => 'El nombre es obligatorio.',
            'email.required'    => 'El correo electronico es obligatorio.',
            'email.email'       => 'El correo no tiene un formato valido.',
            'email.unique'      => 'Ese correo ya esta registrado.',
            'password.required' => 'La contrasena es obligatoria.',
            'password.min'      => 'La contrasena debe tener al menos 8 caracteres.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado correctamente.',
            'token'   => $token,
            'user'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
            ],
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'El correo electronico es obligatorio.',
            'email.email'       => 'El correo no tiene un formato valido.',
            'password.required' => 'La contrasena es obligatoria.',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Credenciales incorrectas.',
            ], 401);
        }

        $user  = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Sesion iniciada correctamente.',
            'token'   => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesion cerrada correctamente.',
        ]);
    }
}