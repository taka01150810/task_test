<?php
//インターフェース //メソッドの強制しか書けない
interface ProductInterface{

    //下記は書けない
    // public function echoProduct(){
    //     echo '親クラスです';
    // }

    //下記のようにメソッドしか書けない
    //オーバーライド(上書き)
    public function getProduct();

}

interface NewsInterface{
    public function getNews();
}

//具象クラス(具体的なクラス)
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
class Product implements ProductInterface, NewsInterface{//複数継承できる

    //変数
    private $product = [];//クラスの中でのみ使える変数

    //関数
    public function __construct($product){//__construct ... 初回に呼び出す
        $this->product = $product;
    }

    public function getProduct(){
        echo $this->product;
    }

    public function getNews(){
        echo 'ニュースです';
    }

}
//インスタンス化
$instance = new Product('テスト');

$instance->getNews();
//結果 ニュースです