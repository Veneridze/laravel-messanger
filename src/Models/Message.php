<?php
namespace Veneridze\LaravelMessanger\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphTo;
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
    protected $guarded = [];
    public function user(): MorphTo {
        return $this->morphTo('user');
    }
    /**
     * Summary of attachments
     * @return \Illuminate\Support\Collection<Media>
     */
    public function attachments(): Collection {
        return $this->getMedia('attachments');
    }
    public function chat(): BelongsTo {
        return $this->belongsTo(Chat::class);
    }
}