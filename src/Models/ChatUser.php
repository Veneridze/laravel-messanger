<?php
namespace Veneridze\LaraverMessanger\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ChatUser extends Model {
    use SoftDeletes;
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function chat(): BelongsTo {
        return $this->belongsTo(Chat::class);
    }

    public function messages(): BelongsTo {
        return $this->belongsTo(Message::class);
    }
    /**
     * Summary of sendMessage
     * @param string $text
     * @param array<Media> $media
     * @return \Veneridze\LaraverMessanger\Models\Message
     */
    public function sendMessage(string $text, array $media): Message {
        
    }
}