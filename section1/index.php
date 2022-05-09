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

//定数...変わらない数、文字
/* constのルール
一回しか宣言できない。
大文字で宣言する。
*/
const MAX = 10;//const ... constant
echo MAX;//結果 10

//配列1行
$array_1 = [1,2,3];
echo $array_1;//結果 警告文 + Array
echo $array_1[1];//結果 2
var_dump($array_1);//結果 array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) }

echo '<pre>';//preで見やすくなる
var_dump($array_1);
echo '</pre>';
/*
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
*/

$array_2 = [
    ['赤','青','黄'],
    ['緑','紫','黒']
];
echo $array_2[0][1];//結果 青
echo $array_2[1][1];//結果 紫

$array_member = [
    //'key' => 'value',
    'name' => 'レブロン',
    'height' => 203,
    'hobby' => 'バスケ',
];
echo $array_member['name'];//結果 レブロン
echo $array_member['hobby'];//結果 バスケ


$array_member_2 = [
    'レブロン' => [
        'height' => 203,
        'team' => 'レイカーズ',
    ],
    'KD' => [
        'height' => 206,
        'team' => 'ネッツ',
    ],
];
echo $array_member_2['レブロン']['team'];//結果 レイカーズ
echo $array_member_2['KD']['team'];//結果 ネッツ

$array_member_3 = [
    'レイカーズ' => [
        'レブロン' => [
            'height' => 203,
            'pre_team' => 'キャブス'
        ],
        'AD' => [
            'height' => 208,
            'pre_team' => 'ペリカンズ'
        ],
    ],
    'ネッツ' => [
        'KD' => [
            'height' => 206,
            'pre_team' => 'ウォリアーズ'
        ],
        'カイリー' => [
            'height' => 191,
            'pre_team' => 'セルティックス'
        ],
    ],
];
echo $array_member_3['レイカーズ']['レブロン']['pre_team'];//結果 キャブス
echo $array_member_3['ネッツ']['カイリー']['height'];//結果 191
/*
!== null や empty, issetなどはよく使う
== は使わない === を使う
++でインクリメント(1ずつ増える)
*/
$test_1 = 10;
$test_2 = 3;
$test_3 = $test_1 - $test_2;
echo $test_3;//結果 7
$test_3 = $test_1 / $test_2;
echo $test_3;//結果 3.3333333333333
$test_3 = $test_1 % $test_2;
echo $test_3;//結果 1
/*
if(条件){
    条件が真なら実行
}
*/
$height = 160;
if($height == 160){
    echo '身長は'.$height.'です。';//結果 身長は160です。
}
/*
==...一致
===...型も一致
*/
$height = '160';
if($height == 160){
    echo '身長は'.$height.'です。';
}//結果 何も表示されない

/*
if(条件){
    条件が真なら実行
}else{
    　条件が偽なら実行
}
*/
$height = 165;
if($height == 160){
    echo '身長は'.$height.'です。';
} else {
    echo '身長は'.$height.'ではありません。';
}//結果 身長は165ではありません。

$signal = 'yellow';
if($signal === 'red'){
    echo '止まれ';
} elseif($signal === 'yellow'){
    echo '一旦中止';
}else{
    echo '進む';
}
//結果 一旦中止

$signal = 'blue';
$speed = 200;
if($signal === 'blue'){
    if($speed >= 80){//if文の中にif文を入れることをネストと呼ぶ
        echo 'スピード違反';
    }
}
//結果 スピード違反

//elseはなるべく使わない
$height = '170';
if($height >= 160){
    echo '身長は160cmより高いです。';
}
if($height == 160){
    echo '身長は160cmです。';
}
if($height <= 160){
    echo '身長は160cmより低いです。。';
}
//結果 身長は160cmより高いです。

if($height !== 160){
    echo '身長は160cmではありません';
}
//結果 身長は160cmではありません

//データが入っているかどうかを判別(isset,empty,is_null)
$test = '';
if(empty($test)){
    echo '変数は空です';
}
//結果 変数は空です
if(!empty($test)){
    echo '変数は空ではありません';
}
//結果 何もなし

//ANDとOR
$signal_1 = 'red';
$signal_2 = 'blue';
if($signal_1 === 'red' && $signal_2 === 'blue'){
    echo '赤と青です';
}
//結果 赤と青です

if($signal_1 === 'red' || $signal_2 === 'yellow'){
    echo '赤もしくは青です';
}
//結果 赤もしくは青です

//三項演算子
/*
条件 ? 真 : 偽
*/
$math = 80;
$comment = $math > 80 ? 'good' : 'not good';
echo $comment;
//結果 not good

//複数の値
$members = [
    //'key' => 'value',
    'name' => 'レブロン',
    'height' => 203,
    'hobby' => 'バスケ',
];

//バリューのみ表示
foreach($members as $member){
    echo $member;
}
//結果 レブロン203バスケ

//キーとバリューそれぞれ表示
foreach($members as $key => $value){
    echo $key.'は'.$value.'です';
}
//結果 nameはレブロンですheightは203ですhobbyはバスケです

//多段階の配列
$members_2 = [
    'レブロン' => [
        'height' => 203,
        'team' => 'レイカーズ',
    ],
    'KD' => [
        'height' => 206,
        'team' => 'ネッツ',
    ],
];

foreach($members_2 as $member_1){
    foreach($member_1 as $member){
        echo $member;
    }
}
//結果 203レイカーズ206ネッツ
/*
for 繰り返す数が決まっている場合
while 繰り返す数が決まっていない場合
*/
for($i = 0; $i < 10; $i++){
    echo $i;
}
//結果 0123456789

