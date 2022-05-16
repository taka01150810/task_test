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
?>