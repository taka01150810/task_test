<?php

use Illuminate\Database\Seeder;

//php artisan make:factory ContactFormFactory で作成
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([ContactFormSeeder::class]);
    }
}
