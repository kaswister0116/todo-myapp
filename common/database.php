<?php
/**
 * PDOを使ってデータベースに接続する
 * @return PDO
 */

function getDatabaseConnection() {
    $host = '127.0.0.1';
    $db = 'ToDo_DB';
    $user = 'todo_user';
    $pass = 'MySQL_DB_Pass';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try
    {
        $database_handler = new PDO($dsn, $user, $pass, $options);
    }
    catch(PDOException $e)
    {
        echo "DB接続に失敗しました。<br/>";
        echo $e->getMessage();
        exit;
    }
    return $database_handler;
}
?>