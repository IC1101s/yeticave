<?php 
require_once('helpers.php');
require_once('functions.php');
// require_once('data.php');
require_once('init.php');

// Запрос к лотам
$sqlLots = 'SELECT l.id lot_id, l.name as lot_name, description, url_img, price, c.name as category_name, date_end from lots l ' 
. 'join categories c on c.id = l.id_category '
. 'where date_end > NOW() order by date_create DESC';

$resLots = mysqli_query($conn, $sqlLots);
if (!$resLots) {
    $err = mysqli_error($conn);
    print('Ошибка: ') . $err;
}

$lotsArr = mysqli_fetch_all($resLots, MYSQLI_ASSOC);

// Сборка шаблона main и передача данных лотов и категорий
$page_content = include_template('main.php', [
    'lots' => $lotsArr, 
    'categories' => $categoriesArr,
]);

// Сборка шаблона layout и передача данных основного контента, категорий, title
$layout_content = include_template('layout.php', [
    'content' => $page_content, 
    'categories' => $categoriesArr, 
    'title' => 'Главная - YetiCave',
    'isFlatpickr' => false
]);

// Вывод шаблона layout (вся страница)
print($layout_content);

?>