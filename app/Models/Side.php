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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Contracts\Database\Query\Builder;

class Side extends Model
{
    protected $fillable = ['type'];

    public function round(): BelongsTo
    {
        return $this->belongsTo(Round::class);
    }

    public function participants(): MorphMany
    {
        return $this->morphMany(Participant::class, 'participial');
    }

    public function scopeFilled(Builder $builder): Builder
    {
        return $builder
            ->withCount('participants as joined_members')
            ->withAggregate('round', 'composition')
            ->havingRaw('`joined_members` = `round_composition`');
    }

    public function scopeMainTypes(Builder $builder): Builder
    {
        return $builder->where('type', 0)->orWhere('type', 1);
    }
}
