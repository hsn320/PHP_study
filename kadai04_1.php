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
  <title>php1 - kadai04_1</title>
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
    <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-10">郵便番号で検索する</h3>
    <form action="kadai04_2.php" method="GET">
      <div class="flex flex-wrap flex-col md:flex-row py-10">
        <div class="w-full md:w-1/2 mr-5">
          <input type="text" name="zip" id="zip" class="text-md w-full p-2 mb-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none" maxlength="" value="">
          <p class="text-sm">３桁以上の数字を入力してください</p>
        </div>
        <div class="mt-10 md:mt-0">
          <button type="submit" class="w-40 h-10 text-white text-lg bg-pink-600 hover:bg-pink-500 rounded-md">検索する</button>
        </div>
      </div>
    </form>
  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>