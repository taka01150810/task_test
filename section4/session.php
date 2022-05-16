<?php

/*
$_SESSIONはサーバー側でデータを保存している。
$_COOKIEはブラウザ毎にデータを保存している。
$_COOKIEはブラウザなのでパスワード保存などはNG。
*/
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_SESSION['visited'])){
        echo '初期訪問です';

        //SESSIONは連想配列になっている
        $_SESSION['visited'] = 1;
        $_SESSION['date'] = date('c');
    }else{
        $visited = $_SESSION['visited'];
        $visited++;
        $_SESSION['visited'] = $visited;

        echo $_SESSION['visited'].'回目の訪問です<br>';
        //結果 10回目の訪問です
        if(isset($_SESSION['date'])){
            echo '前回の訪問は'.$_SESSION['date'].'です。';
            //結果 前回の訪問は2022-05-16T03:50:31+00:00です。
            $_SESSION['date'] = date('c');
        }
    }

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    /*
    array(3) {
    ["visited"]=>
    int(10)
    ["date"]=>
    string(25) "2022-05-16T03:54:13+00:00"
    }
    */

    echo '<pre>';
    var_dump($_COOKIE);
    echo '</pre>';
    /* 結果
    array(1) {
    ["PHPSESSID"]=>
    string(26) "fhk8ngotqta3jon7u7vjdbqtgt"
    }
    */

    ?>
</body>
</html>