<?php

//DB接続
function insertContact($request){

require 'db_connection.php';

//入力 DB保存 prepare,execute(配列(全ての文字列))
$params = [
    'id' => null,
    'your_name' => $request['your_name'],
    'email' => $request['email'],
    'url' => $request['url'],
    'gender' => $request['gender'],
    'age' => $request['age'],
    'contact' => $request['contact'],
    'created_at' => null,
];
$count = 0;
$columns = '';
$values = '';

foreach(array_keys($params) as $key){
    if($count++ > 0){
        $columns .= ',';
        $values .= ',';
    }
    $columns .= $key;
    $values .= ':'.$key;
}

$sql = 'INSERT INTO contact ('. $columns .') VALUES('.$values.')';
var_dump($sql);
//結果 "INSERT INTO contact (id,your_name,email,url,gender,age,contact,created_at) VALUES(:id,:your_name,:email,:url,:gender,:age,:contact,:created_at)"
$stmt = $pdo->prepare($sql);//②実行したいSQL文をセットする。
$stmt->execute($params);//④実際にSQLを実行する。
}