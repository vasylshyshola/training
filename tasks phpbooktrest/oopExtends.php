<?php

// Базовый класс, содержит поля используемые 
// во всех видах вопросов
class AbstractQuestion
{
    public $text;
}

// Вопрос с выбором вариантов
class ChoiceQuestion extends AbstractQuestion
{
    public $options; // варианты ответа
    public $correntOption; // правильный вариант     
    
    public function checkAnswer($answer){
        
    } 
}

// Вопрос с вводом числа
class NumericQuestion extends AbstractQuestion
{
    public $answer; // ответ
    public $deviation; // допустмая погрешность
}