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
              <?php
              session_start();
              ?>

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
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

  </div>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_left">
        <h2>HAFF Glory Mini</h2>
      </div>
      <div class="row">
        <div class="">
          <div class="box">
            <a href="">
              <div class="product-content123">
                <div class="img-box1">
                  <img src="images/p1.png"  class="img-box2" alt="">
                  <p>

                  </p>
                </div>
                <div class="text-box11">
                  <h6>HAFF Glory Mini</h6>
                  <p>
                    Mini Tower, БП отсутствует, для плат micro-ATX/mini-ITX, в комплекте 4 вентилятора, окно: закаленное стекло, видеокарта до 330 мм, охлаждение ЦП до 166 мм, пылевые фильтры, 2xUSB 2.0, 1xUSB-A 3.2 5Гбит/с, 1xUSB-C 3.2 10Гбит/с, цвет белый
                  </p>
                  <h6>
                    Цена
                    <span>
  $200
  </span>
                  </h6>

                    <?php
                    // Предполагается, что мы уже подключились к базе данных и получили товары
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    while ($product = $result->fetch_assoc()) {
                        ?>
                        <section class="shop_section layout_padding">
                            <div class="container">
                                <div class="heading_container heading_left">
                                    <h2><?php echo htmlspecialchars($product['name']); ?></h2> <!-- Название товара -->
                                </div>
                                <div class="row">
                                    <div class="box">
                                        <div class="product-content123">
                                            <div class="img-box1">
                                                <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" class="img-box2" alt="">
                                            </div>
                                            <div class="text-box11">
                                                <h6><?php echo htmlspecialchars($product['name']); ?></h6> <!-- Название -->
                                                <p><?php echo htmlspecialchars($product['description']); ?></p> <!-- Описание -->
                                                <h6>Цена: $<?php echo htmlspecialchars($product['price']); ?></h6> <!-- Цена -->

                                                <!-- Форма для добавления товара в корзину -->
                                                <form action="cart.php" method="POST">
                                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>"> <!-- ID товара -->
                                                    <button type="submit" class="btn1">Добавить в корзину</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                    }
                    ?>
      </div>
    </div>
  </section>


  </section>

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
</body>

</html>