<?php
session_start();
include('../db.php');

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    echo "Пожалуйста, войдите в систему, чтобы просмотреть корзину.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Получаем все товары, добавленные пользователем в корзину
$sql = "SELECT products.name, products.price, cart.quantity
        FROM cart
        JOIN products ON cart.product_id = products.id
        WHERE cart.user_id = $user_id";
$result = $conn->query($sql);

// Рассчитываем общую стоимость
$total_price = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>
        Корзина
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../css/responsive.css" rel="stylesheet" />
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="../index.php">
          <span>
            TECHP0WER
          </span>
                <?php


                // Проверяем, установлена ли сессия пользователя
                if (!isset($_SESSION['user_id'])) {
                    echo "Сессия не установлена.";
                } else {

                }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item ">
                        <a class="nav-link" href="../index.php">Главная страница <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../shop.php">
                            КУПИТЬ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="why.html">
                            ПОЧЕМУ МЫ?
                        </a>
                    </li>
                    <!--            <li class="nav-item">-->
                    <!--              <a class="nav-link" href="testimonial.html">-->
                    <!--                Testimonial-->
                    <!--              </a>-->
                    <!--            </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">СВЯЗАТЬСЯ</a>
                    </li>
                </ul>
                <div class="user_option">
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Если пользователь авторизован, выводим его имя -->
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
        <?php echo htmlspecialchars($_SESSION['username']); ?>
      </span>
                        </a>
                        <a href="logout.php">
                            <span>ВЫЙТИ</span>
                        </a>
                    <?php else: ?>
                        <!-- Если пользователь не авторизован, показываем ссылку на страницу входа -->
                        <a href="php/login.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
        ВОЙТИ
      </span>
                        </a>
                    <?php endif; ?>
                    <a href="php/cart_page.php">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </a>
                    <form class="form-inline ">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>

            </div>
        </nav>
    </header>
    <!-- end header section -->

</div>
<!-- end hero area -->

<!-- shop section -->
<style>
    /* Основной контейнер для корзины */
    .cart-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Стили таблицы */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .cart-table th, .cart-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .cart-table th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    .cart-table tr:hover {
        background-color: #f5f5f5;
    }

    /* Стили для общей стоимости */
    .total-row td {
        font-weight: bold;
    }

    /* Стили кнопки оформления заказа */
    .checkout-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 15px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        display: inline-block;
        margin-top: 20px;
    }

    .checkout-button:hover {
        background-color: #45a049;
    }

    /* Сообщение о пустой корзине */
    .empty-cart {
        font-size: 18px;
        text-align: center;
        color: #555;
    }
</style>

<?php if ($result->num_rows > 0): ?>
    <div class="cart-container">
        <table class="cart-table">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Итого</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>$<?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>$<?php echo $row['price'] * $row['quantity']; ?></td>
                </tr>
                <?php $total_price += $row['price'] * $row['quantity']; ?>
            <?php endwhile; ?>
            <tr class="total-row">
                <td colspan="3">Общая стоимость:</td>
                <td>$<?php echo $total_price; ?></td>
            </tr>
            </tbody>
        </table>

        <form action="checkout.php" method="POST">
            <button type="submit" class="checkout-button">Оформить заказ</button>
        </form>
    </div>
<?php else: ?>
    <p class="empty-cart">Ваша корзина пуста.</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
