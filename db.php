<?php
$servername = "localhost";
$username = "root";
$password = ""; // Пароль для MySQL (по умолчанию пуст в XAMPP)
$dbname = "shop"; // Имя базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
