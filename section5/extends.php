<?php
//親クラス
class BaseProduct{
    //変数 関数
    public function echoProduct(){
        echo '親クラスです';
    }
    //オーバーライド(上書き)
    public function getProduct(){
        echo '親の関数です';
    }

}

//子クラス
class Product extends BaseProduct{
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

//同じ関数名なら子クラスと親クラスどっちが優先されるか? -> 子クラス
$instance->getProduct();
//結果 テスト

//親クラスのメソッド
$instance->echoProduct();
//結果 親クラスです
$instance->addProduct('追加分');
$instance->getProduct();
//結果 テスト追加分

//静的(static) クラス名::関数名
Product::getStaticProduct('静的');
//結果 静的
