<?php
// sample02-1

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>Formのデータ送受信</h1>
    <h2>送信側</h2>
    <form action="sample02-2.php" method="POST">
        <label for="">Name</label>
        <input type="text" id="name" name="name">

        <button type="submit">送信</button>
    </form>
</body>
</html>