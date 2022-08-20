<?php
namespace Decorator;

require_once "../header.php";


echo "<h2>Декоратор</h2>";
echo "<strong>Смысл</strong>: Шаблон «Декоратор» позволяет во время выполнения динамически изменять поведение объекта, обёртывая его в объект класса «декоратора». <br>";
echo "<strong>Используется</strong>: Шаблон часто используется для соблюдения принципа единственной обязанности (Single Responsibility Principle), поскольку позволяет разделить функциональность между классами для решения конкретных задач. <br>";

interface Car
{
    public function getCost();
    public function getDescription();
}

class SimpleCar implements Car
{
    public function getCost(): int
    {
        return 200;
    }
    public function getDescription(): string
    {
        return "This is simple car";
    }
}

class CarWithClimateControl implements  Car
{
    private $car;
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getCost(): int
    {
        return $this->car->getCost() + 20;
    }

    public function getDescription(): string
    {
        return $this->car->getDescription() . " + climate control";
    }
}

$car1 = new SimpleCar();
echo  $car1->getCost() . "<br>";
echo $car1->getDescription() . "<br>";
$car1 = new CarWithClimateControl($car1);
echo  $car1->getCost() . "<br>";
echo $car1->getDescription() . "<br>";