<?php
// sample05-1.php
// ログインページ
// ログインしていない時しか残れない（ログイン済みはマイページへリダイレクト）

// セッションの開始
session_start();

if(isset($_SESSION[ "username" ])){
    header("Location: sample05-2.php");
    exit;
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
    <h2>ログイン</h2>
    <form action="sample05-2.php" method="POST">
        <div>
            <label for="">USER ID</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="">PASSWORD</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">ログイン</button>
    </form>

</body>
</html>