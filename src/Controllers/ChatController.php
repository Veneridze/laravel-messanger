<?php
namespace Veneridze\LaravelMessanger\Controllers;

use App\Models\User;
use App\Observers\MessageObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veneridze\LaravelMessanger\Models\Chat;
use Veneridze\LaravelMessanger\Data\MessageData;

class ChatController {
    public function show(Chat $chat) {
        return MessageData::collect($chat->messages)->toArray();
    }

    public function update(Chat $chat, Request $request) {
        $request->validate([
            "text" => ["required","string"],
            'files' => ['nullable', 'array']
        ]);
        $message = $chat->messages()->createQuietly([
            'user_type' => User::class,
            'user_id' => Auth::id(),
            'text' => $request->input('text')
        ]);
        //throw new \Exception($request->has('files'));
        if($request->has('files')) {
            //throw new \Exception(count($request->file('files')));
            foreach ($request->file('files') as $file) {
                $message->addMedia($file)->toMediaCollection('attachments');   
            }
        }
        app(MessageObserver::class)->created($message);
        return MessageData::from($message);
    }
}