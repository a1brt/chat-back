<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RoomMessageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserRoomController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('users', UserController::class)->only(['show','store']);

Route::apiResource('messages', MessageController::class)->only(['store']);

Route::apiResource('rooms', RoomController::class)->only(['show','store', 'index']);

Route::get('users/{user_id}/rooms', UserRoomController::class);

Route::get('rooms/{room_id}/messages', RoomMessageController::class);


//havai grac login
Route::post('login', function (Request $request){
    $validated = $request->validate([
        'username' => 'required|string|exists:users,username'
    ]);
    return UserResource::make(User::whereUsername($validated['username'])->first());
});
