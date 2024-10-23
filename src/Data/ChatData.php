<?php

namespace App\Data;

use App\Models\User;
use Veneridze\LaravelForms\Form;
use Illuminate\Support\Facades\Auth;
use Veneridze\LaravelForms\RelationData;
use Veneridze\LaraverMessanger\Models\Chat;
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

class ChatData extends Form
{

    #[Computed]
    readonly array $users;
    public function __construct(
        #[Prohibited]
        public ?int $id,
        public string $name,
        public ?string $created_at
    ) {
        if($this->id) {
            $item = Chat::findOrFail($this->id);
            $this->users = $item->users;
        }
    }
}
