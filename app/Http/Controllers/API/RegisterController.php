<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // * Set Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20|unique:users',
            'address' => 'nullable|string',
            'place_of_birth' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'religion' => 'nullable|in:islam,kristen,katolik,hindu,budha,konghucu',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'status' => 'nullable|in:active,inactive,banned',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // * Check If Validation Fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // * Create User
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'profile_picture' => $request->profile_picture,
            'religion' => $request->religion,
            'gender'=> $request->gender,
            'status' => $request->status,
            'password' => bcrypt($request->password),
        ]);
        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }
}
