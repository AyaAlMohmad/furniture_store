<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('role_users')->truncate();
        RoleUser::create([
            'user_id' => '1',
            'role_id'=>'1'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('role_users')->truncate();
        RoleUser::create([
            'user_id' => '2',
            'role_id'=>'1'
        ]);
    }
}
