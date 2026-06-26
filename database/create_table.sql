-- コメント
# コメント

-- テーブルの削除(DROP TABLE文)
DROP TABLE IF EXISTS php1_apllications;

-- テーブルの作成(CREATE TABLE文)
CREATE TABLE php1_apllications(
    -- 項目名 データ型 オプションズ
    id INT UNSIGNED AUTO_INCREMENT, -- 主キー
    name VARCHAR(128) NOT NULL,     -- アプリケーション名
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP, -- 作成日時

    PRIMARY KEY(id)
);

-- テストデータの挿入(INSERT INTO文)
INSERT INTO php1_apllications(name) VALUES
("Figma"),
("Illustrator"),
("Visual Studio Code"),
("Photoshop");

-- レコードの抽出
SELECT name, created_at FROM php1_apllications;