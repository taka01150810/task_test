<?php
//抽象クラス //設定するメソッドを強制
abstract class ProductAbstract{
    //下記のような普通の関数も書ける
    public function echoProduct(){
        echo '親クラスです';
    }

    //中身は書けない
    abstract public function getProduct();
}

//具象クラス(具体的なクラス)
class BaseProduct{
    //変数 関数
    public function echoProduct(){
        echo '親クラスです';
    }

    public function getProduct(){
        echo '親の関数です';
    }

}

//子クラス
class Product extends ProductAbstract{

    private $product = [];//クラスの中でのみ使える変数

    public function __construct($product){//__construct ... 初回に呼び出す
        $this->product = $product;
    }

    //abstractした関数は必ず使わなければいけない
    public function getProduct(){
        echo $this->product;
    }

}
//インスタンス化
$instance = new Product('テスト');

$instance->getProduct();
//結果 テスト

