<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/style.css" rel="stylesheet">

  <!-- script -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>php1 - kadai05_2</title>
</head>
<body class="bg-slate-50">
<div class="wrapper w-screen h-screen box-border">

<header class="bg-teal-500">
  <div class="container mx-auto px-2 py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">ファイル処理</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container w-full h-full mx-auto px-2 py-20">
    <h3 class="text-xl border-b-2 border-green-400 mb-10 pb-2">画像のアップロード</h3>

    <div class="p-10 border border-gray-200">
    
      <figure><img src="" class="object-contain object-center"></figure>
    
      <?php // アップロードエラーのHTML ?>
      <p class="text-pink-600 text-xl py-10">エラーメッセージを表示</p>
    
    </div>

    <div class="flex justify-center mt-10">
      <a href="#" class="block w-40 h-10 text-white text-center leading-10 bg-gray-500 hover:bg-gray-400 rounded-md">戻る</a>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
<!-- <script src="asset/scripts/kadai05.js"></script> -->
</body>
</html>