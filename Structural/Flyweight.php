<?php
namespace Flyweight;

require_once "../header.php";


echo "<h2>Приспособленец (Flyweight) - странный пример, не совсем понятно</h2>";
echo "<strong>Смысл</strong>: Шаблон применяется для минимизирования использования памяти или вычислительной стоимости за счёт общего использования как можно большего количества одинаковых объектов. <br>";
echo "<strong>Используется</strong>: Это способ применения многочисленных объектов, когда простое повторяющееся представление приведёт к неприемлемому потреблению памяти. <br>";

class Car
{

}

class CarMaker
{
    private $availableCar = [];
    public function make($preference)
    {
        if(empty($this->availableCar[$preference])){
            $this->availableCar[$preference] = new Car();
        }
        return $this->availableCar[$preference];
    }
}

class CarShop
{
    private $orders;
    private $carMaker;
    public function __construct(CarMaker $carMaker)
    {
        $this->carMaker = $carMaker;
    }
    public function takeOrder(string $carBrand, string $surname)
    {
        $this->orders[$surname] = $this->carMaker->make($carBrand);
    }
    public function serve()
    {
        foreach ($this->orders as $surname => $car) {
            echo  $surname .  " заказал машину ";
        }
    }
}

$carShop = new CarShop(new CarMaker());
$carShop->takeOrder("BMW", "Yakunin");
$carShop->takeOrder("Mercedes", "Borsch");
$carShop->serve();