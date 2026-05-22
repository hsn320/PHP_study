<?php
// sample05-2.php
// マイページ

// セッションの開始
session_start();

// ログイン認証処理
// セッションにログイン情報がなければ認証処理を行う
if(empty($_SESSION[ "username" ])){
    $users =[
        [ "username" => "user01", "password" => password_hash("123qwe", PASSWORD_DEFAULT) ],
        [ "username" => "user02", "password" => password_hash("initpass", PASSWORD_DEFAULT) ],
        [ "username" => "user03", "password" => password_hash("password", PASSWORD_DEFAULT) ]
    ];
    // $testPassword = "password0124";
    // $hashPassword = password_hash($testPassword, PASSWORD_DEFAULT);
    
    $username = filter_input(INPUT_POST, "username");
    $passWord = filter_input(INPUT_POST, "password");
    $hashPassword = null;
    // ユーザーリストから一致するユーザー名を探す
    foreach($users as $user) {
        if($user [ "username" ] === $username){
            $hashPassword = $user[ "password" ];
            break;
        }
    }

    // ユーザー名とパスワードが一致しているかのチェック
    if(
        $hashPassword &&
        password_verify($passWord, $hashPassword)
        ){
        // 入力したパスワードと暗号化したパスワードが一致したとき
        $_SESSION[ "username" ] = $username;
    }
    else{
        // ログインページ(sample05-1)へリダイレクト
        header("Location: sample05-1.php");
        exit;
    }

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
    <h1>セッション</h1>
    <h2>マイページ</h2>
    <a href="sample05-1.php">sample05-1</a>
    <a href="sample05-3.php">ログアウト</a>
</body>
</html>