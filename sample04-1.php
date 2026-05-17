<?php
// temp.php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>多重ループ</h1>
    <h2>九九の表</h2>
    <table>
        <?php for($i = 1; $i < 10; $i++): ?>
        <tr>
            <?php for($j = 1; $j < 10; $j++): ?>
            <td>
                <?=  $i * $j ?>
            </td>
            <?php endfor ?>
        </tr>
        <?php endfor ?>
    </table>

    <h2>チェスボード</h2>

    <table style="width:400px; height:400px; border:1px solid black;">
        <?php for($i = 1; $i <= 8; $i++): ?>
        <tr>
            <?php for($j = 1; $j <= 8; $j++): ?>
                <?php if( $i % 2 ): ?>
                    <td style="background:black"></td>
                    <td></td>
                <?php else: ?>
                    <td></td>
                    <td style="background:black"></td>
                <?php endif ?>
            <?php endfor ?>
        </tr>
        <?php endfor ?>
    </table>
</body>
</html>