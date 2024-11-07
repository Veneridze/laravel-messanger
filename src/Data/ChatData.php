<?php

namespace Veneridze\LaravelMessanger\Data;


use Veneridze\LaravelForms\Form;
use Veneridze\LaravelMessanger\Models\Chat;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\Validation\Prohibited;

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
