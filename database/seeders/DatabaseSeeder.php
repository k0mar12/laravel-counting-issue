<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Participant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);

        $round = $user->rounds()->create(['composition' => 1]);
        $sides = $round->sides()->createMany([['type' => 0], ['type' => 1]]);

        $radiantSide = $sides->firstWhere('type', 0);

        $radiantSide->participants()->save((new Participant())->user()->associate($user));
    }
}
