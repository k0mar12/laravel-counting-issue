<?php

/**
* Hope - This is what you need in programming
*
* （‐＾▽＾‐）
*
* @author  Vlad Poshvaniuk <vladlovedance@gmail.com>
* @date    2023-12-19
* @time    09:25
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Round extends Model
{
    protected $fillable = ['phase', 'type', 'lobby_mode', 'composition', 'index'];

    public function sides(): HasMany
    {
        return $this->hasMany(Side::class);
    }

    public function mainSides(): HasMany
    {
        return $this->sides()->mainTypes();
    }

    public function filledMainSides(): HasMany
    {
        return $this->mainSides()->filled();
    }
}
