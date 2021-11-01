<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    public function register(AuthRequest $authRequest)
    {
        $registerData = $authRequest->validated();

        $isUserExist = User::where('email', $registerData['email'])->first();

        if (!$isUserExist || !Hash::check($registerData['password'], $isUserExist['password'])) {
            $newUser = User::create([
                'name' => $registerData['name'],
                'email' => $registerData['email'],
                'password' => Hash::make($registerData['password'])
            ]);

            $accessToken = $newUser->createToken('access_token')->plainTextToken;

            if ($newUser) {
                return response()->json([
                    "code" => 201,
                    "pesan" => "Register Success",
                    "access_token" => $accessToken,
                    "user" => [
                        "id" => $newUser['id'] ?: null,
                        "name" => $newUser['name'] ?: null,
                        "email" => $newUser['email'] ?: null,
                        "address" => $newUser['address'] ?: null,
                        "phone" => $newUser['phone'] ?: null,
                        "photo" => $newUser['photo'] ?: null,
                        "created_at" => Carbon::make($newUser['created_at'])->isoFormat('dddd, D MMMM Y, hh:mm:ss'),
                        "updated_at" => Carbon::make($newUser['updated_at'])->isoFormat('dddd, D MMMM Y, hh:mm:ss'),

                    ]
                ]);
            }
        }

        return response()->json([
            "code" => 400,
            "pesan" => "Email sudah ada"
        ]);
    }

    public function login(AuthRequest $authRequest)
    {
        $registerData = $authRequest->validated();

        $isUserExist = User::where('email', $registerData['email'])->first();

        if (!$isUserExist || !Hash::check($registerData['password'], $isUserExist['password'])) {
            return response()->json([
                "code" => 400,
                "pesan" => "Email anda belum terdaftar"
            ]);
        }

        $isUserExist->tokens()->delete();

        $accessToken = $isUserExist->createToken('access_token')->plainTextToken;

        if ($isUserExist) {
            return response()->json([
                "code" => 200,
                "pesan" => "Login Success",
                "access_token" => $accessToken,
                "user" => [
                    "id" => $isUserExist['id'] ?: null,
                    "name" => $isUserExist['name'] ?: null,
                    "email" => $isUserExist['email'] ?: null,
                    "address" => $isUserExist['address'] ?: null,
                    "phone" => $isUserExist['phone'] ?: null,
                    "photo" => $isUserExist['photo'] ?: null,
                    "created_at" => Carbon::make($isUserExist['created_at'])->isoFormat('dddd, D MMMM Y, hh:mm:ss'),
                    "updated_at" => Carbon::make($isUserExist['updated_at'])->isoFormat('dddd, D MMMM Y, hh:mm:ss'),
                ]
            ]);
        }
    }

    public function logout(AuthRequest $authRequest)
    {
        $logoutData = $authRequest->validated();

        $user = User::where('id', $logoutData['id'])->first();

        if ($user) {
            $user->tokens()->delete();
            return response()->json([
                "code" => 200,
                "pesan" => "Logout Success"
            ]);
        }

        return response()->json([
            "code" => 400,
            "pesan" => "Logout Gagal"
        ]);
    }
}
