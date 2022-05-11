<?php

//パスワードを記録したファイルの位置
echo __FILE__;
//結果 /Applications/MAMP/htdocs/PHP1/section2/maintenance/test.php

//パスワード(暗号化)
echo(password_hash('password123', PASSWORD_BCRYPT));
//結果 $2y$10$dvGhHQmzYA6VcEnpC06aTOGtOwK72jokdU.MQrqanCBQvOHK/6pg2

$contactFile = '.contact.dat';

//ファイルを丸ごと読み込みする
$fileContents = file_get_contents($contactFile);

echo $fileContents;
//結果 あああ いいい

//ファイルに書き込み(上書き)
file_put_contents($contactFile, 'テストです');
//結果 テストです (のみ..あああ いいいは消される)

//ファイルに書き込み(追記)
file_put_contents($contactFile, '追記テストです',FILE_APPEND);
//結果 テストです。テストです。

$addText = "\n".'改行テストです';
file_put_contents($contactFile, $addText ,FILE_APPEND);
/* 結果
テストです追記テストです
改行テストです
*/


$contactFile = '.contact_2.dat';

//配列 file,区切り explode, foreach
$allData = file($contactFile);
foreach($allData as $lineData){
    $lines = explode(',', $lineData);
    echo $lines[0].'<br>';
    echo $lines[1].'<br>';
    echo $lines[2].'<br>';
}
//結果 タイトル1,本文1,日付1,カテゴリ1 タイトル2,本文2,日付2,カテゴリ2 タイトル3,本文3,日付3,カテゴリ3 CSV形式
