<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{

//    public function index():JsonResource
//    {
//        return UserResource::collection(User::all());
//    }


    public function store(CreateUserRequest $request):JsonResource
    {
        $validated = $request->validated();

        return UserResource::make(User::create($validated));
    }


    public function show(User $user):JsonResource
    {
        return UserResource::make($user);
    }
//
//    public function update(Request $request, User $user):JsonResource
//    {
//        $validated = $request->validate([
//            'username' => 'unique:users'
//        ]);
//
//        $user->update($validated);
//
//        return UserResource::make($user);
//    }
//
//    public function destroy(User $user): Response
//    {
//        $user->delete();
//        return response()->noContent();
//    }
}
