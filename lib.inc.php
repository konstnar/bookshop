<?php

include_once __DIR__ . '/include/config.inc.php';

function connect_db()
{
    try {
        $pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    } catch (PDOException $e) {
        $error = '<h1>При подключении к базе данный возникла ошибка</h1>' . 
                 '<h2 class="error">' . $e->getMessage() . '</h2>';
        include __DIR__ . '/../error.php';
        exit();
    }

    return $pdo;
}
