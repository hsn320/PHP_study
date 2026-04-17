<?php
// sample01-2.php

// 外部ファイルの読み込み
require_once  __DIR__ . "/config.php";

// スーパーグローバル変数の確認
print "<pre>";
var_dump($_GET);
print "</pre>";

print "<hr>";

print "<pre>";
print_r($_SERVER);
print "</pre>";


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?></title>
</head>
<body>
    <?php require "sample01-2-header.php" ?>
</body>
</html>