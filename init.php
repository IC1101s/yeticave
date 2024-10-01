<?php 

// Подключение к SQL
$conn = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    $err = mysqli_connect_error();
    print('Ошибка: ') . $err;
}

$sqlCategories = 'SELECT name, code from categories';
$resCategories = mysqli_query($conn, $sqlCategories);
$categoriesArr = mysqli_fetch_all($resCategories, MYSQLI_ASSOC);

?>