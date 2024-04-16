<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageController extends Controller
{

//    public function index():JsonResource
//    {
//        return MessageResource::collection(Message::all());
//    }

    public function store(CreateMessageRequest $request):JsonResource
    {
        $validated = $request->validated();

        $message = Message::create($validated);

        MessageSent::dispatch($message);

        return MessageResource::make($message);
    }

//
//    public function show(Message $message): JsonResource
//    {
//        return MessageResource::make($message);
//    }



//    public function update(Request $request, Message $message): JsonResource
//    {
//        $validated = $request->validate([
//            'content' => 'string'
//        ]);
//
//        $message->update($validated);
//
//        return MessageResource::make($message);
//    }

//    public function destroy(Message $message): Response
//    {
//        $message->delete();
//
//        return response()->noContent();
//    }
}
