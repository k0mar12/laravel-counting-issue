<?php

/**
* Hope - This is what you need in programming
*
* （‐＾▽＾‐）
*
* @author  Vlad Poshvaniuk <vladlovedance@gmail.com>
* @date    2023-12-19
* @time    09:26
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Participant extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participial(): MorphTo
    {
        return $this->morphTo();
    }
}
