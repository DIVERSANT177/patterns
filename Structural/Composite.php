<?php
namespace Composite;
require_once "../header.php";

echo "<h2>Компоновщик</h2>";
echo "<strong>Смысл</strong>: Шаблон «Компоновщик» позволяет клиентам обрабатывать отдельные объекты в едином порядке. <br>";
echo "<strong>Используется</strong>: Шаблон позволяет клиентам одинаково обращаться к отдельным объектам и к группам объектов. <br>";

interface Car
{
    public function __construct();
    public function getBrand();
}

class BMW implements Car
{
    private $brand;
    public function __construct()
    {
        $this->brand = "BMW";
    }

    public function getBrand(): string
    {
        return $this->brand;
    }
}
class Mercedes implements Car
{
    private $brand;
    public function __construct()
    {
        $this->brand = "Mercedes";
    }

    public function getBrand(): string
    {
        return $this->brand;
    }
}
class CarPark
{
    private $cars;

    public function addCar(Car $car)
    {
        $this->cars[] = $car;
    }

    public function viewAllCars()
    {
        foreach ($this->cars as $car){
            echo $car->getBrand() . "<br>";
        }
    }
}

$carPark = new CarPark();
$carPark->addCar(new Mercedes());
$carPark->addCar(new BMW());
$carPark->viewAllCars();