<?php
namespace Proxy;

require_once "../header.php";


echo "<h2>Заместитель</h2>";
echo "<strong>Смысл</strong>: С помощью шаблона «Заместитель» класс представляет функциональность другого класса. <br>";
echo "<strong>Используется</strong>: «Заместитель» может просто переадресовывать запросы настоящему объекту, а может предоставлять дополнительную логику: кеширование данных при интенсивном выполнении операций или потреблении ресурсов настоящим объектом; проверка предварительных условий (preconditions) до вызова выполнения операций настоящим объектом. <br>";

interface Car
{
    public function open();
    public function close();
}

class BMW implements Car
{
    private $carIsOpen;
    public function __construct()
    {
        $this->carIsOpen = true;
    }
    public function open()
    {
        if($this->carIsOpen){
            echo "The car is already open<br>";
            return;
        }
        $this->carIsOpen = true;
        echo "The car is open<br>";
    }
    public function close()
    {
        if(!$this->carIsOpen){
            echo "The car is already close<br>";
            return;
        }
        $this->carIsOpen = false;
        echo "The car is close<br>";
    }
}
class AlarmSystem
{
    private $car;
    private $signalization;
    public function __construct(Car $car)
    {
        $this->car = $car;
        $this->signalization = false;
    }
    public function open()
    {
        if($this->signalization){
            echo "Alarm<br>";
            return;
        }
        $this->car->open();
    }
    public function close()
    {
        if($this->signalization){
            echo "First turn off the alarm<br>";
            return;
        }
        $this->car->close();
    }
    public function turnOn()
    {
        $this->signalization = true;
    }
    public function turnOff()
    {
        $this->signalization = false;
    }
}

$alarmSystem = new AlarmSystem(new BMW());
$alarmSystem->open();
$alarmSystem->close();
$alarmSystem->close();
$alarmSystem->turnOn();
$alarmSystem->open();