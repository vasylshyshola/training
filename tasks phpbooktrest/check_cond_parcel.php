<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($form_errors, $input) = validate();

    if ($form_errors) {
        show_form($form_errors);
    }
    process_form($input);

} else {
    show_form();
}
function show_form($form_errors = '')
{


    if ($form_errors) {

        print 'пожалуйста изправте ощибки: <ul><li>';
        print implode('</li><li>', $form_errors);
        print '</li></ul>';

    }
    print <<<_HTML

<form method="post" action="$_SERVER[PHP_SELF]" ></br>
 Адрес отправителя:</br> Город - <input type="text" name="city_sender"> № отделения  - <input type="text" name="parcel_sender"></br>
 <hr>
 Адрес получителя: </br>Город - <input type="text" name="city_recipient"> № отделения - <input type="text" name="parcel_recipient"></br>
 <b><hr></b>
 Габариты:</br> Висота  - <input type="number"  name="height" step="any">см. Шырина - <input type="number"  name="width" step="any">см. Длинна - <input type="number"  name="long" step="any">см.</br>
 <hr>
 Вес:</br><input type="number"  name="weight" step="any"></br>
 <hr>
 <input type="submit" value="проверить">
 </form>

_HTML;

}

function process_form($input)
{
    print <<<_HTML
    
        Город получителя - $input[city_sender], отделение почты № - $input[parcel_sender].</br>
        Город отправителя - $input[city_recipient], отделение почты № - $input[parcel_recipient]</br>
        Габариты посылки - $input[height]см. x $input[width]см. x $input[long]см.</br>
        Вес - $input[weight]кг.</br>

_HTML;

}

function validate(): array
{
    $form_errors = array();
    $input = array();
    //присвоение з начений из POST в переменные
    //___________________________________Простейшая проверка города (точнее просто сторки).
    $input['city_sender'] = strip_tags($_POST['city_sender']);
    $input['city_sender'] =mb_strtolower($input['city_sender']);
     $input['city_sender'] = mb_convert_case($input['city_sender'],MB_CASE_TITLE,"UTF-8");

    if (strlen($input['city_sender']) < 3) {
        $form_errors[] = 'Название города  отправителя слишком короткое';
    }

     $input['parcel_sender'] = filter_input(INPUT_POST, 'parcel_sender', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 30)));
    if (is_null($input['parcel_sender']) || $input['parcel_sender'] === false) {
        $form_errors[] = 'Ведите коректное отделение почты отправителя.';
    }

    $input['city_recipient'] = strip_tags($_POST['city_recipient']);
    $input['city_recipient'] = mb_strtolower($input['city_recipient']);
    $input['city_recipient'] = mb_convert_case($input['city_recipient'],MB_CASE_TITLE,"UTF-8");
    if (strlen($input['city_recipient']) < 3) {
        $form_errors[] = 'Название города  получителя слишком короткое';
    }

    $input['parcel_recipient'] = filter_input(INPUT_POST, 'parcel_recipient', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 30)));
    if (is_null($input['parcel_recipient']) || $input['parcel_recipient'] === false) {
        $form_errors[] = 'Ведите коректное отделение почты получителя.';
    }
//__________________________________________Габариты


    $input['height'] = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 100)));
    if (is_null($input['height']) || $input['height'] === false) {
        $form_errors[] = 'Высота должна быть в диапазоне от 1 до 100 см.';
    }


    $input['width'] = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 100)));
    if (is_null($input['width']) || $input['width'] === false) {
        $form_errors[] = 'Шырина должна быть в диапазоне от 1 до 100 см.';
    }

    $input['long'] = filter_input(INPUT_POST, 'long', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 100)));
    if (is_null($input['long']) || $input['long'] === false) {
        $form_errors[] = 'Длинна должна быть в диапазоне от 1 до 100 см.';
    }

    $input['weight'] = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 60)));
    if (is_null($input['weight']) || $input['weight'] === false) {
        $form_errors[] = 'Вес посылки должен быть в диапазоне от 1 до 60кг.';
    }


    return array($form_errors, $input);
    }

