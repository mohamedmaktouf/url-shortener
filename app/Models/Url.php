<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $original_url
 * @property string $shortened_url
 * @property int $user_id
 */
class Url extends Model
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
