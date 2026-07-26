<?php

require_once __DIR__ . "/utility.php";

// [DELETE]メソッドをチェック
if(
    filter_input(INPUT_SERVER, "REQUEST_METHOD") !== "POST" ||
    filter_input(INPUT_POST, "_method") !== "DELETE"
){
    // kadai06_1.php へ リダイレクト
    redirect("kadai06_1.php");
}

var_dump($_POST);

$productCode = filter_input(INPUT_POST, "product_code");

try{
    // レコードを削除
    "DELETE FROM php1_products WHERE code = ?";

}
catch(PDOException $e){

}
catch(Exception $e){

}