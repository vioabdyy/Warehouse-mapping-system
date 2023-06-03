<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::truncate();
         User::create([
            'name' => 'admin',
            'level' => 'admin',
            'email' => 'jiwanaja@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
         ]);

         User::create([
            'name' => 'user',
            'level' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'remember_token' => Str::random(60),
         ]);
         
         User::create([
            'name' => 'pengawas',
            'level' => 'pengawas',
            'email' => 'pengawas@gmail.com',
            'password' => bcrypt('pengawas'),
            'remember_token' => Str::random(60),
         ]);

         User::create([
            'name' => 'jawab',
            'level' => 'penanggung jawab',
            'email' => 'penanggung jawab@gmail.com',
            'password' => bcrypt('jawab'),
            'remember_token' => Str::random(60),
         ]);

         User::create([
            'name' => 'receiving',
            'level' => 'receiving',
            'email' => 'receiving@gmail.com',
            'password' => bcrypt('receiving'),
            'remember_token' => Str::random(60),
         ]);
    }
}
