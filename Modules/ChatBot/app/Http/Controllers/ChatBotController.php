<?php

namespace Modules\ChatBot\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\ChatBot\Http\Requests\ChatBotRequest;
use Modules\ChatBot\Services\AssetChatService;
use Modules\ChatBot\Transformers\ChatResource;

class ChatBotController extends Controller
{
    protected $chatService;

    public function __construct(AssetChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function send(ChatBotRequest $request)
    {
        $message = $request->validated()['message'];

        $response = $this->chatService->processChat($message);

        return new ChatResource($response);
    }
}