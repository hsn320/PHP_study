<?php
require_once __DIR__ . "/kadai02_resource.php";

// Cookieから閲覧した商品履歴の呼び出し
$history = filter_input(INPUT_COOKIE, "php1_kadai02");
if($history){
  // 区切り文字を基準にデータを分割
  $history = explode("/", $history);
}
else {
  $history = [];
}

// kadai02_resource から history に含まれる商品IDに該当する商品情報を抜き出す
$historyProducts = [];
foreach($history as $id){
  foreach($products as $product){
    if((int)$id === $product[ "id" ]){
      $historyProducts[] = $product;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="css/style.css" rel="stylesheet">

  <!-- script -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>php1 - kadai02_1</title>
</head>
<body class="bg-slate-50">
<div class="wrapper box-border">

<header class="bg-teal-500">
  <div class="container mx-auto px-2 py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-3xl text-white">クッキー</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container w-full h-full mx-auto px-2 py-20">

    <h2 class="text-xl border-b-2 border-pink-400 pb-2 mb-10">取り扱いクッキー</h2>
    <div class="product-wrap flex flex-col lg:flex-row justify-evenly flex-wrap mb-20">
    <?php foreach($products as $product): ?>
      <div class="flex-shrink-0 w-full lg:w-1/6 h-72 bg-gray-50 border rounded-md shadow hover:shadow-lg mr-20 mb-20">
        <a href="kadai02_2.php?product_id=<?= $product[ "id" ] ?>" class="flex flex-col w-full h-full p-2">
          <h3 class="order-2 flex-grow font-bold my-5"><?= $product[ "name" ] ?></h3>
          <figure class="order-1 h-3/5 overflow-hidden">
            <img src="images/<?= $product[ "thumbnail" ][ "small" ] ?>" class="w-full">
          </figure>
          <p class="order-3 text-pink-400 text-sm">¥<?= $product[ "price" ] ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <h2 class="text-xl border-b-2 border-pink-400 pb-2 mb-10">閲覧したクッキー</h2>
    <div class="product-wrap flex overflow-x-scroll mb-20">
      <?php foreach( $historyProducts as $product): ?>
      <div class="flex-shrink-0 w-full lg:w-1/6 h-72 bg-gray-50 border rounded-md shadow hover:shadow-lg mr-20 mb-20">
        <a href="kadai02_2.php?product_id=<?= $product[ "id" ] ?>" class="flex flex-col w-full h-full p-2">
          <h3 class="order-2 flex-grow font-bold my-5"><?= $product[ "name" ] ?></h3>
          <figure class="order-1 h-3/5 overflow-hidden">
            <img src="images/<?= $product[ "thumbnail" ][ "small" ] ?>" class="w-full">
          </figure>
          <p class="order-3 text-pink-400 text-sm">¥<?= $product[ "price" ] ?></p>
        </a>
      </div>
      <?php endforeach ?>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>