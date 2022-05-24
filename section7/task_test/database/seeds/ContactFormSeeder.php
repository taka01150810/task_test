<?php

use Illuminate\Database\Seeder;
use App\Models\ContactForm;

//php artisan make:seeder ContactFormSeeder で作成
class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //200個分のダミーデータ
        factory(ContactForm::class, 200)->create();
    }
}
