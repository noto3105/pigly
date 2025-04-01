<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\WeightLog;
use App\Models\User;

class WeightLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザーIDを取得するためユーザーを一人指定する
        $user = User::first();
        if (!$user) {
            $this->call(UsersTableSeeder::class);
            $user = User::first();
        }

        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
