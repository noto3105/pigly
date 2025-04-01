<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\WeightTarget;
use App\Models\User;

class WeightTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        if (!$user) {
            $this->call(UsersTableSeeder::class);
            $user = User::first();
        }

        $param = [
            'user_id' => $user->id,
            'target_weight' => '60'
        ];
        DB::table('weight_targets')->insert($param);
    }
}
