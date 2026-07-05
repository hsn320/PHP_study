<?php

require_once __DIR__ . "/../../utility.php";

try{

  // GETパラメーターの取り出し
    $name = filter_input(INPUT_GET, "name");
    $categoryID = filter_input(INPUT_GET, "category");

  // WHEREのSQLサンプル
  // nameだけ: WHERE name LIKE '%商品名%'
  // categoryだけ: WHERE category_id = カテゴリーID
  // 両方: WHERE name LIKE '%商品名%' AND category_id = カテゴリーID
    $queryParams = [];
    $bindParams = [];
    if($name) {
        $queryParams[] = "name LIKE ?";
        $bindParams[] = "%{$name}%";
    }
    if($categoryID){
        $queryParams[] = "category_id = ?";
        $bindParams[] = $categoryID;
    }

    $where = $queryParams ?
    " WHERE ". implode(" AND ", $queryParams) :
    "";

    $db = new PDO(DB_DSN, DB_USER , DB_PASS);
    
    $categoryTable = TB_CATEGORIES;
    $productTable = TB_PRODUCTS;
    
    // productsテーブルから商品一覧の取り出し
    $sql = "SELECT * FROM {$productTable} {$where}";
    // SQLの プリペアードステ０とメントの準備と実行
    $stmt  = $db->prepare($sql);
    $stmt -> execute($bindParams);
    // 商品検索の結果セットを取り出す
    $products = [];
    while ($row = $stmt -> fetch(PDO ::FETCH_ASSOC)){
        $products[] = $row;
    }

}
catch(PDOException $error){
    print $error->getMessage();
}

// レスポンスの準備
headers([
    "Content-Type" => "application/json",
    "Access-Control-Allow-Origin" => "*",
]);
// レスポンスステータスコードの設定
http_response_code(200);

print json_encode($products);
