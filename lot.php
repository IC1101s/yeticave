<?php
require_once('helpers.php');
require_once('functions.php');
require_once('init.php');

$page404 = include_template('404.php', [
    'categories' => $categoriesArr,
]);

// Получение id лота из ссылки запроса
$lotID  = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Запрос к данным лота по его id
$sqlLots = 'SELECT l.name lot_name, description, url_img, price, price_step, c.name category_name, date_end, id_category from lots l ' 
. 'join categories c on c.id = l.id_category '
. 'where l.id = ' . $lotID;

// Запрос к категории по id лота
$sqlCategory = 'SELECT c.name as name_category from categories c '
. 'join lots l on c.id = l.id_category '
. 'where l.id = ' . $lotID;

$resLots = mysqli_query($conn, $sqlLots);
$resCategory = mysqli_query($conn, $sqlCategory);

if (!$resLots || !$resCategories || !$sqlCategory) {
    print($page404);
}

$lotData = mysqli_fetch_assoc($resLots);
$categoryData = mysqli_fetch_assoc($resCategory);

if (!$lotData) {
    print($page404);
}

// Сборка шаблона main и передача данных лотов и категорий
$page_content = include_template('lots.php', [
    'lot' => $lotData,
    'categories' => $categoriesArr,
    'categoryRow' => $categoryData
]);

// Сборка шаблона layout и передача данных основного контента, категорий, title
$lot_content = include_template('layout.php', [
    'content' => $page_content, 
    'categories' => $categoriesArr, 
    'title' => $lotData['lot_name'],
    'isAnotherPage' => true,
    'isFlatpickr' => false
]);

// Вывод шаблона layout (вся страница)
print($lot_content);

?>