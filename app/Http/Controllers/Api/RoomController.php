<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomController extends Controller
{

    public function index(): JsonResource
    {
        return RoomResource::collection(Room::all());
    }

    public function store(CreateRoomRequest $request): JsonResource
    {
        $validated = $request->validated();

        $toUserID = User::select('id')->whereUsername($validated['to_user'])->first()->id;

        $users = [$validated['user_id'], $toUserID];

        $room = Room::create();

        $room->users()->attach(array_unique($users));

        return RoomResource::make($room->load('users'));
    }

    public function show(Room $room): JsonResource
    {
        return RoomResource::make($room);
    }

//    public function destroy(Room $room)
//    {
//        $room->delete();
//        return response()->noContent();
//    }
}
