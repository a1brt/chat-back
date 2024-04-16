<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRoomResource;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRoomController extends Controller
{
    public function __invoke(int $userId) :JsonResource
    {
        $userRooms = Room::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with(['users' => function ($query) use ($userId) {
                $query->select(['id', 'username'])->where('id', '<>', $userId);
            }])->get();

        return UserRoomResource::collection($userRooms);
    }
}
