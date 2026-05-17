<?php
// sample05-2.php

// セッションの開始
session_start();

// セッションのデータを参照
var_dump($_SESSION);
// セッションにデータがなければ、リダイレクト
// isset() 指定した入れ物が存在するかをチェック
// empty() 中身が空かをチェック
if( ! $_SESSION[ "username" ] ) {
    // falseのとき
    header("Location: sample05-1.php");
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>セッション</h1>
    <h2>マイページ</h2>
    <a href="sample05-1.php">sample05-1</a>
    <a href="sample05-3.php">ログアウト</a>
</body>
</html>