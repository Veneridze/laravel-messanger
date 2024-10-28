<?php
namespace Veneridze\LaravelMessanger\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veneridze\LaravelMessanger\Models\Chat;
use App\Models\User;

class ChatController {
    public function show(Chat $chat) {
        return $chat->messages;
    }

    public function update(Chat $chat, Request $request) {
        $message = $chat->messages()->create([
            'user_type' => User::class,
            'user_id' => Auth::id(),
            'text' => 'test123'
        ]);

        return $message;
    }
}