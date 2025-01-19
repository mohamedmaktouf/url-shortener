<?php

namespace App\Livewire\Actions\Urls;

use App\Models\Url;
use Illuminate\Support\Str;

final readonly class CreateUrlAction
{
    public function __invoke(string $originalUrl, int $userId): Url
    {
        $url = new Url();
        $url->original_url = $originalUrl;
        $url->shortened_url = $this->generateRandomUniqueUrl();
        $url->user_id = $userId;
        $url->save();

        return $url;
    }

    private function generateRandomUniqueUrl(): string
    {
        return Str::uuid()->toString();
    }

}
