<?php
// sample09.php

// DB操作の流れ
// 1.DB接続、4.SQLの実行、3.SQLの結果を取り出す、４。DB接続を閉じる
try{

    // DB接続
    $db = new PDO(
        dsn: "mysql:host=localhost;dbname=huemori;charset=utf8mb4", 
        username: "huemori", 
        password: "eccMyAdmin"
    );

    // SQLの実行
    // SQLを実行して、プリペアードステートメントを準備
    $stmt = $db->prepare(query: "SELECT * FROM php1_zip");
    // プリペアードステートメントのSQLを実行した結果セットを生成する
    $stmt->execute();

    // SQLの結果を取り出して、処理をおこなう
    $result = [];
    // 結果セットの先頭レコード（行データ）から順次抜き出す
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }

    var_dump($result);

}
catch(PDOException $error){
    print $error->getMessage();
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
    <h1>DB操作</h1>
    <h2>SEE¥ALCT</h2>
</body>
</html>