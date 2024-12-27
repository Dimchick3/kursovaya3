<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Проверка, что пользователь администратор
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}
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
        Авторизация
    </title>


    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- Custom styles for this site -->
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
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Главная страница <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../shop.php">
                            Купить
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../why.php">
                            Почему мы?
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="../contact.html">СВЯЗАТЬСЯ</a>
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
                    <a href="basket.html">
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
<body>
<style>
    /* Центрируем контейнер */
    html, body {
        height: 100%; /* Делаем body и html элементами, которые занимают всю высоту */
        margin: 0; /* Убираем отступы по умолчанию */
        display: flex;
        justify-content: center; /* Центрируем по горизонтали */
        align-items: center; /* Центрируем по вертикали */
        background-color: #f4f4f4; /* Фон страницы */
        font-family: Arial, sans-serif; /* Шрифт для страницы */
    }

    /* Стиль для коробки */
    .admin-box {
        background-color: #f0f0f0; /* Светло-серый фон */
        padding: 20px;
        border-radius: 15px; /* Круглые углы */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Тень вокруг коробки */
        width: 300px; /* Ширина коробки */
        text-align: center; /* Центрируем текст внутри коробки */
    }

    /* Стиль для заголовка */
    .admin-box h1 {
        font-size: 20px;
        color: #333; /* Цвет текста */
    }

    /* Стили для списка */
    .admin-box ul {
        list-style-type: none; /* Убираем маркеры */
        padding: 0;
    }

    /* Стиль для каждого пункта списка */
    .admin-box li {
        margin: 10px 0;
    }

    /* Стиль для ссылок */
    .admin-box a {
        text-decoration: none;
        color: #007bff; /* Синий цвет для ссылок */
        font-weight: bold;
    }

    .admin-box a:hover {
        color: #0056b3; /* Цвет ссылки при наведении */
    }
</style>

<div class="admin-box">
    <h1>Добро пожаловать, администратор <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <ul>
        <li><a href="manage_products.php">Управление товарами</a></li>
        <li><a href="manage_users.php">Управление пользователями</a></li>
        <li><a href="manage_orders.php">Управление заказами</a></li>
    </ul>
</div>
</body>
</html>
