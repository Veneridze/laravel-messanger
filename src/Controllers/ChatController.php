<?php
namespace Veneridze\LaravelMessanger\Controllers;

use Illuminate\Http\Request;
use Veneridze\LaravelMessanger\Models\Chat;

class ChatController {
    public function index(Chat $chat) {
        return $chat->messages;
    }

    public function store(Chat $chat, Request $request) {
        $chat->messages()->create([
            'chat_user_id' => 1,
            'text' => 'test123'
        ]);
    }
}