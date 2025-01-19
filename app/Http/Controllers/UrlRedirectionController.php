<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\View\View;

class UrlRedirectionController extends Controller
{
    public function __invoke(string $shortUrl): View
    {
        $url = Url::query()->where('shortened_url', $shortUrl)->firstOrFail();

        $url->increment('clicks');

        return view('redirection', [
            'shortUrl' => $url->shortened_url,
            'originalUrl' => $url->original_url,]);
    }
}
