<?php

require_once __DIR__ . "/config.php";

// 
// headers
// header関数を生成
// 
function headers(array $params): void{
    foreach ($params as $key => $param) {
        header("{$key}: {$param}");
    }
}

// 
// redirect
// 
function redirect(string $dest):void{
    header("Location: {$dest}");
    exit;
}