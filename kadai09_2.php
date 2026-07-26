<?php

require_once __DIR__ . "/utility.php";

// [PUT]メソッドかをチェック
if(
    filter_input(INPUT_SERVER, "REQUEST_METHOD") !== "POST" ||
    filter_input(INPUT_POST, "_method") !== "PUT"
){
    // kadai06_1.php へ リダイレクト
    redirect("kadai06_1.php");
}

$request = filter_input_array(INPUT_POST,[
    "product_code" => FILTER_FLAG_NONE,
    "name" => FILTER_FLAG_NONE,
    "price" => FILTER_VALIDATE_INT,
    "category" => FILTER_VALIDATE_INT,
]);
var_dump($request);

try{
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    $table = TB_PRODUCTS;
    $sql = "UPDATE {$table} SET code = ?, name = ?, price = ?, category = ? WHERE code = {$request["product_code"]}";
    $stmt = $db->prepare($sql);
    $stmt->execute(array_values($request));

    // kadai07_1.php へ リダイレクト
    redirect("kadai07_1.php?product_code={$request["product_code"]}");
}
catch (PDOException $e){
    print $e->getMessage();
}
catch (Exception $e){
    print $e->getMessage();
}