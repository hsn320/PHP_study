<?php
// sample07-1.php


// アップロードしたファイル情報
var_dump($_FILES);

// アップロードファイル情報
$files = $_FILES["upfile"];

// アップロードしたファイルのチェックif
if( is_uploaded_file($files["tmp_name"])){

    // 重複しないファイル名の生成(トークンの生成)
    // パターン１
    // $patternStrings = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    // $length = 15;
    // $flag = true;
    // while($flag){
    //     $flag = false;
    //     $filename = "";
    //     for($i = 0; $i < $length; $i++){
    //         $filename .= substr($patternStrings, rand(0, strlen($patternStrings) - 1),1);
    //     }
    //     // 生成したトークンの強度チェック
    //     if( 
    //         !preg_match("/[a-z]+/", $filename) ||
    //         !preg_match("/[A-Z]+/", $filename) ||
    //         !preg_match("/[0-9]+/", $filename)
    //     ){
    //         $flag = true;
    //     }
    // }

    // パターン２
    $filename = base64_encode(random_bytes(15));
    // 不要な記号を削除
    $filename = str_replace(["=", "/", "+", "."], "", $filename);
    // 文字数を合わせる（多い文を消す）
    $filename = substr($filename, 0, 15);
    print $filename . "(" . strlen($filename) . ")";

    // ファイルをアップロードするフォルダがあるかチェック
    // なければ、フォルダを生成
    if( !is_dir("files/upload_images") ){
        // フォルダの生成
        mkdir("files/upload_images");
        // フォルダの権限設定
        chmod("files/upload_images", 0777);
    }
    // アップロードしたファルを所定のフォルダへ移動
    if( move_uploaded_file( $files[ "tmp_name" ],"files/upload_images/{$filename}.png" ))
    {
    }
    else{
        print "アップロード先に移動できなかった";
    }
}
else {
    print "不正なファイル";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>ファイルのアップロード</h1>
    <form action="sample07-1.php" method="POST" enctype="multipart/form-data">
        <label>File</label>
        <input type="file" name="upfile" accept="image/*">
        <button type="submit">アップロード</button>
    </form>
</body>
</html>