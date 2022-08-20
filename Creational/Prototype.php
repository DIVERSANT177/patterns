<?php
namespace Prototype;
require_once "../header.php";

echo "<h2>Прототип</h2>";
echo "<strong>Смысл</strong>: Объект создаётся посредством клонирования существующего объекта. <br>";
echo "<strong>Используется</strong>: Когда необходимый объект аналогичен уже существующему или когда создание с нуля дороже клонирования. <br>";

class Car
{
    private $brand;
    private $number;

    public function __construct(string $brand, string $number)
    {
        $this->brand = $brand;
        $this->number = $number;
    }
    public function PrintInfo()
    {
        echo $this->brand . "<br>" . $this->number;
    }
}

$car1 = new Car("BMW", "A486GH");
$clonedCar = clone $car1;
$clonedCar->PrintInfo();