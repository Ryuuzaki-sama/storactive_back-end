<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code ' => 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $user = Auth::user();
            $token_result = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $token_result,
                'token_type' => 'Bearer',
                'username' => $user->nom_utilisateur,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cin' => 'required|min:7|max:8|unique:users',
                'nom' => 'required|max:255',
                'nom_utilisateur' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response([
                    'error' => $validator->errors()->all()
                ], 422);
            }

            $user = new User();
            $user->cin = $request->cin;
            $user->nom = $request->nom;
            $user->nom_utilisateur = $request->nom_utilisateur;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status_code' => 200,
                'message' => 'You have been registered',
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => $error->getMessage(),

            ]);
        }
    }
}
