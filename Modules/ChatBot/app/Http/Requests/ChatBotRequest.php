<?php

namespace Modules\ChatBot\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatBotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => 'required|string|max:500',
        ];
    }
}