for($i = 0; $i < 10; $i++){
    if($i === 5){
        break;
    }
    echo $i;
}
//結果 01234

for($i = 0; $i < 10; $i++){
    if($i === 5){
        continue;
    }
    echo $i;
}
//結果 012346789

$j = 0;
while($j < 5){
    echo $j;
    $j++;
}
//結果 01234

do{echo $j;}
while($j < 5);
//結果 5

/*
switch
できればif文の方がいい

switch(変数){
    case 1;
    case 2;
    case 3;
}

*/
$data = 1;
switch($data){
    case 1:
        echo '1です';
    break;
    case 2:
        echo '2です';
    break;
    case 3:
        echo '3です';
    break;
    default:
    echo '1〜3ではありません';
}
//結果 1です

//switchの場合 == なので下記と同じ意味
if($data == 1){
    echo '1です';
}elseif($data == 2){
    echo '2です';
}elseif($data == 3){
    echo '3です';
}else{
    echo '1〜3ではありません';
}

//関数 function 機能
/*
よく自動販売機に例えられる。
インプットを入力しアウトプットが出力される。
引数を入力し、戻り値が出力される。
*/

/*
関数は組み込み関数とユーザー定義関数に分けられる
組み込み関数...元々準備してある関数
ユーザー定義関数...自由に作れる関数
*/

/*
function 関数名 (引数){
    ～処理～
    return 戻り値;
}

関数名は名詞か動詞+名詞
引数の変数は処理の中に入れる
*/
//インプット(引数) なし
//アウトプット(戻り値) なし
function test(){
    echo 'テスト';
}
test();
//結果 テスト

//インプット(引数) あり
//アウトプット(戻り値) なし
function getComment($string){
    echo $string;
}
getComment('コメント');
//結果 コメント

//インプット(引数) なし
//アウトプット(戻り値) あり
function getNumberOfComment(){
    return 5;
}
//上記だけだと結果 なし
echo getNumberOfComment();
//結果 5

//インプット(引数)2つあり
//アウトプット(戻り値)あり
function sumPrice($int1, $int2){
    $int3 = $int1 + $int2;
    return $int3;
}
$total = sumPrice(3,5);
echo $total;
//結果 8

//関数リファレンスに組み込み関数は書いてある
//文字列の長さを調べる組み込み関数
$text = 'abc';
echo strlen($text);
//結果 3

$text = 'アイウエオ';
echo strlen($text);
//結果 15
/*
マルチバイトによる影響
日本語 UTF-8では日本語は一文字あたり3〜6バイト
*/
echo mb_strlen($text);
//結果 5

//文字列の置き換え
$str = '文字列を置換します';
echo str_replace('置換','ちかん',$str);
//結果 文字列をちかんします

//指定文字列で分割
$str_2 = '指定文字列で、分割します';
echo '<pre>';
var_dump(explode('、', $str_2));
echo '</pre>';
/* 結果
array(2) {
  [0]=>
  string(18) "指定文字列で"
  [1]=>
  string(15) "分割します"
}
*/

//正規表現
/*
文字かどうか、数字かどうか、郵便番号かどうかなどを確認するときに使う
*/
$str_3 = '特定の文字列が含まれているか確認する';
echo preg_match('/文字列/',$str_3);
//結果 1

//指定文字列から文字列を取得する
echo substr('abcde', 1);
//結果 bcde

echo substr('あいうえお', 1);
//結果 ��いうえ

echo mb_substr('あいうえお', 2);
//結果 うえお

//配列に配列を追加する
$array = ['りんご','みかん'];
array_push($array, 'ぶどう', 'なし');
echo '<pre>';
var_dump($array);
echo '</pre>';
/* 結果
array(4) {
  [0]=>
  string(9) "りんご"
  [1]=>
  string(9) "みかん"
  [2]=>
  string(9) "ぶどう"
  [3]=>
  string(6) "なし"
}
*/

//組み込み関数を使ってユーザー定義関数を作る
/* 関数の名前
camelCase checkPostalCode()
snakeCase check_postal_code()
*/
$postalCode = '123-4567';
function checkPostalCode($str){
    $replaced = str_replace('-', '', $str);
    $length = strlen($replaced);
    if($length === 7){
        return true;
    }
    return false;
}
var_dump(checkPostalCode($postalCode));
//結果 bool(true)

$globalVariable = "グローバル変数です";//関数の外はグローバル

function checkScope(){
 $localVariable = "ローカル変数です"; //関数内はローカル変数
 echo $localVariable;
}
echo $globalVariable;
//結果 グローバル変数です
echo $localVariable;
//結果 何もなし(警告文)

function checkScope_2(){
    $localVariable = "ローカル変数です"; //関数内はローカル変数
    //echo $globalVariable;
    ///ローカル変数の中にグローバル変数は使えない
    global $globalVariable;
    //上記だと使える
    echo $globalVariable;
}
checkScope_2();
//結果 グローバル変数です
//しかし実際はあまり使われず、下記の書き方の方がいい
function checkScope_3($str){
    echo $str;
}
checkScope_2($globalVariable);
//結果 グローバル変数です

/*
require ... エラーが起きたら処理が中断
require_once ... 一回だけ呼び出し
include ... エラーが起きたら警告はされるが処理は行われる
include_once ... 一回だけ呼び出し
*/
require ('common.php');
echo $commonVariable;
//結果 共通の変数です
commonTest();
//結果 外部ファイルの関数です

echo __DIR__;
//結果 /Applications/MAMP/htdocs/PHP1/section1
echo __FILE__;
//結果 /Applications/MAMP/htdocs/PHP1/section1/index.php
?>

</body>
</html>