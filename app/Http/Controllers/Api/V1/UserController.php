<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $data = $request->only('name', 'last_name', 'email', 'password', 'document');
            $validator = Validator::make($data, [
                'name' => 'required|string',
                'last_name' => 'nullable|string',
                'document' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|max:50'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }

            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'document' => $request->document,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            UserResource::withoutWrapping();
            return new UserResource($user);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error interno " . $e
            ], 500);
        }
    }
}
