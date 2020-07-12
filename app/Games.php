<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    /**
     * defines relationship between player and games
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public  function users()
    {
        return $this->belongsToMany('\App\User', 'game_user')
            ->withPivot('user2_id', 'user3_id', 'user4_id')
            ->withTimestamps();
    }
}
