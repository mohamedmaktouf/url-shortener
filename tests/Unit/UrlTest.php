<?php

use App\Livewire\Actions\Urls\CreateUrlAction;
use App\Models\Url;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_new_url()
    {
        $givenUrl = 'https://url.to/url';
        $user = UserFactory::new()->create();

        /** @var Url $url */
        $url = App::call(
            CreateUrlAction::class,[
            'originalUrl' => $givenUrl,
            'userId' => $user->id,
        ]);

        $this->assertEquals($givenUrl, $url->original_url);
        $this->assertEquals($user->id, $url->user_id);
    }

}
