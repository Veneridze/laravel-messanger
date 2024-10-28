<?php
namespace Veneridze\LaravelMessanger\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model {
    use SoftDeletes;
    protected $guarded = [];
    public function users(): HasManyThrough {
        return $this->hasManyThrough(User::class, Message::class);
    }

    public function messages(): HasMany {
        return $this->hasMany(Message::class);
    }
}