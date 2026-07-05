<?php

require_once __DIR__ . "/../../utility.php";

try{

    $db = new PDO(DB_DSN, DB_USER , DB_PASS);
    $categoryTable = TB_CATEGORIES;
    // categoriesテーブルからカテゴリー一覧の取り出し
    $sql = "SELECT * FROM {$categoryTable}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $categories = [];
    while ($row = $stmt->fetch(PDO ::FETCH_ASSOC)){
        $categories[] = $row;
    }
}

catch(PDOException $error){
    print $error->getMessage();
}

// レスポンスヘッダーの設定
headers([
    "Content-Type" => "application/json",
    "Access-Control-Allow-Origin" => "*",
]);
// レスポンスステータスコードの設定
http_response_code(200);

print json_encode($categories);
