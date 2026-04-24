<?php
// sample01-3.php

// 配列データ
$classes = [
    "WD1A", "WD2A", "WD3A",
];

// 複雑な配列データ
$schools = [
    [
        "id" => 1,
        "name" => "ECCコンピュータ専門学校",
        "collages" => [
            [
                "id" => 1,
                "name" => "IT",
                "courses" => [
                    [
                        "id" => 1,
                        "name" => "Webデザイン",
                        "short_name" => "WD"
                    ],
                    [
                        "id" => 2,
                        "name" => "システム開発研究",
                        "short_name" => "IE"
                    ]
                ]
            ],
            [
                "id" => 1,
                "name" => "ゲームクリエイティブ",
                "courses" => []
            ],
        ]
    ]
];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    <h1>ループ処理</h1>
    <h2>foreach</h2>
    <ul>
    <?php foreach($classes as $key => $class): ?>
        <li><?= $key ?> : <?= $class ?></li>
    <?php endforeach ?>
    </ul>

    <h2>複雑な配列データ</h2>
    <ul>
        <?php foreach($schools as $school): ?>
        <li><?= $school["name"] ?>
            <ul>
                <?php foreach($school["collages"] as $collage): ?>
                <li><?= $collage["name"] ?>カレッジ
                    <ul>
                        <?php foreach($collage["courses"] as $courses): ?>
                        <li><?= $courses["name"] ?>コース</li>
                        <?php endforeach ?>
                    </ul>
                </li>
            <?php endforeach ?>
            </ul>
        </li>
        <?php endforeach ?>
    </ul>

</body>
</html>