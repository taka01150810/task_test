<?php

trait ProductTrait{
    public function getProduct(){
        echo 'プロダクト';
    }
}

trait NewsTrait{
    public function getNews(){
        echo 'ニュース';
    }
}

class Product{
    //traitは複数使える
    use ProductTrait;
    use NewsTrait;

    public function getInformation(){
        echo 'クラスです';
    }

    // public function getNews(){
    //     echo 'クラスのニュースです';
    // }
    //classとtraitはclassの方が優先
}

$product = new Product();
$product->getInformation();
//結果 クラスです
$product->getProduct();
//結果 プロダクト
$product->getNews();
//結果 ニュース
