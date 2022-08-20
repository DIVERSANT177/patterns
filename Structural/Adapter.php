<?php
namespace Adapter;
require_once "../header.php";

echo "<h2>Адаптер</h2>";
echo "<strong>Смысл</strong>: Шаблон «Адаптер» позволяет помещать несовместимый объект в обёртку, чтобы он оказался совместимым с другим классом. <br>";
echo "<strong>Используется</strong>: Этот шаблон часто применяется для обеспечения работы одних классов с другими без изменения их исходного кода. <br>";

interface Car
{
    public function getBrand();
}

class BMW implements Car
{
    private $brand = "BMW";

    public function getBrand(): string
    {
        return $this->brand;
    }
}

class Suzuki
{
    private $brand = "Suzuki";

    public function getBrand(): string
    {
        return $this->brand;
    }
}

class SuzukiAdapter implements Car
{
    private $brand;
    public function __construct(Suzuki $bike)
    {
        $this->brand = $bike;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
}


class Driver
{
    private $drivingCar;
    public function drive(Car $car)
    {
        $this->drivingCar = $car;
        var_dump($this->drivingCar);
    }
}

$bike1 = new SuzukiAdapter(new Suzuki());
$car1 = new BMW();
$driver = new Driver();
$driver->drive($car1);
echo "<br>";
$driver->drive($bike1);