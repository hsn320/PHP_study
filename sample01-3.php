<?php
// sample01-3.php

// 配列データ
$classes = [
    "WD1A", "WD2A", "WD3A",
];

// 複雑な配列データ
$school = [];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>ループ処理</h1>
    <h2>foreach</h2>
    <ul>
    <?php foreach($classes as $key => $class): ?>
        <li><?= $key ?> : <?= $class ?></li>
    <?php endforeach ?>
    </ul>
</body>
</html>