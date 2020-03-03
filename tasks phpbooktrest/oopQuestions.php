<?php

class Question
{
    public $text;           // текст вопроса
    public $points = 5;     // число баллов, по умолчанию 5
    public $answers;        // варианты ответов
    public $correctAnswer;  // правильный ответ
    public $hint;           // подсказка
}

/* // Создадим три объекта (так как у нас будет 3 вопроса в тесте), и сохраним их в трех переменных:
$q1 = new Question;
$q2 = new Question;
$q3 = new Question;

// Выведем содержимое первого объекта
var_dump($q1); */

/* // Вопрос 1
$q1 = new Question;
$q1->text = "Какая планета располагается четвертой по счету от Солнца?";
$q1->points = 10; // 10 баллов за ответ
$q1->answers = array('a' => 'Венера', 'b' => 'Марс', 'c' => 'Юпитер', 'd' => 'Меркурий'); // Варианты ответа
$q1->correctAnswer = 'b'; // Правильный ответ

// Вопрос 2
$q2 = new Question;
$q2->text = 'Какой город является столицей Великобритании?';
$q2->points = 5;
$q2->answers = array('a' => 'Париж', 'b' => 'Москва', 'c' => 'Нью-Йорк', 'd' => 'Лондон');
$q2->correctAnswer = 'd';

// Вопрос 3
$q3 = new Question;
$q3->text = 'Кто придумал теорию относительности?';
$q3->points = 30;
$q3->answers = array('a' => 'Джон Леннон', 'b' => 'Джим Моррисон', 'c' => 'Альберт Эйнштейн', 'd' => 'Исаак Ньютон');
$q3->correctAnswer = 'c';

// Выведем содержимое, чтобы проверить, что все верно
var_dump($q1, $q2, $q3); */

// Функция, создающая массив с вопросами:
function createQuestions()
{
    // Создаем пустой массив
    $questions = [];

    // Создаем и заполняем первый объект
    $q = new Question;
    $q->text = "Какая планета располагается четвертой по счету от Солнца?";
    $q->points = 10; // 10 баллов за ответ
    $q->answers = array('a' => 'Венера', 'b' => 'Марс', 'c' => 'Юпитер', 'd' => 'Меркурий'); // Варианты ответа
    $q->correctAnswer = 'b'; // Правильный ответ
    $q->hint = "Туда очень хочет попасть Илон Маск!";
    // Кладем вопрос в массив
    $questions[] = $q;

    // Вопрос 2
    $q = new Question;
    $q->text = 'Какой город является столицей Великобритании?';
    $q->points = 5;
    $q->answers = array('a' => 'Париж', 'b' => 'Москва', 'c' => 'Нью-Йорк', 'd' => 'Лондон');
    $q->correctAnswer = 'd';
    $q->hint ="...  the capital of great Britain";

    $questions[] = $q;

    // Вопрос 3
    $q = new Question;
    $q->text = 'Кто придумал теорию относительности?';
    $q->points = 30;
    $q->answers = array('a' => 'Джон Леннон', 'b' => 'Джим Моррисон', 'c' => 'Альберт Эйнштейн', 'd' => 'Исаак Ньютон');
    $q->correctAnswer = 'c';
    $q->hint = "Ты точно видел его фото, где он показывает язык!";

    // Кладем вопрос в массив
    $questions[] = $q;

    return $questions;
}

$questions = createQuestions();

function printQuestions($questions)
{
    $number = 1; // номер вопроса

    foreach ($questions as $question) {
        echo "{$number}. {$question->text}<br>";

        echo "Варианты ответов:<br>";

        foreach ($question->answers as $letter => $answer) {
            echo "  {$letter}. {$answer}<br>";
        }

        $number++; 
    }
}
printQuestions($questions);


$answers = array('b', 'd', 'a');


function checkAnswers($questions, $answers)
{
    // Проверим, что число ответов равно числу вопросов (защищаемся от ошибки)
    if (count($questions) != count($answers)) {
        die("Число ответов и вопросов не совпадает<br>");
    }

    $pointsTotal = 0; // сколько набрано баллов

    // сколько можно набрать баллов при всех правильных ответах
    $pointsMax = 0;  
    // сколько отвечено верно
    $correctAnswers = 0; 

    $totalQuestions = count($questions); // Сколько всего вопросов

    // Цикл для обхода вопросов и ответов
    for ($i = 0; $i < count($questions); $i++) {
        $question = $questions[$i]; // Текущий вопрос
        $answer = $answers[$i]; // текущий ответ

        // Считаем максимальную сумму баллов
        $pointsMax += $question->points;

        // Проверяем ответ
        if ($answer == $question->correctAnswer) {
            // Добавляем баллы
            $correctAnswers ++;
            $pointsTotal += $question->points;
        } else {
            // Неправильный ответ
            $number = $i + 1;
            echo "Неправильный ответ на вопрос №{$number} ({$question->text})<br>";
        }
    }

    // Выведем итог
    echo "Правильных ответов: {$correctAnswers} из {$totalQuestions}, баллов набрано: {$pointsTotal} из {$pointsMax}<br>";
}

checkAnswers($questions, $answers);

function hints($questions,$answers){

    if(count($questions) != count($answers)){
        die;
    }
    $i= 0;
    $answer = 1;
    foreach ($questions as $question) {


        if ($question->correctAnswer != $answers[$i]) {
            echo "Вы ошиблись в вопросе N - {$answer}!<br> Это может вам помочь : <br> {$question->hint}<br>";
        }
        $i++;
        $answer++;
    }
}

hints($questions,$answers);