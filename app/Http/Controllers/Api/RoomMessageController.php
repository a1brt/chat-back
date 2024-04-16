<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomMessageController extends Controller
{
    public function __invoke(int $roomId): JsonResource
    {
        $roomMessages = Room::find($roomId)->messages()->get();

        return MessageResource::collection($roomMessages);
    }
}
