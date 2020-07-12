<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = Factory::create();

        for ($i = 0; $i <= 10000; $i++) {
            User::create([
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'nickname' => $faker->unique()->name,
                'password' => Hash::make('password'),
            ]);

        }

        $today = Carbon::today();
        $i = Carbon::today() ->subDays(3835);

        for (; ; ) {
            if ($i > $today) {
                break;
            }
            for($j=1; $j<=1500; $j++) {
                DB::table('game_user')->insert([
                    'games_id' => rand(1,5),
                    'user_id' => rand(1, 10000),
                    'user2_id' => rand(1, 10000),
                    'user3_id' => rand(1, 10000),
                    'user4_id' => rand(1, 10000),
                    'user1_score' => rand(1, 1000),
                    'user2_score' => rand(1, 1000),
                    'user3_score' => rand(1, 1000),
                    'user4_score' => rand(1, 1000),
                    'created_at' => $i,
                    'updated_at' => $i,
                ]);
            }

            $i->addDay();
        }

    }
}
