<?php
// sample03-1.php

// $classes = json_decode(filter_input(INPUT_COOKIE, "sample03_1"));
// // cookieの読み込みがNULLの場合は、$classesにから配列を保存する
// if(!$classes){
//     $classes = [];
// }

// NULL合体演算子
$classes = json_decode(filter_input(INPUT_COOKIE, "sample03_1")) ?? [];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>クッキー</h1>
    <h2>クッキーの読み込み</h2>
    <ul>
    <?php foreach($classes as $class): ?>
        <li><?= $class ?></li>
    <?php endforeach ?>
    </ul>
    <p><a href="sample03-2.php">sample03-2</a></p>
</body>
</html>