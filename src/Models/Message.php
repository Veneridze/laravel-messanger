<?php
namespace Veneridze\LaraverMessanger\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class Message extends Model implements HasMedia {
    use InteractsWithMedia;
    public function user(): BelongsTo {
        return $this->chatUser->user;
    }
    public function chatUser(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function chat(): BelongsTo {
        return $this->belongsTo(Chat::class);
    }
}