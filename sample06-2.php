<?php
// sample06-2.php

// ファイル操作
// ファイルを開く
$fp = fopen("files/zip.csv", "r");

// 行単位で文字列を取り出して、処理を行う
// 次の行がない（EOF）に到着したら false
$zips = [];
while($row = fgets($fp)) {
    if (preg_split("/,/",$row)[1] == "大阪府") {
        [ $zip, $pref, $city, $town ] = explode(",", $row);
        $zips[] = [
            "zip" => $zip,
            "pref" => $pref,
            "city" => $city,
            "town" => $town
        ];
    }
    // var_dump($row);
    // カンマ区切りの文字列をカンマを基準に分割する
    // 各要素内のデータを変数に展開する
    // [ $zip, $pref, $city, $town ] = preg_split("/,/", $row);
}
// ファイルを閉じる
fclose($fp);
// var_dump($zips);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>郵便番号</h1>
    <table>
        <tr>
            <th>郵便番号</th>
            <th>都道府県</th>
            <th>市区町村</th>
            <th>番地</th>
        </tr>
    <?php foreach($zips as $zip): ?>
        <tr>
            <td><?= $zip[ "zip" ] ?></td>
            <td><?= $zip[ "pref" ] ?></td>
            <td><?= $zip[ "city" ] ?></td>
            <td><?= $zip[ "town" ] ?></td>
        </tr>
    <?php endforeach ?>
    </table>
</body>
</html>