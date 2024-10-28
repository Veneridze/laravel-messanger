<?php
namespace Veneridze\LaravelMessanger\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model {
    use SoftDeletes;
    public function users(): HasManyThrough {
        return $this->hasManyThrough(User::class, ChatUser::class);
    }

    public function messages(): HasManyThrough {
        return $this->hasManyThrough(Message::class, ChatUser::class);
    }

    public function chatUsers(): HasMany {
        return $this->hasMany(ChatUser::class);
    }

    public function join(User $user): ChatUser {
        return $this->chatUsers()->firstOrCreate([
            'user_id' => $user->id
        ]);
    }
}