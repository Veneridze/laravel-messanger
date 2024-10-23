<?php
namespace Veneridze\LaraverMessanger\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Message extends Model implements HasMedia {
    use InteractsWithMedia;
    
    protected $casts = [
        'readed_at' => 'datatime'
    ];
    public function user(): BelongsTo {
        return $this->chatUser->user;
    }
    /**
     * Summary of attachments
     * @return \Illuminate\Support\Collection<Media>
     */
    public function attachments(): Collection {
        return $this->getMedia('attachments');
    }
    public function chatUser(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function chat(): BelongsTo {
        return $this->belongsTo(Chat::class);
    }
}