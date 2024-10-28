<?php
namespace Veneridze\LaravelMessanger\Data;


use App\Models\User;
use Veneridze\LaravelForms\Form;
use Illuminate\Support\Facades\Auth;
use Veneridze\LaravelForms\RelationData;
use Veneridze\LaravelMessanger\Models\Chat;
use Veneridze\LaravelMessanger\Models\ChatUser;
use Veneridze\LaravelMessanger\Models\Message;
use Veneridze\ModelTypes\TypeCollection;
use Spatie\LaravelData\Attributes\Hidden;
use Veneridze\LaravelForms\Elements\Date;
use Veneridze\LaravelForms\Elements\File;
use Veneridze\LaravelForms\Elements\Text;
use Spatie\LaravelData\Attributes\Computed;
use Veneridze\LaravelForms\Elements\Option;
use Veneridze\LaravelForms\Elements\Select;
use Veneridze\LaravelForms\Elements\MultipleSelect;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\Prohibited;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use Spatie\LaravelData\Attributes\Validation\Date as ValidationDate;
use Spatie\LaravelData\Attributes\Validation\File as ValidationFile;

class MessageData extends Form
{
    #[Computed]
    readonly array $user;

    #[Computed]
    readonly array $attachments;
    public function __construct(
        #[Prohibited]
        public ?int $id,
        public ?string $text,
        public ?string $user_type,
        public ?string $created_at,
        public ?string $readed_at,
    ) {
        if($this->id) {
            $item = Message::findOrFail($this->id);
            $this->user = [
                'id' => $item->user->id,
                'name' => $item->user->name,
                'type' =>  strtolower((new \ReflectionClass($item->user_type))->getShortName())
            ];
        }
    }
}
