<?php
// sample07-2.php

// アップロードしたファイル情報
var_dump($_FILES);

// アップロードファイル情報
$files = $_FILES["upfile"];

try{
    // アップロードエラーのメッセージ
    switch($files[ "error" ]){
        case UPLOAD_ERR_OK: break;//0
        case UPLOAD_ERR_INI_SIZE: //1
        case UPLOAD_ERR_FORM_SIZE: //2
            $message = "ファイ容量がオーバー";
            break;
        case UPLOAD_ERR_PARTIAL: break;//3
        case UPLOAD_ERR_NO_FILE: //4 
            $message = "アップロード失敗";
            break;
        case UPLOAD_ERR_NO_TMP_DIR://6
        case UPLOAD_ERR_CANT_WRITE://7
            $message="システム障害が起きている";
            break;
        // case UPLOAD_ERR_EXTENSION://8
        //     $message = "システム障害が起きてる";
        //     break;
    }

    // パターン２
    // $message = match($files[ "error" ]){
    //     UPLOAD_ERR_INI_SIZE   => "ファイル容量がオーバー",
    //     UPLOAD_ERR_FORM_SIZE  => "ファイル容量がオーバー",
    //     UPLOAD_ERR_PARTIAL    => "アップロード失敗",
    //     UPLOAD_ERR_NO_FILE    => "アップロード失敗",
    //     UPLOAD_ERR_NO_TMP_DIR => "システム障害が起きている",
    //     UPLOAD_ERR_CANT_WRITE => "システム障害が起きている",
    // };

    // エラーがあった場合は、例外処理
    if( $files[ "error" ] ){
        throw new Exception( $message );
    }

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
        
        // 拡張子の取り出し
        // パターン１
        // $extension = explode(".", $files{ "name" });
        // $extension = $extension[ count ($extension) - 1 ];
        // $filename .= ".{$extension}";
        // // パターン２
        // $filename .= match($files[ "type" ]){
        //     "image/jpeg" => ".jpg",
        //     "image/png"  => ".png",
        //     "image/gif"  => ".gif",
        //     "image/webp" => ".webp",
        // };
        // パターン３
        $finfo = new finfo(FILEINFO_EXTENSION);
        $extension = $finfo->file($files[ "tmp_name" ]);
        $filename .= ".{$extension}";

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
}
catch(Exception $error){
    print $error->getMessage();
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
    <h1>テンプレート</h1>
</body>
</html>