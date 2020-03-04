<?php
class Employee              // employee значит «сотрудник»
{
    public $name;               // имя-фамилия
    public $rate;               // часовая ставка (сколько он получает тугриков за час работы)
    public $hours = array();    // массив, содержащий отработанные часы по неделям


        /** Считает общее число отработанных часов */
        public function getTotalHoursWorked()
        {
            // Просто складываем значения часов в массиве
            return array_sum($this->hours);
        }
    
        /** Считает зарплату */
        public function getSalary()
        {
            // Получаем число отработанных часов
            $hours = $this->getTotalHoursWorked();
            // и умножаем на часовую ставку
            $salary = $hours * $this->rate;
            return $salary;
        }

        public function __construct($name, $rate)
        {
            // задаем имя и часовую ставку
            $this->name = $name;
            $this->rate = $rate;
        }
}


$ivan = new Employee("Иванов Иван",10);
$ivan->hours = array(40, 40, 40, 40);   // Иван работает по 40 часов в неделю

$peter = new Employee("Петров Петр",8);
$peter->hours = array(40, 10, 40, 50);  // Петр взял отгул и потому отработал меньше часов, 
                                        // но в  последнюю неделю решил поработать побольше

$employees = array($ivan, $peter);


echo "<table>";

// Сама таблица
foreach ($employees as $employee) {
    echo padRight($employee->name, $col1) .
         padLeft($employee->getTotalHoursWorked(), $col2) . 
         padLeft($employee->rate, $col3) . 
         padLeft($employee->getSalary(), $col4) . "<br><br>";
}

echo "</table>";