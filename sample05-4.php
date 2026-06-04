<?php

$products = [
    ["id" => 1, "name" => "ノートパソコン", "price" => 150000],
    ["id" => 2, "name" => "スマートフォン", "price" => 80000],
    ["id" => 3, "name" => "ワイヤレスイヤホン", "price" => 15000],
];



session_start();

$cart = [];
// セッションのカートを取り出す、無ければ初期状態のカートを保存する
if($_SESSION[ "cart" ]) {
    $cart = $_SESSION[ "cart" ];
}
else {
    $_SESSION[ "cart" ] = $cart;
}

// POST送信の処理（カートへ商品追加、カートのリセット）
if(filter_input(INPUT_SERVER, "REQUEST_METHOD") === "POST"){
    // buttonのnameぞくっせいの項目でどちらかのsubmitによるPOST送信かで処理を分岐
    // カートへ商品追加
    if(isset($_POST[ "add" ])){
        print "add";
        $productId = filter_input(INPUT_POST, "product_id", FILTER_VALIDATE_INT);
        // カートに商品IDを追加
        foreach($products as $product) {
            if($product[ "id" ] === $productId) {
                break;
            }
        }

        // カートが空なら商品追加、空で無ければ重複チェック
        if($cart){

        }
        else{
            $cart[] = [
                "id" => $product[ "id" ],
                "name" => $product[ "name" ],
                "num" => 1,
                "total" => $product *
            ];
        }

    }

    // カートのリセット
    if(){

    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f4f4f4;
            font-family: sans-serif;
            padding: 20px;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
        }

        .product-grid {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .product {
            border-radius: 4px;
            border: 1px solid #ddd;
            flex: 1;
            padding: 15px;
            text-align: center;
        }

        .product h3 {
            margin: 0 0 10px;
        }

        button {
            background: #28a745;
            border-radius: 4px;
            border: none;
            color: white;
            cursor: pointer;
            padding: 8px 16px;
        }

        .cart-table {
            border-collapse: collapse;
            margin-bottom: 20px;
            width: 100%;
        }

        colgroup col:nth-of-type(1) {
            width: 300px;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #eee;
            padding: 10px;
            text-align: left;
        }

        .cart-table th {
            background: #fafafa;
        }

        tfoot th {
            text-align: right;
        }

        .btn-clear {
            background: #dc3545;
        }
    </style>

</head>

<body>
    <div>
        <h1>商品一覧</h1>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div>
                    <h3><?=  $product[ "name" ] ?></h3>
                    <p>&yen;<?= number_format($product["price"]) ?></p>
                    <form action="sample05-4.php" method="post">
                        <input type="hidden" name="product_id" value="">
                        <button type="submit" name="add">カートに入れる</button>
                    </form>
                </div>
            <?php endforeach ?>
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