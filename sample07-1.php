<?php
// sample07-1.php

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
    <form action="sample07-2.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

        <label>File</label>
        <input type="file" name="upfile" accept="image/*">
        <button type="submit">アップロード</button>
    </form>
</body>
</html>