<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $validData = $request->validate(['email' => 'email|unique:users|required|string', 'password' => 'required|min:3|string']);

        $user = User::create(['email' => $validData['email'], 'password' => $validData['password']]);

        $user->createToken("api")->plainTextToken;

        return response()->json(["succes" => true], 201);
    }

    public function login(Request $request)
    {
        try {

            $validData = $request->validate(['email' => 'email|required|string', 'password' => 'required|min:3|string']);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'invalid data', 'errors' => $e->errors()]);
        }

        $user = User::where('email', $validData['email'])->first();

        if ($user && Hash::check($validData['password'], $user->password)) {
            return response()->json(['token' => $user->createToken('api')->plainTextToken]);
        };
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'logout'], 200);
    }
}
