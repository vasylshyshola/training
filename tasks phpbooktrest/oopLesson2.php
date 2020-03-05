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


echo "<table border = 1 >";
echo "<tr><td>Работник</td><td>Часы</td><td>Ставка</td><td>Зарплаата</tr>";
// Сама таблица
foreach ($employees as $employee) {
   echo "<tr><td>{$employee->name}</td> <td>{$employee->getTotalHoursWorked()}</td><td>{$employee->rate}</td> <td>{$employee->getSalary()}</td></tr>";
}
echo "</table>";