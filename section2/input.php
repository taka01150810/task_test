<?php
if(!empty($_GET)){
    //$_ ... スーパーグローバル変数。9種類ある
    echo '<pre>';
    var_dump($_GET);
    echo '</pre>';
}
/* 結果 URLに表示される
array(2) {
  ["your_name"]=>
  string(9) "あああ"
  ["team"]=>
  array(2) {
    [0]=>
    string(9) "ネッツ"
    [1]=>
    string(12) "マイアミ"
  }
}
*/
if(!empty($_POST)){
    //$_ ... スーパーグローバル変数。9種類ある
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}
/* URLは表示されない
array(2) {
  ["your_name"]=>
  string(12) "レブロン"
  ["team"]=>
  array(2) {
    [0]=>
    string(15) "レイカーズ"
    [1]=>
    string(12) "マイアミ"
  }
}
*/
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
    <!-- 
        GET...URLに表示される(検索条件など)
        POST...見られてはいけないNGなデータはこっち 
    -->
    <form method="GET" action="input.php">
        氏名
        <input type="text" name="your_name">
        <input type="submit" value="送信する">
        <br>
        <input type="checkbox" name="team[]" value="レイカーズ">レイカーズ
        <input type="checkbox" name="team[]" value="ネッツ">ネッツ
        <input type="checkbox" name="team[]" value="マイアミ">マイアミ
    </form>

    <form method="POST" action="input.php">
        氏名
        <input type="text" name="your_name">
        <input type="submit" value="送信する">
        <br>
        <input type="checkbox" name="team[]" value="レイカーズ">レイカーズ
        <input type="checkbox" name="team[]" value="ネッツ">ネッツ
        <input type="checkbox" name="team[]" value="マイアミ">マイアミ
    </form>
</body>
</html>