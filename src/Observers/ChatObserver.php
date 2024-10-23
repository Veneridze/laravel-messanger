<?php

namespace App\Observers;

use Veneridze\LaraverMessanger\Models\Chat;
use App\Notifications\SignDocumentPublishedNotification;

class ChatObserever
{
    /**
     * Handle the Chat "created" event.
     */
    public function created(Chat $chat): void
    {
        
    }

    /**
     * Handle the Chat "updated" event.
     */
    public function updated(Chat $chat): void
    {
        
    }

    /**
     * Handle the Chat "deleted" event.
     */
    public function deleted(Chat $chat): void
    {
        //
    }

    /**
     * Handle the Chat "restored" event.
     */
    public function restored(Chat $chat): void
    {
        //
    }

    /**
     * Handle the Chat "force deleted" event.
     */
    public function forceDeleted(Chat $chat): void
    {
        //
    }
}
