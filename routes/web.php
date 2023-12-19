<?php

use App\Models\Round;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (): void {

    /**
     * Description of cases would be bound at opened issues
     *
     * @link https://github.com/laravel/framework/issues/49420
     */


    /**
     * Case #1
     *
     * Filled main selected - correct, there is only one user in side
     *
     */

    $firstCase = Round::whereId(1)->with('filledMainSides')->first();

    dump($firstCase->toArray());

    /**
     * Case #2
     *
     * Now we are going to count filledMainSides
     * Works as charm
     *
     */

    $secondCase = Round::find(1)->filledMainSides()->count();

    dump($secondCase);

    /**
     * Case #3
     *
     * At this point, we will fetch Round and count of filledMainSides together
     * As result, we will have one filled_main_sides, but filles_main_sides_count equals 2
     *
     */

     $thirdCase = Round::whereId(1)->with('filledMainSides')->withCount('filledMainSides')->first();

     dump($thirdCase->toArray());

     /**
      * Must be true because the size of the collection must be equal to the calculated sample
      *
      */
     dump($thirdCase->filled_main_sides_count === $thirdCase->filledMainSides->count());
});
