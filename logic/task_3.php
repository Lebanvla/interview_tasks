<?php
/*
    Для работы скрипта необходимо выполнить задать значения переменных: 
    сервер(на котором расположена база данных), имя пользователя, пароль и порт, если он отличается от стандартного
*/
$host = "localhost";
$username = "root";
$password = "qq";
$port = null;
$connection = new mysqli($host, $username, $password, "site", $port);
$connection->query("
    CREATE TABLE IF NOT EXISTS `comments` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `text` TEXT NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");

function get_comments(mysqli $connection): mysqli_result{ 
    $result = $connection->query("select text from comments;");
    return $result;
}

function create_comment(mysqli $connection){
    $stmt = $connection->prepare("insert into comments(text) values(?);");
    $stmt->bind_param("s", $_POST["commentary_text"]);
    $stmt->execute();
    $stmt->get_result();
    if($stmt->errno === 0){
        header("Location: task_3.php");
        exit;
    }
}

