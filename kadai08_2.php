<?php

require_once __DIR__ . "/utility.php";

// メソッドの種類をチェック
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    redirect("kadai08_1.php");
}

$request = filter_input_array(INPUT_POST, [
    "product_code" => FILTER_FLAG_NONE,
    "name" => FILTER_FLAG_NONE,
    "price" => FILTER_VALIDATE_INT,
    "category" => FILTER_VALIDATE_INT,
]);
try{

    $db = new PDO(DB_DSN, DB_USER, DB_PASS);

    $table = TB_PRODUCTS;
    $sql = "
        INSERT INTO
            {$table}(
                code, name, price, category_id
            )
            VALUES
                (?, ?, ?, ?)
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute(array_values($request));

    // kadai07_1.php へリダイレクト
    redirect("kadai07_1.php?product_code={$request["product_code"]}");
}
catch (PDOException $error){
    print $error->getMessage();
    print $stmt->queryString;
}
catch (Exception $error){
    print $message = $error->getMessage();
}