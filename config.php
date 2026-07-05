<?php
// 定数などのサイトの設定を定義する

const SITE_NAME = "サーバーサイド１";

const DOCUMENT_ROOT = __DIR__;
const WEB_ROOT = "https://10.202.10.3/ecc/huemori/php1/";

// DB関連
const DB_DROVER = "mysql";
const DB_HOST = "localhost";
const DB_NAME = "huemori";
const DB_USER = "huemori";
const DB_PASS = "eccMyAdmin";
const DB_CHAR = "utf8mb4";
const DB_DSN = DB_DROVER.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHAR;
// "mysql:host=localhost;dbname=huemori;charset=utf8mb4"

// テーブル関連
const TB_ZIP = "php1_zip";
const TB_CATEGORIES = "php1_categories";
const TB_PRODUCTS = "php1_products";