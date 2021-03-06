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

//可変変数
function combine(string ...$name):string//string ...$name ...引数を複数設定。:string ...戻り値の型
{
    $combinedName = '';
    for($i = 0; $i < count($name); $i++){
        $combinedName .= $name[$i];
        if($i != count($name) - 1){
            $combinedName .= '・';
        }
    }
    return $combinedName;
}

$variableLength = combine('テスト1','テスト2','テスト3');
echo $variableLength;
//結果 テスト1・テスト2・テスト3

//コールバック関数(引数に関数を入れる)
function combineSpace(string $firstName, string $lastName):string
{
    return $lastName . '' . $firstName;
}
$nameParam = ['名前', '苗字'];
function useCombine(array $name, callable $func)
{
    $concatName = $func(...$name);
    print($func. '関数での結合結果:'.$concatName. '<br>');
}
useCombine($nameParam, 'combineSpace');
//結果 combineSpace関数での結合結果:苗字名前

//商品クラス
class Product
{
    private $price = 1000;

    //価格取得
    public function getPrice()
    {
        return $this->price;
    }
}

//カートクラス
class Cart
{
    private $product = [];
    //商品追加
    public function addItem($product)
    {
        $this->products[] = $product;
    }
    //商品取得
    public function getItem($index)
    {
        return $this->products[$index];
    }
}
$cart = new Cart;
//引数にインスタンス
$cart->addItem(new Product());

//通常(それぞれメソッド実行)
$gotItem = $cart->getItem(0);
$price = $gotItem->getPrice();
echo '通常メソッド'.$price;
//結果 通常メソッド1000

//メソッドチェーン
//メソッドの後にインスタンスのメソッドをチェック
$price = $cart->getItem(0)->getPrice();
echo 'メソッドチェーン'.$price;
//結果 メソッドチェーン1000
?>