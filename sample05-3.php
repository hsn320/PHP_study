<?php
// sample05-2.php

// セッションの開始
session_start();

// ログアウト処理
// セッションのデータを削除
// セッションの全破棄
session_destroy();

// セッションの一部の項目を削除する場合は、unset() で削除する
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
    <h2>ログアウト</h2>
</body>
</html>