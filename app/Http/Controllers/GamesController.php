<?php

namespace App\Http\Controllers;

use App\Games;
use App\Http\Resources\GamesCollection;
use App\Traits\FormatResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    use FormatResponse;

    /**
     * Retreive all games
     * @return GamesCollection
     */
    public function index()
    {
        return new GamesCollection(Games::users()->paginate(100));
    }

    /**
     * gat games played in the given day
     * @param $day
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function gamesPerDay($day)
    {
        return
            DB::table('game_user')
                ->whereDate('game_user.created_at', $day)
                ->join('users', 'game_user.user_id', '=', 'users.id')
                ->paginate(500);
    }

    /**
     * get games within given dates
     * @param $start
     * @param $end
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function gamesWithinDates($start, $end)
    {
        return
            DB::table('game_user')
                ->whereBetween('game_user.created_at', array($start, $end))
                ->join('users', 'game_user.user_id', '=', 'users.id')
                ->paginate(500);
    }

    public function topMonthGames()
    {
        return
        DB::table('game_user')
            ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
    }


}
