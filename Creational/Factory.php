<?php
namespace Factory;
require_once "../header.php";

echo "<h2>Простая фабрика</h2>";
echo "<strong>Смысл</strong>: Простая фабрика просто генерирует экземпляр для клиента без предоставления какой-либо логики экземпляра. <br>";
echo "<strong>Используется</strong>: Когда создание объекта подразумевает какую-то логику, а не просто несколько присваиваний, то имеет смысл делегировать задачу выделенной фабрике, а не повторять повсюду один и тот же код. <br>";

interface Car
{
    public function getColor(): string;
    public function getNumber(): string;
}

class BMW implements Car
{
    protected $color;
    protected $number;

    public function __construct(string $color, string $number)
    {
        $this->color = $color;
        $this->number = $number;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}

class CarFactory
{
    public static function makeCar($color, $number): Car
    {
        return new BMW($color, $number);
    }
}

$car = CarFactory::makeCar("Green", "A123DC");
echo "Номер машины: " . $car->getNumber() . "<br>";
echo "Цвет машины: " . $car->getColor();