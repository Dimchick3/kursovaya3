<?php
session_start();
include('../db.php');

// Проверяем, является ли пользователь администратором
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Добавление товара
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Для простоты, предполагаем, что путь к изображению вводится вручную

    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "Товар добавлен!";
    } else {
        echo "Ошибка: " . $conn->error;
    }
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
    <style>
        /* Центрируем контейнер */
        html, body {
            height: 100%; /* Делаем body и html элементами, которые занимают всю высоту */
            margin: 0; /* Убираем отступы по умолчанию */
            display: flex;
            justify-content: center; /* Центрируем по горизонтали */
            align-items: flex-start; /* Центрируем по вертикали, но оставляем пространство сверху */
            background-color: #f4f4f4; /* Фон страницы */
            font-family: Arial, sans-serif; /* Шрифт для страницы */
        }

        /* Отступ от хедера */
        .admin-container {
            display: flex;
            justify-content: space-between; /* Размещаем элементы с пробелом между ними */
            width: 80%; /* Устанавливаем ширину контейнера */
            max-width: 1200px; /* Ограничиваем максимальную ширину */
            margin-top: 40px; /* Отступ сверху для отступа от хедера */
        }

        /* Стиль для коробки с формой для добавления товара */
        .admin-box {
            background-color: #f0f0f0; /* Светло-серый фон */
            padding: 20px;
            border-radius: 15px; /* Круглые углы */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Тень вокруг коробки */
            width: 48%; /* Ширина коробки для формы */
        }

        /* Стиль для заголовка */
        .admin-box h1 {
            font-size: 20px;
            color: #333; /* Цвет текста */
        }

        /* Стиль для формы */
        .admin-box form {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Отступы между полями формы */
            margin-bottom: 20px;
        }

        .admin-box label {
            text-align: left; /* Выравнивание текста по левому краю */
        }

        .admin-box input, .admin-box textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .admin-box button {
            background-color: #007bff; /* Синий цвет для кнопки */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .admin-box button:hover {
            background-color: #0056b3; /* Цвет кнопки при наведении */
        }

        /* Стили для списка товаров */
        .product-list {
            width: 48%; /* Ширина контейнера для списка товаров */
            background-color: #f0f0f0; /* Светло-серый фон */
            padding: 20px;
            border-radius: 15px; /* Круглые углы */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Тень вокруг коробки */
        }

        .product-list h2 {
            font-size: 20px;
            color: #333;
        }

        .product-list ul {
            list-style-type: none; /* Убираем маркеры */
            padding: 0;
        }

        .product-list li {
            margin: 10px 0;
        }

        .product-list a {
            text-decoration: none;
            color: #007bff;
        }

        .product-list a:hover {
            color: #0056b3;
        }
    </style>
    </head>
    <body>

    <!-- Хедер сайта -->
    <header>
        <h1 style="text-align: center;">Управление товарами</h1>
    </header>

    <div class="admin-container">
        <!-- Форма для добавления товара -->
        <div class="admin-box">
            <h1>Добавление товара</h1>
            <form action="manage_products.php" method="POST">
                <label for="name">Название товара:</label>
                <input type="text" name="name" required>
                <br>
                <label for="description">Описание:</label>
                <textarea name="description" required></textarea>
                <br>
                <label for="price">Цена:</label>
                <input type="number" name="price" required>
                <br>
                <label for="image">Изображение (URL):</label>
                <input type="text" name="image" required>
                <br>
                <button type="submit" name="add_product">Добавить товар</button>
            </form>
        </div>

        <!-- Список товаров -->
        <div class="product-list">
            <h2>Список товаров</h2>
            <ul>
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<li>{$row['name']} - {$row['price']} $ <a href='edit_product.php?id={$row['id']}'>Редактировать</a> | <a href='delete_product.php?id={$row['id']}'>Удалить</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    </body>
</html>
</ul>
</body>
</html>
