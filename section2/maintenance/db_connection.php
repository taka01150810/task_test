<?php

const DB_HOST = 'mysql:dbname=udemy_php;host=localhost;charset=utf8';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

/*
クラスは変数や定数、関数をひとまとめにしたもの
クラスの中では変数/定数はプロパティ、関数はメソッド
という呼び名に変わる

クラスの使い方は動的と静的がある
動的クラス(->アロー演算子を使う)
$pdo = new class名;
$pdo->プロパティ
$pdo->メソッド

静的クラス(static)(::スコープ演算子を使う)
PDO::ATTR_ERRMODE
PDO::ERRMODE_EXCEPTION
*/
//例外処理...DBが接続できているか確認する処理
try{
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD,[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//連想配列で返ってくる
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//例外を表示する(必須で設定)
        PDO::ATTR_EMULATE_PREPARES => false,//SQLインジェクション対策
    ]);
    echo '接続成功';
}catch(PDOException $e){
    echo '接続失敗'.$e->getMessage()."\n";
    exit();
}