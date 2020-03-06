<?php

error_reporting(-1);

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
            $overTime = $this->getOvertimeHours(); //плучаем сверхурочные что оплачиваюиться в двойе
            $overTimeSalary = $overTime * ($rate * 2);
            // и умножаем на часовую ставку

            $salary = $hours * $this->rate;
            $salary += $overTimeSalary;
            return $salary;
        }

        public function __construct($name, $rate)
        {
            // задаем имя и часовую ставку
            $this->name = $name;
            $this->rate = $rate;
        }

        /* public function getShortName(){    //метод не работает
            $division =[];
            $division = explode(" ", $this->name);
            $division[1] = substr($division[1],0,1);
            $newName = implode(" ", $division);
            return $division[1];

        } */
        public function getOvertimeHours(){
            $overTime = 0;
            foreach ($this->hours as  $value) {
                if ($value >= 41) {
                    $overTime += ($value - 40);
                }
            }

            return $overTime;
        }


}


$ivan = new Employee("Иванов Иван",10);
$ivan->hours = array(40, 40, 40, 40);   // Иван работает по 40 часов в неделю

$peter = new Employee("Петров Петр",8);
$peter->hours = array(40, 10, 40, 50);  // Петр взял отгул и потому отработал меньше часов, 
                                        // но в  последнюю неделю решил поработать побольше

$employees = array($ivan, $peter);


echo "<table border = 1 >";
echo "<tr><td>Работник</td><td>Часы</td><td>Переработка</td><td>Ставка</td><td>Зарплаата</tr>";
// Сама таблица
foreach ($employees as $employee) {
   echo "<tr><td>{$employee->name}</td><td>{$employee->getTotalHoursWorked()}</td><td>{$employee->getOvertimeHours()}</td><td>{$employee->rate}</td> <td>{$employee->getSalary()}</td></tr>";
}
echo "</table>";