<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo 'セッション破棄しました';

    $_SESSION = [];

    if(isset($_COOKIE['PHPSESSID'])){
        setcookie('PHPSESSID', '', time() - 1800, '/');
        //setcookie('クッキーの名前','クッキーの値','クッキーの有効期限','サーバー上での、クッキーを有効としたいパス '/' をセットすると、クッキーは domain 配下の全てで有効')
    }

    session_destroy();

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    /*
    array(0) {
    }
    */

    echo '<pre>';
    var_dump($_COOKIE);
    echo '</pre>';
    /* 結果
    array(1) {
    ["PHPSESSID"]=>
    string(26) "7bu6rssopug908bk0quh9ip3bn"
    }
    */
    ?>
</body>
</html>