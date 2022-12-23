<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $phone = $request->phone;
        $password = $request->password;
        $user = User::where('phone', $phone)->first();
        if (!$user or !Hash::check($password, $user->password)) {
            return abort(401);
        }
        $token = $user->createToken('employer')->plainTextToken;
        return ResponseController::data(['id' => $user->id, 'role' => $user->role, 'token' => $token]);
    }
}
