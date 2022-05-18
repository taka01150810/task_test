<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\TestController;

$app = new TestController;
$app->run();
//結果 hello world

use Carbon\Carbon;

echo Carbon::now();
//結果 2022-05-18 06:23:56

echo Carbon::now()->format('今日はY年m月d日だよ!');
//結果 今日は2022年05月18日だよ!