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
        TECHP0WER
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
            <a class="navbar-brand" href="index.php">
          <span>
            TECHP0WER
          </span>
                <?php
                session_start(); // Обязательно для работы с сессиями

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
                        <a class="nav-link" href="../why.php">
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
                        <a href="php/logout.php">
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
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .message {
        padding: 15px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .message.success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    .order-summary {
        margin-top: 20px;
    }

    .order-summary h3 {
        text-align: center;
        font-size: 20px;
        color: #333;
    }

    .order-summary ul {
        list-style: none;
        padding: 0;
        font-size: 16px;
    }

    .order-summary li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .order-summary li:last-child {
        border-bottom: none;
    }

    .total-price {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        text-align: right;
        margin-top: 10px;
    }

    .btn {
        display: block;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        text-align: center;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        text-decoration: none;
    }

    .btn:hover {
        background-color: #218838;
    }
</style>
<div class="container">
<?php




include('../db.php');

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    echo "Пожалуйста, войдите в систему, чтобы оформить заказ.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Получаем все товары из корзины
$sql = "SELECT product_id, quantity FROM cart WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];

        // Здесь можно добавить логику сохранения заказа в таблице заказов (orders)
        // Пример:
        // $sql = "INSERT INTO orders (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
        // $conn->query($sql);
    }

    // Очищаем корзину после оформления заказа
    $sql = "DELETE FROM cart WHERE user_id = $user_id";
    $conn->query($sql);

    echo "Ваш заказ оформлен!";
} else {
    echo "Ваша корзина пуста.";
}

?>
</div>