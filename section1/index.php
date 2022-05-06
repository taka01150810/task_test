<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo ('test');//結果 test
/*
数字は半角
123 → 数字として認識
１２３ → 文字として認識
*/
echo('こんにちは');//結果 こんにちは
echo("こんにちは");//結果 こんにちは
echo('こん"にちは');//結果 こん"にちは

//変数
/*
動的型付言語 PHP → 型を指定なくてもいい
静的型付言語 Java → 型を指定する
int...数字 string...文字
*/
$test_1 = 123;
echo $test_1;//結果 123
$test_2 = 'テストです';
echo $test_2;//結果 テストです

//var_dumpは配列、オブジェクト コレクションなどでよく使う
var_dump($test_1);//結果 int(123)
var_dump($test_2);//結果 string(15) "テストです"

/* 変数のルール
先頭は大文字かアンダーバー
大文字、小文字は分ける
出来るだけ意味のわかる名詞、英語にする
*/
$test_1 = 123;
$test_2 = 456;
$test_3 = $test_1 . $test_2;// .(コンマ)でくっつけることができる
echo $test_3;//結果 123456
?>

</body>
</html>