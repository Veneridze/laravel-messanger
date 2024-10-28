<?php
namespace Veneridze\LaravelMessanger\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veneridze\LaravelMessanger\Models\Chat;
use App\Models\User;

class ChatController {
    public function index(Chat $chat) {
        return $chat->messages;
    }

    public function store(Chat $chat, Request $request) {
        $chat->messages()->create([
            'user_model' => User::class,
            'user_id' => Auth::id(),
            'text' => 'test123'
        ]);
    }
}