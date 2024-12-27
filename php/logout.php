<?php
session_start();
session_unset(); // Очистить все данные сессии
session_destroy(); // Уничтожить сессию

// Перенаправляем на главную страницу или страницу входа
header("Location: ../index.php");
exit();
?><?php
