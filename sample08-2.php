<?php
// sample08-2.php

// cURLでAPIと通信を行う
$curl = curl_init("http://10.202.10.3/ecc/huemori/php1/sample08-1.php");

curl_setopt_array(
    handle: $curl,
    options:[
        CURLOPT_RETURNTRANSFER => true,
    ]
);

$result = curl_exec($curl) ?: "通信失敗";

$result = json_decode($result);

// idとnameだけに絞る
$products = [];
foreach($result as $key => $product){
    $temp = new stdClass();
    $temp->id = $product->id;
    $temp->name = $product->name;
    $products[] = $temp;
}

// JSONデータの返却準備
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); //クロスオリジン許可
print json_encode($products);