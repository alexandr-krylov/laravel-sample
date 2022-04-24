<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'commentator',
            'email' => 'commentator@email.com',
            'password' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'troll',
            'email' => 'troll@email.com',
            'password' => Str::random(10),
        ]);
    }
}
