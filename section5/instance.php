<?php

class Product{
    //アクセス修飾子,private(外からアクセスできない),protected(自分・継承したクラス),public(公開)

    //変数
    private $product = [];//クラスの中でのみ使える変数

    //関数
    public function __construct($product){//__construct ... 初回に呼び出す
        $this->product = $product;
    }

    public function getProduct(){
        echo $this->product;
    }

    function addProduct($item){
        $this->product .= $item;
    }

    public static function getStaticProduct($str){//static ... 静的に関数を使える
        echo $str;
    }

}
//インスタンス化
$instance = new Product('テスト');
var_dump($instance);
/*
object(Product)#1 (1) {
  ["product":"Product":private]=>
  string(9) "テスト"
}
//クラスをインスタンス化するとobjectになる
*/

$instance->getProduct();
//結果 テスト

$instance->addProduct('追加分');
$instance->getProduct();
//結果 テスト追加分

//静的(static) クラス名::関数名
Product::getStaticProduct('静的');
//結果 静的
