<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Корзина товаров</title>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> <!-- Путь к Font Awesome -->
  <style>
    .product {
      margin-bottom: 20px;
    }
    .cart {
      display: none;
      position: fixed;
      right: 20px;
      top: 20px;
      width: 300px;
      padding: 20px;
      background-color: white;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .cart.visible {
      display: block;
    }
  </style>
</head>
<body>
<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="index.php">
                    <span>
                        TECHP0WER
                    </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Главная страница <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">
              Купить
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Почему мы?
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Связаться</a>
          </li>
        </ul>
        <div class="user_option">
          <a href="">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
                                Войти
                            </span>
          </a>
          <a href="javascript:void(0)" onclick="toggleCart()">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          </a>
          <form class="form-inline">
            <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <!-- Корзина -->
  <div id="cart" class="cart">
    <h2>Корзина</h2>
    <ul id="cart-items"></ul>
    <p>Общая стоимость: <span id="total-price">0</span></p>
    <button onclick="placeOrder()">Оформить заказ</button>
  </div>
</div>

<!-- Товары -->
<div class="product" data-id="1" data-name="Товар 1" data-price="100">
  <h2>Товар 1</h2>
  <p>Цена: 100</p>
  <button onclick="addToCart('Товар 1', 100)">Добавить в корзину</button>
</div>
<div class="product" data-id="2" data-name="Товар 2" data-price="200">
  <h2>Товар 2</h2>
  <p>Цена: 200</p>
  <button onclick="addToCart('Товар 2', 200)">Добавить в корзину</button>
</div>

<script>
  let cart = [];
  let totalPrice = 0;

  document.addEventListener('DOMContentLoaded', (event) => {
    const cartCookie = getCookie('basket');
    if (cartCookie) {
      cart = JSON.parse(cartCookie);
      totalPrice = cart.reduce((sum, item) => sum + item.price, 0);
      updateCartDisplay();
    }
  });

  function addToCart(itemName, price) {
    const newItem = { item_name: itemName, price: price };
    cart.push(newItem);
    totalPrice += price;
    updateCartDisplay();
    setCookie('basket', JSON.stringify(cart), 7); // Сохранить корзину в куки на 7 дней
  }

  function updateCartDisplay() {
    const cartList = document.getElementById('cart-items');
    cartList.innerHTML = '';
    cart.forEach(item => {
      const listItem = document.createElement('li');
      listItem.textContent = `${item.item_name}: ${item.price}`;
      cartList.appendChild(listItem);
    });
    document.getElementById('total-price').textContent = totalPrice;
  }

  function toggleCart() {
    const cart = document.getElementById('cart');
    cart.classList.toggle('visible');
  }

  function placeOrder() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'order.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert('Заказ оформлен!');
        eraseCookie('basket'); // Очистить куки после оформления заказа
        cart = [];
        totalPrice = 0;
        updateCartDisplay();
      }
    };
    xhr.send(JSON.stringify(cart));
  }

  function setCookie(name, value, days) {
    let expires = "";
    if (days) {
      const date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
  }
</script>
</body>
</html>
