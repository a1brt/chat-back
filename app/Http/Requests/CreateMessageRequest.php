<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author_id' => 'required|integer',
            'room_id' => 'required|integer',
            'content' => 'required|string'
        ];
    }
}
