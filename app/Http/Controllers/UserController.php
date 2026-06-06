<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($request->password);
        $user = User::create($validatedData);

        return response()->json(['Masseg' => 'Created Success', 'User Data' => $user]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('auth_Token')->plainTextToken;

            return response()->json(['message' => 'created succssflly', 'User' => $user, 'Token' => $token], 200);
        } else {
            return response()->json(['massage' => 'invalid email or password'], 401);
        }
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json('logout successflly', 201);
    }

    // -----------------------------------------------------------------------------------------------

    public function index()
    {
        $usres = User::all();

        return response()->json($usres);
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['passward'] = Hash::make($request->password);
        $user = User::create($validatedData);

        return response()->json($user);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $validateData = $request->validated();
        $validateData['password'] = Hash::make($request->password);
        $user = User::findOrFail($id);
        $user->update($validateData);

        return response()->json($user);

    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json('Deleted Successflly');
    }
}
