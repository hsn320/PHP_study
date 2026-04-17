<?php
//  sample01-1.php

// データの表示（書き込み）
// print "Hello PHP World.";

//  変数の宣言
$siteName = "サーバーサイド演習1";
// データの確認でバック命令
// var_dump($siteName);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>PHP</h1>
    <p><?php print "Hello PHP World." ?></p>

    <!-- <?php echo "" ?>の省略 -->
    <p><?= "ショートタグを使って表示" ?></p>

    <?= "サイトの名前は、{$siteName}です" ?>
</body>
</html>