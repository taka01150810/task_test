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
        $this->call([AreaSeeder::class]);
        $this->call([ShopSeeder::class]);
        $this->call([RouteSeeder::class]);//親要素を先にする
        $this->call([RouteShopSeeder::class]);
    }
}
