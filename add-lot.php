<?php 
require_once('helpers.php');
require_once('functions.php');
require_once('init.php');

function getPostVal($name) {
    return $_POST[$name] ?? "";
}

// function getRequiredFields () {
//     $errors = [];
//     $required_fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];

//     foreach ($required_fields as $field) {
//         if (empty($_POST[$field])) {
//             $errors[$field] = 'Поле не заполнено';
//         }   
//     }  
// }

// function isCorrectNum () {
//     $errors = [];
//     $lotsNums = ['lot-rate', 'lot-step'];

//     foreach ($lotsNums as $lotsNum) {
//         if (!filter_var($_POST[$lotsNum], FILTER_VALIDATE_INT) || $_POST[$lotsNum] <= 0) {
//             $errors[$lotsNum] = 'Данные цен не соответствуют валидации';
//         }
//     }
  
//     if (count($errors)) {
//         foreach ($errors as $error) {
//            print($error);
//         }
//     }

//     return $error;
// }

// function isCorrectDate () {
//     $error = null;
//     $lotDate = $_POST['lot-date'];
//     $valid = is_date_valid($lotDate);

//     if (!$valid) {
//         $error = 'Дата не соответствуют валидации';
//     }

//     return $error;
// }

// getRequiredFields();
// isCorrectNum();
// isCorrectDate();

function validate_category ($id, $allowed_list) {
    if(!in_array($id, $allowed_list)){
        return 'Указана несуществующая категория';
    }
}

function validate_number ($num) {
    if (!empty($num)) {
        $num *= 1; 
        if (!filter_var($num, FILTER_VALIDATE_INT) || $num <= 0) {
            return 'Данные цен не соответствуют валидации';
        }
    }

    return null;
}

$categories_id = array_column($categoriesArr, 'id')

// Сборка шаблона main и передача данных лотов и категорий
$page_content = include_template('add.php', [
    'categories' => $categoriesArr
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $required_fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $errors = [];

    $rules = [
        'category' => function($value) use ($categories_id) {
            return validate_category($value, $categories_id);
        },
        'lot-rate' => function($value) {
            return validate_number();
        },
        'lot-step' => function($value) {
            return validate_number();
        }
    ];
}

// Сборка шаблона layout и передача данных основного контента, категорий, title
$layout_content = include_template('layout.php', [
    'content' => $page_content, 
    'categories' => $categoriesArr, 
    'title' => 'Добавление лота',
    'isAnotherPage' => true,
    'isFlatpickr' => true
]);

// Вывод шаблона layout (вся страница)
print($layout_content);


?>