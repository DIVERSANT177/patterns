<?php
namespace Facade;

require_once "../header.php";


echo "<h2>Фасад</h2>";
echo "<strong>Смысл</strong>: Шаблон «Фасад» предоставляет упрощённый интерфейс для сложной подсистемы. <br>";
echo "<strong>Используется</strong>: «Фасад» — это объект, предоставляющий упрощённый интерфейс для более крупного тела кода, например библиотеки классов. <br>";

class Car
{
    public function rumble(): Car
    {
        echo "Wrr-rr. ";
        return $this;
    }
    public function beep(): Car
    {
        echo "Beep! ";
        return $this;
    }

    public function ready(): Car
    {
        echo "Car is ready! ";
        return $this;
    }

    public function stop(): Car
    {
        echo "Stop... ";
        return $this;
    }

    public function notReady(): Car
    {
        echo "Car isn't ready!";
        return $this;
    }
}

class CarFacade
{
    private $car;
    public function __construct(Car $car)
    {
        $this->car = $car;
    }
    public function turnOn()
    {
        $this->car->rumble()->beep()->ready();
    }
    public function turnOff()
    {
        $this->car->stop()->notReady();
    }
}

$facade = new CarFacade(new Car());
$facade->turnOn();
echo "<br>";
$facade->turnOff();