<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    // Registro de usuario
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user], 201);
    }

    // Login de usuario
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciales inválidas', 'flag' => false], 401);
        }

        return response()->json(['message' => 'Login exitoso', 'flag' => true, 'user' => auth()->user()]);
    }

    // Lista de usuarios
    public function userList()
    {
        $users = User::select('id','name', 'lastname', 'email')->get();

        // Modificar los usuarios para verificar si alguno de los campos está vacío
        $users = $users->map(function ($user) {
            $user->name = $user->name ?? 'sin dato';
            $user->lastName = $user->lastname ?? 'sin dato';
            $user->email = $user->email ?? 'sin dato';
            $user->motherLastName = $user->name ?? 'sin dato';
            $user->status = $user->lastname ?? 'sin dato';
            $user->rol = $user->email ?? 'sin dato';
            $user->actions = '
            <button class="btn btn-sm btn-primary edit-btn" data-id="' . $user->id . '" title="Editar">
                <i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-secondary settings-btn" data-id="' . $user->id . '" title="Configuración">
                <i class="fa fa-cogs"></i>
            </button>
            <button class="btn btn-sm btn-secondary view-btn" data-id="' . $user->id . '" title="Ver información" (click)="userView()">
                <i class="fa fa-eye"></i>
            </button>';
            return $user;
        });

        return response()->json($users, 200);
    }
}
