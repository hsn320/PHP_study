<?php
// sample09-2.php

require_once __DIR__ . "/config.php";

try {

    $city = filter_input(INPUT_GET,"city") ?: "堺市";

    // DB接続
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);

    // テーブル名
    $table = TB_ZIP;
    // SQL
    $sql = "SELECT * FROM $table WHERE city LIKE ? ";

    // SQLでプリペアードステートメントの準備
    // プリペアードステートメントを使うことで、SQLインジェクション対策
    $stmt = $db->prepare($sql);
    // リペアードステートメントから結果セットの生成
    $stmt->execute(params: ["{$city}%"]);

    $result = [];
    // 結果セットからレコードの取り出し
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

    // 大阪の市区町村を取り出す（グループ化）
    $sql = "SELECT city FROM $table WHERE pref = '大阪府' GROUP BY city";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $cities = array_column(
        array: $stmt->fetchAll(PDO::FETCH_ASSOC),
        column_key: "city"
    );

    var_dump($result);

}
catch (PDOException $error) {
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
    <h2>SELECT WHERE</h2>

    <form action="" method="GET">
        <select name="city">
            <?php foreach ($cities as $city) : ?>
                <option value="<?= $city ?>"><?=  $city ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit">検索</button>
    </form>

    <div>
        <ul>
            <?php foreach ($result as $town) : ?>
                <li><?= $town ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>