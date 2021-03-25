<?php
require 'FormHelper.php';

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'V1564942');


} catch (PDOException $exception) {
    print "Couldn't connect to DB: " . $exception->getMessage();
    exit();
}
// установить исключения при ошибках в базе данных
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// установить режим извлечения строк таблицы в виде объектов
//$db->setAttribute(PDO::ATTR_DEFAULT_FEТCH_MODE, PDO::FETCH_OBJ);

$spicy_choices = array('no', 'yes', 'either');

//основная логика отображениястраницы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($errors, $input) = validate_form();// присвоениевозвращаемого результата масивам
    if ($errors) {
        show_form($errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}

//принцып извлечения из ифы из бд
// $q = $db->query('SELECT dish_name, price FROM dishes');
//while ($row = $q->fetch()) {
//print "$row[dish_name], $row[price] \n";
//}


//Пример лоя для извлечения всехолей сразу в один массыв $rows
//$q = $db->query('SELECT dish_name, price FROM dishes');
//$rows = $q->fetchAll();


//пример извлечения самого дешового блюда из таблицы
//cheapest_dish_info = $db->query('SELECT dish_name, price FROM dishes ORDER BY price LIMIT 1')->fetch();
//print "$cheapest_dish_info[0], $cheapest_dish_info[1]";
function show_form($errors = array())
{

    //установка значений по умолчанию
    $defaults = array('min_price' => 5, 'max_price' => 25);
    $form = new FormHelper($defaults);

    include 'insert_form.php';
}

function validate_form(): array
{
    $input = array();
    $errors = array();


    $input ['dish_name'] = trim($_POST['dish_name']) ?? '';
    if (!strlen($input['dish_name'])) {
        $errors[] = 'Ведите имя блюда!';
    }

// Минимальная цена на блюдо должна быть
// достоверным числом с плавающей точкой
    $input['min_price'] = filter_input(INPUT_POST, 'min_price',
        FILTER_VALIDATE_FLOAT);
    if ($input['min_price'] === null ||
        $input['min_price'] === false) {
        $errors[] = 'Ведите подходящую минимальную цену цену.';
    }
// Максимальная цена на блюдо должна быть
// достоверным числом с плавающей точкой
    $input['max_price'] = filter_input(INPUT_POST, 'max_price',
        FILTER_VALIDATE_FLOAT);
    if ($input['max_price'] === null ||
        $input['max_price'] === false) {
        $errors[] = 'Ведите подходящую максимальную цену.';
    }


    // Минимальная цена на блюдо должна быть меньше
// максимальной цены
    if ($input['min_price'] >= $input['max_price']) {
        $errors[] =
            'Минимальная цена не может быть меньше максимальной.';
    }

    $input['is_spicy'] = $_POST['is_spicy'] ?? '';
    if (!array_key_exists($input['is_spicy'],
        $GLOBALS['spicy_choices'])) {
        $errors[] = 'Выберите коректный показатель остроты.';
    }
    return array($errors, $input);


}

function process_form($input)
{

    global $db;

    $sql = 'SELECT dish_name, dish_price, is_spicy FROM dishes WHERE dish_price >= ? AND is_spicy <= ?';

//Если наименование блюда передано, ввести его в
//предложение WHERE. С помощью метода quote() и
//функции strtr() предотвращается действие вводимых
//пользователем подстановочных символов
    if (strlen($input['dish_name'])) {
        $dish = $db->quote($input['dish_name']);
        $dish = strtr($dish, array('_' => '\_', '%' => '\%'));
        $sql .= " AND dish_name LIKE $dish";
    }


    $spicy_choice = $GLOBALS['spicy_choices'][$input['is_spicy']];
    if ($spicy_choice == 'yes') {
        $sql .= ' AND is_spicy = 1';
    } elseif ($spicy_choice == 'no') {
        $sql .= ' AND is_spicy = 0';
    }

    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['min_price'], $input['max_price']));
    $dishes = $stmt->fetchAll();
    if (count($dishes) == 0) {
        print 'No dishes matched.';
    } else {
        print '<table>';
        print
            '<tr><th>Dish Name</th><th>Price</th><th>Spicy?</th></tr>';
        foreach ($dishes as $dish) {
            if ($dish->is_spicy == 1) {
                $spicy = 'Yes';
            } else {
                $spicy = 'No';
            }
            printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>',
                htmlentities($dish->dish_name),
                $dish->price, $spicy);
        }
    }
}

