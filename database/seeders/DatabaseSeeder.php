<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => env('APP_name'),
            'email' => 'akbardinkes@gmail.com',
            'password' => bcrypt('akbardinkes2022')
        ]);
    }
}
