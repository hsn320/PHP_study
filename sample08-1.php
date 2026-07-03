<?php
// sample08-1.php

require_once __DIR__ . "/kadai02_resource.php";

// コンテンツタイプをJSONに設定
header("Content-Type: application/json; charset=UTF-8");
// クロスオリジンの許可
header("Access-Control-Allow-Origin: *");
// JSONへ変換
print json_encode($products);
