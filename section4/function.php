<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
function defaultValue($string = null){//$string = null ....デフォルト値になる
    echo $string.'です';
}
//引数なし
defaultValue();
echo '<br>';
//結果 です

//引数あり
defaultValue('テスト');
//結果 テストです

echo 'タイプヒンティングテスト'.'<br>';
function noTypeHint($string){
    var_dump($string);
}
noTypeHint(['テスト']);
//結果 array(1) { [0]=> string(9) "テスト" }
//引数string予定に配列→エラーは出ないので
echo '<br>';

//タイプヒンティング(引数に型を指定。型が違うとエラー)
function typeTest(string $string){
    var_dump($string);
}
typeTest('配列文字');
//結果 string(12) "配列文字"

// typeTest(['配列文字']);
//結果 引数にstringと指定しているのに配列なのでエラー
?>