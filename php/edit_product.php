<?php
session_start();
include('../db.php');

// Проверка роли администратора
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Получение данных о товаре
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

// Обновление товара
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Товар обновлен!";
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
        Редактирование товара
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
    /* Общие стили для страницы */
    html, body {
        height: 100%; /* Делаем body и html элементами, которые занимают всю высоту */
        margin: 0; /* Убираем отступы по умолчанию */
        display: flex;
        justify-content: center; /* Центрируем по горизонтали */
        align-items: flex-start; /* Центрируем по вертикали, но оставляем пространство сверху */
        background-color: #f4f4f4; /* Фон страницы */
        font-family: Arial, sans-serif; /* Шрифт для страницы */
    }

    /* Контейнер для формы редактирования */
    .form-container {
        display: flex;
        justify-content: center; /* Центрируем форму по горизонтали */
        width: 80%; /* Устанавливаем ширину контейнера */
        max-width: 800px; /* Ограничиваем максимальную ширину */
        margin-top: 40px; /* Отступ сверху для отступа от хедера */
    }

    /* Стиль для формы */
    .form-box {
        background-color: #f0f0f0; /* Светло-серый фон */
        padding: 20px;
        border-radius: 15px; /* Круглые углы */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Тень вокруг коробки */
        width: 100%; /* Ширина формы */
    }

    .form-box h1 {
        font-size: 24px;
        color: #333; /* Цвет текста */
        text-align: center;
    }

    .form-box form {
        display: flex;
        flex-direction: column;
        gap: 15px; /* Отступы между полями формы */
    }

    .form-box label {
        font-size: 16px;
        color: #333; /* Цвет текста для меток */
    }

    .form-box input, .form-box textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-box button {
        background-color: #007bff; /* Синий цвет для кнопки */
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-box button:hover {
        background-color: #0056b3; /* Цвет кнопки при наведении */
    }
</style>
</head>
<body>

<!-- Хедер сайта -->
<header>
    <h1 style="text-align: center;">Редактирование товара</h1>
</header>

<div class="form-container">
    <!-- Форма редактирования товара -->
    <div class="form-box">
        <h1>Редактировать товар</h1>
        <form action="edit_product.php?id=<?php echo $id; ?>" method="POST">
            <label for="name">Название товара:</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
            <br>
            <label for="description">Описание:</label>
            <textarea name="description" required><?php echo $product['description']; ?></textarea>
            <br>
            <label for="price">Цена:</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
            <br>
            <label for="image">Изображение (URL):</label>
            <input type="text" name="image" value="<?php echo $product['image']; ?>" required>
            <br>
            <button type="submit">Сохранить изменения</button>
        </form>
    </div>
</div>

</body>
</html>
