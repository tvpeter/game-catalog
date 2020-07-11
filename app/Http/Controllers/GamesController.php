<?php

namespace App\Http\Controllers;

use App\Games;
use App\Http\Resources\GamesCollection;
use App\Traits\FormatResponse;

class GamesController extends Controller
{
    use FormatResponse;

    /**
     * Retreive all games
     * @return GamesCollection
     */
    public function index()
    {
        return new GamesCollection(Games::paginate(100));
    }

    public function playersgames()
    {
        $games = Games::('')->with('users')->paginate(5);
    }





}
