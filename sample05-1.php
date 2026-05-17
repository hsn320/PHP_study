<?php
// sample05-1.php

// セッションの開始
session_start();

// セッションにデータを保存
$_SESSION[ "username" ] = "huemori";

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
    <h2>ログイン</h2>
    <a href="sample05-2.php">sample05-2</a>
</body>
</html>