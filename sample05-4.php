<?php

$products = [
    ["id" => 1, "name" => "ノートパソコン", "price" => 150000],
    ["id" => 2, "name" => "スマートフォン", "price" => 80000],
    ["id" => 3, "name" => "ワイヤレスイヤホン", "price" => 15000],
];


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div>
        <h1>商品一覧</h1>
        <div class="product-grid">
        <div>
            <h3></h3>
            <p>&yen;</p>
            <form action="" method="post">
            <input type="hidden" name="product_id" value="">
            <button type="submit" name="add">カートに入れる</button>
            </form>
        </div>
        </div>

        <hr>

        <h2>ショッピングカート</h2>
        <p>カートは空です。</p>
        <table>
        <thead>
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td></td>
                <td>&yen;</td>
                <td></td>
                <td>&yen;</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">合計金額</th>
                <th>&yen;</th>
            </tr>
        </tfoot>
        </table>
        <form action="" method="post">
            <button type="submit" name="clear">カートを空にする</button>
        </form>
    </div>
</body>

</html>