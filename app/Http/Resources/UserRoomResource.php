<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRoomResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'room_id' => $this->id,
            'other_users' => $this->users
        ];
    }
}
