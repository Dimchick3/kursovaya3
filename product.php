<?php
// Подключаем базу данных
include('db.php');

// Получаем ID товара из URL
$product_id = $_GET['id'];

// Получаем данные о товаре из базы данных
$query = "SELECT * FROM products WHERE id = '$product_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
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
            TECHP0WER
        </title>


        <!-- slider stylesheet -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet" />
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
                        <a class="nav-link" href="index.php">Главная страница <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">
                            Купить
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="why.php">
                            Почему мы?
                        </a>
                    </li>



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

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_left">
                <h2><?php echo $row['name']; ?></h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="<?php echo $row['image']; ?>" alt="product image" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-box11">
                        <h6><?php echo $row['name']; ?></h6>
                        <p><?php echo $row['description']; ?></p>
                        <h6>Цена <span>$<?php echo $row['price']; ?></span></h6>
                        <form action="php/product_page.php" method="POST">
                            <!-- Скрытые поля с данными товара -->
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                            <!-- Кнопка добавления товара в корзину -->
                            <button type="submit" name="add_to_cart" class="add-to-cart">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php


    // Проверяем, что кнопка "Добавить в корзину" была нажата
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Получаем информацию о товаре
        $product_id = $_POST['product_id'];
        $quantity = 1; // Количество товара (например, 1, если просто добавляем)

        // Получаем user_id из сессии, если пользователь залогинен
        $user_id = $_SESSION['user_id']; // Предположим, что user_id хранится в сессии

        // Получаем текущее время
        $added_at = date("Y-m-d H:i:s");

        // Подготовка запроса
        $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, added_at) VALUES (?, ?, ?, ?)");

        // Привязка параметров
        $stmt->bind_param("iiis", $user_id, $product_id, $quantity, $added_at);

        // Выполнение запроса
        if ($stmt->execute()) {
            echo "Товар успешно добавлен в корзину!";
        } else {
            echo "Ошибка добавления товара в корзину!";
        }

        // Закрытие запроса
        $stmt->close();
    }

    // Закрываем соединение с базой данных
    $conn->close();
    ?>

