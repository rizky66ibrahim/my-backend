<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // * Set Validation
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:8',
        ]);

        // * Check If Validation Fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        // * Get Credentials from Request
        $credentials = request(['username', 'password']);

        // * Check If Credentials are Correct
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        // * If Credentials are Correct
        return response()->json([
            'success' => true,
            'token_type' => 'bearer',
            'token' => $token,
            'user' => auth()->guard('api')->user(),
        ]);
    }
}
