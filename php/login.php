<?php
session_start();
include('../db.php'); // Подключение к базе данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Сохраняем данные в сессию
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Сохраняем роль пользователя в сессии

            // Перенаправляем на админ-панель, если администратор
            if ($user['role'] == 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: ../index.php"); // Для обычных пользователей
                exit();
            }
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь не найден.";
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
<body>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f4;
    }

    .login-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container form {
        margin-bottom: 20px;
    }

    .login-container label {
        display: block;
        margin: 10px 0 5px;
    }

    .login-container input {
        padding: 10px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .login-container button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-container .register-btn {
        background-color: #28a745;
    }

    .login-container button:hover {
        background-color: #0056b3;
    }

    .login-container .register-btn:hover {
        background-color: #218838;
    }
</style>
<div class="login-container">
    <h2>Вход в систему</h2>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Войти</button>
    </form>

    <!-- Кнопка для перенаправления на страницу регистрации -->
    <button class="register-btn" onclick="window.location.href='register.php'">Зарегистрироваться</button>
</div>
</body>
</html>
