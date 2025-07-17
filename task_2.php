<?php
/*
Для работы скрипта необходимо выполнить задать значения переменных: 
сервер(на котором расположена база данных), имя пользователя, пароль и порт, если он отличается от стандартного
*/
$host = "localhost";
$username = "root";
$password = "qq";
$port = null;

$connection = new mysqli($host, $username, $password, "goods_accounting", $port);



// Запрос, удаляющий категории, у которых нет продуктов
$query_1 = "
DELETE c
FROM categories c
LEFT JOIN products p on p.category_id = c.id
WHERE p.id IS null;
";
if($connection->query($query_1)){
    echo "Категории без продуктов удалены\n";
}else{
    echo "Неизвестная ошибка сервера\n";
}



// Запрос, удаляющий продукты, которых нет в наличии
$query_2 = "
DELETE p
FROM products p
LEFT JOIN availabilities a on a.product_id = p.id
WHERE a.id IS null;
";
if($connection->query($query_2)){
    echo "Продукты, которых нет в наличии удалены\n";
}else{
    echo "Неизвестная ошибка сервера\n";
}



// Запрос, удаляющий склады, где нет товаров
$query_3 = "
DELETE s
FROM stocks s
LEFT JOIN availabilities a on a.stock_id = s.id
WHERE a.id IS null;
";
if($connection->query($query_1)){
    echo "Склады без товаров удалены\n";
}else{
    echo "Неизвестная ошибка сервера\n";
}
?>