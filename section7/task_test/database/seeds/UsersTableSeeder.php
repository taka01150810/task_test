<?php

use Illuminate\Database\Seeder;

// php artisan make:seeder UsersTableSeeder で作成
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'テスト1',
                'email' => 'test1@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'テスト2',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'テスト3',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
