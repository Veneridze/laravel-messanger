<?php

namespace Veneridze\LaravelMessanger\Data;


use Veneridze\LaravelForms\Form;
use Veneridze\LaravelMessanger\Models\ChatUser;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\Validation\Prohibited;

class ChatUserData extends Form
{

    #[Computed]
    readonly array $unreadMessagesCount;
    #[Computed]
    readonly string $name;
    public function __construct(
        #[Prohibited]
        public ?int $id,
        public ?int $user_id,
    ) {
        if($this->id) {
            $item = ChatUser::findOrFail($this->id);
            $this->unreadMessagesCount = $item->unreadMessagesCount;
            $this->name = $item->user->name;
        }
    }
}
