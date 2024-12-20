<?php
namespace Veneridze\LaravelMessanger\Data;


use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Veneridze\LaravelForms\Form;
use Veneridze\LaravelMessanger\Models\Message;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\Validation\Prohibited;

class MessageData extends Form
{
    #[Computed]
    readonly array $user;
    #[Computed]
    readonly array $media;

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
            $media = $item->getMedia('*');
            $medData = [];
            foreach ($media as $key => $med) {
                $medObject = Media::where('uuid', $med->uuid)->firstOrFail();
                $medData[] = [
                    'name' => $med->file_name,
                    'uuid' => $med->uuid,
                    'collection' => $medObject->collection_name
                ];
            }
            $this->media = $medData;
            if($item->user_id) {
                $this->user = [
                    'id' => $item->user->id,
                    'name' => $item->user->name,
                    'readed_at' => $item->readed_at,
                    'type' =>  strtolower((new \ReflectionClass($item->user_type))->getShortName())
                ];
            }
        }
    }
}
