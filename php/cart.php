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
                        <a class="nav-link" href="shop.html">
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

<?php
include('../db.php');  // Подключаем файл с настройками базы данных

$user_id = $_SESSION['user_id'];  // Идентификатор текущего пользователя

// Запрос для получения всех товаров из корзины пользователя
$sql = "SELECT c.id, p.name, p.price, p.image, c.quantity 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Проверяем, есть ли товары в корзине
if ($result->num_rows > 0) {
    echo "<h2>Ваша корзина</h2>";
    echo "<ul>";
    $total_price = 0;
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' style='width: 50px;'>";
        echo $row['name'] . " - " . $row['price'] . " USD x " . $row['quantity'];
        echo "</li>";
        $total_price += $row['price'] * $row['quantity'];
    }
    echo "</ul>";
    echo "<h3>Общая сумма: " . $total_price . " USD</h3>";
    echo "<button onclick='window.location.href=\"checkout.php\"'>Перейти к оплате</button>";
} else {
    echo "<p>Ваша корзина пуста.</p>";
}
?>
