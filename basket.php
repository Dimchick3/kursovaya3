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

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Главная страница <span class="sr-only">(current)</span></a>
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

            <li class="nav-item">
              <a class="nav-link" href="contact.html">СВЯЗАТЬСЯ</a>
            </li>
          </ul>
          <div class="user_option">
            <a href="">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                ВОЙТИ
              </span>
            </a>
            <a href="">
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
  <div class="box" bis_skin_checked="1">
  <!-- shop section -->
  <style>
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border: 1px solid black;
      z-index: 9999;
      font-size: 50px;
    }
  </style>
    <h1 style="font-size: 200px" style=font-style: >КОРЗИНА |</h1>
  <section class="shop_section layout_padding">

    <ul id="cart-items"></ul>
    <b id="total-price">Общая сумма: $0</b>
    <button id="checkout-button">Оформить заказ</button>
  </section>
  <div class="popup" id="popup">
    <p>Ваш заказ оформлен!</p>
  </div>
    </div>
  </section>

  <style>
  .box {
  background-color: #eeeeee;
  position: relative;
  padding: 10px;
  margin-top: 25px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    padding: 15px 30px;
    height: 800px;
    font: bold;
    border-radius: 15px;
  }
  </style>

  <style>
    .popup {
      display: none; /* По умолчанию скрываем popup */
      position: fixed; /* Фиксированное положение */
      top: 50%; /* Положение сверху (по центру по вертикали) */
      left: 50%; /* Положение слева (по центру по горизонтали) */
      transform: translate(-50%, -50%); /* Центрируем по вертикали и горизонтали */
      background-color: #fff; /* Цвет фона */
      padding: 20px; /* Отступы внутри */
      border: 1px solid #ccc; /* Граница */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тень */
      z-index: 999; /* Показывать поверх других элементов */
    }
    .shop_section li {
      .shop_section button {
        background-color: #dc3545; /* Цвет фона кнопки */
        color: #fff; /* Цвет текста */
        border: none; /* Убираем границу */
        padding: 5px 10px; /* Отступы внутри кнопки */
        cursor: pointer; /* Курсор при наведении на кнопку */
        border-radius: 3px; /* Закругленные углы кнопки */
      }

      .shop_section button:hover {
        background-color: #c82333; /* Измененный цвет фона при наведении на кнопку */
      }
      border-bottom: 1px solid #ccc; /* Граница между товарами */
      padding-bottom: 10px; /* Дополнительный отступ между товарами */
      margin-bottom: 10px; /* Дополнительный отступ между товарами */
    }
    body {
      font-family: 'Arial', sans-serif; /* Используемый шрифт для всего текста на странице */
      font-size: 16px; /* Размер шрифта */
      color: #333; /* Цвет текста */
    }

    /* Стили для текста внутри корзины */
    .shop_section {
      font-family: 'Roboto', sans-serif; /* Используемый шрифт */
      font-size: 18px; /* Размер шрифта */
      color: #444; /* Цвет текста */
    }

    /* Стили для кнопки оформления заказа */
    #checkout-button {
      font-family: 'Open Sans', sans-serif; /* Используемый шрифт */
      font-size: 18px; /* Размер шрифта */
      color: white; /* Цвет текста */
      background-color: #007bff; /* Цвет фона кнопки */
      border: none; /* Убираем границу */
      padding: 10px 20px; /* Отступы внутри кнопки */
      cursor: pointer; /* Курсор при наведении на кнопку */
      border-radius: 5px; /* Закругленные углы кнопки */
    }
  </style>
    }
  </style>
  <!-- end shop section -->

  <!-- info section -->
  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              Про нас
            </h6>
            <p>
              Мы - ваш надежный партнер в мире высококачественных комплектующих для ваших технических потребностей. Наша компания - это не просто поставщик, а команда профессионалов, целящихся обеспечить вас лучшими решениями в сфере IT-технологий.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Написать
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Подписаться
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Нужна помощь?
            </h6>
            <p>
              Не стесняйтесь обращаться к нам с любыми вопросами, мы всегда готовы помочь вам!
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Связаться
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> г. Гомель, ул Кирова 122а </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+375 29 331-45-29</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> mnenepriyatnooo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://www.instagram.com/helpmefrompeople/">Mnenepriyatno</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <script src="js/basket.js"></script>
  <script src="js/output.js"></script>
</body>

</html>