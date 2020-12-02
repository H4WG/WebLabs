<?php

    // Робота програми здійснюється через Docker.

    // Здійснюю з'єднання з БД через mysql.
    $mysql = @new mysqli('mysql', 'user', 'password');

    // Перевіряємо чи успішно ми з'єдналися з БД.
    if ($mysql->connect_error) {
        die("Не вдалося з'єднатися з БД");
    }

    // Перевіряємо чи існує БД, якщо ні, то тоді створюємо.
    if (!$mysql->select_db("MyDB"))
    {
        $mysql->query("CREATE DATABASE `MyDB`");
    }

    $mysql->select_db("MyDB"); // Обираємо базу данних.

    // Створююмо таблицю Pictures.
    $mysql->query("CREATE TABLE `Pictures`
                 (id int(11) auto_increment,
                  picture varchar(100) default NULL,
                  category varchar(100) default NULL,
                  URL varchar(100) default NULL,
                  PRIMARY KEY(id))") or die($mysql->error);

    echo "<h4>Таблиця Pictures успішно створена</h4>";

    // Створюю таблицю Words.
    $mysql->query("CREATE TABLE Words
                 (id int(11) auto_increment,
                  word varchar(100) default NULL,
                  IDp int(11) default NULL,
                  PRIMARY KEY(id))") or die($mysql->error);

    echo "<h4>Таблиця Words успішно створена</h4>";

    $mysql->close(); // Закриваємо з'єднання.

?>
