<?php

/*
PHPからデータベースを操作する手順は以下のようになります。
①データベースに接続する。
②実行したいSQL文をセットする。
③SQLに対してパラメーターをセットする。【任意】
④実際にSQLを実行する。
⑤結果を取得する。【任意】
⑥データーベースから切断する。
*/

require 'db_connection.php';

//ユーザー入力なしかありかは変動値があるかないかで決める
//ユーザー入力なし query
$sql = 'SELECT * FROM contact WHERE id = 2';
$stmt = $pdo->query($sql);//query...データベースに対して発行してくれる役割。②〜④を一気に処理する

$result = $stmt->fetchall();//fetch...取ってくる。
echo '<pre>';
var_dump($result);
echo '</pre>';
/* 結果
array(1) {
  [0]=>
  array(8) {
    ["id"]=>
    int(2)
    ["your_name"]=>
    string(3) "aaa"
    ["email"]=>
    string(3) "aaa"
    ["url"]=>
    string(4) "aaaa"
    ["gender"]=>
    int(2)
    ["age"]=>
    int(1)
    ["contact"]=>
    string(3) "sss"
    ["created_at"]=>
    string(19) "2022-05-11 15:38:38"
  }
}
*/

//ユーザー入力あり prepare bind execute
$sql = 'SELECT * FROM contact WHERE id = :id';
$stmt = $pdo->prepare($sql);//②実行したいSQL文をセットする。
$stmt->bindValue('id',1, PDO::PARAM_INT);//③SQLに対してパラメーターをセットする。【任意】
$stmt->execute();//④実際にSQLを実行する。

$result = $stmt->fetchall();

echo '<pre>';
var_dump($result);
echo '</pre>';
/* 結果 
array(1) {
  [0]=>
  array(8) {
    ["id"]=>
    int(1)
    ["your_name"]=>
    string(3) "aaa"
    ["email"]=>
    string(3) "aaa"
    ["url"]=>
    string(4) "aaaa"
    ["gender"]=>
    int(2)
    ["age"]=>
    int(1)
    ["contact"]=>
    string(3) "sss"
    ["created_at"]=>
    string(19) "2022-05-11 15:38:35"
  }
}
*/

/*
トランザクション まとまって処理 beginTransaction, commit, rollback
ex)銀行
残高を確認->Aさんから引き落とし->Bさんに振込
*/
$pdo->beginTransaction();

try{
    $stmt = $pdo->prepare($sql);//②実行したいSQL文をセットする。
    $stmt->bindValue('id',1, PDO::PARAM_INT);//③SQLに対してパラメーターをセットする。【任意】
    $stmt->execute();//④実際にSQLを実行する。

    $pdo->commit();//SQL処理
}catch(PDOException $e){
    $pod->rollback();//更新のキャンセル
}
?>