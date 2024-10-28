<?php
namespace Veneridze\LaravelMessanger\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veneridze\LaravelMessanger\Models\Chat;
use Veneridze\LaravelMessanger\Data\MessageData;

class ChatController {
    public function show(Chat $chat) {
        return MessageData::collect($chat->messages)->toArray();
    }

    public function update(Chat $chat, Request $request) {
        $message = $chat->messages()->create([
            'user_type' => User::class,
            'user_id' => Auth::id(),
            'text' => $request->input('text')
        ]);

        return MessageData::from($message);
    }
}