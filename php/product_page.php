<?php
session_start();
include('../db.php');  // Подключаем базу данных

// Проверяем, что товар выбран и пользователь авторизован
if (isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];  // Получаем id пользователя из сессии
    $product_id = $_POST['product_id'];  // Получаем id товара из формы (или URL)
    $quantity = 1;  // Количество товара, например, всегда 1 (по умолчанию)

    // Подготовка SQL запроса для добавления товара в корзину
    $stmt_insert = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, added_at) VALUES (?, ?, ?, ?)");

    // Время добавления товара
    $added_at = date("Y-m-d H:i:s");

    // Привязываем параметры
    $stmt_insert->bind_param('iiis', $user_id, $product_id, $quantity, $added_at);

    // Выполняем запрос
    if ($stmt_insert->execute()) {
        // После успешного добавления товара в корзину, редиректим на страницу корзины
        header("Location: cart_page.php");
        exit();  // Завершаем выполнение скрипта, чтобы предотвратить дальнейший вывод
    } else {
        echo "<script>alert('Ошибка при добавлении товара в корзину.');</script>";
    }

    // Закрываем запрос
    $stmt_insert->close();
}

// Закрываем соединение с базой данных
$conn->close();
?>
