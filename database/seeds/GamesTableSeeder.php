<?php

use App\Games;
use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Games::truncate();

            $games = array('Call of Duty', 'Mortal Kombat',  'FIFA', 'Just Cause', 'Apex Legend');
            $versions = array('2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020');

            foreach ($games as $game)
            {
                Games::create([
                    'name' => $game,
                    'version' => $versions[rand(0, 10)],
                ]);
            }


    }
}
