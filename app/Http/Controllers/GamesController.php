<?php

namespace App\Http\Controllers;

use App\Games;
use App\Http\Resources\GamesCollection;
use App\Http\Resources\UserCollection;
use App\Traits\FormatResponse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    use FormatResponse;

    /**
     * Retrieve all games
     * @return GamesCollection
     */
    public function index()
    {
        return new GamesCollection(Games::users()->paginate(100));
    }

    /**
     * gat games played in the given day
     * @param $day
     * @return LengthAwarePaginator
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
     * @return LengthAwarePaginator
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
        $results =
        DB::table('game_user')
            ->join('users', 'game_user.user_id', '=', 'users.id')
            ->orderByDesc('user1_score', 'user2_score', 'user3_score', 'user4_score')
            ->limit(30)
            ->paginate(30);

        return response()->json($results);
    }


}
