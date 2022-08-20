<?php
namespace Builder;
require_once "../header.php";

echo "<h2>Строитель</h2>";
echo "<strong>Смысл</strong>: Шаблон позволяет создавать разные свойства объекта, избегая загрязнения конструктора (constructor pollution). Это полезно, когда у объекта может быть несколько свойств. Или когда создание объекта состоит из большого количества этапов. <br>";
echo "<strong>Используется</strong>: Когда у объекта может быть несколько свойств и когда нужно избежать Telescoping constructor. <br>";

class Car
{
    protected $brand;
    protected $number;
    protected $numberOfWheel;
    protected $leftHand;

    public function __construct(BuilderCar $builder)
    {
        $this->brand = $builder->brand;
        $this->number = $builder->number;
        $this->numberOfWheel = $builder->numberOfWheel;
        $this->leftHand = $builder->leftHand;
    }

    public function PrintInfo()
    {
        echo $this->brand . "<br>" . $this->number . "<br>" . $this->numberOfWheel . "<br>" . $this->leftHand;
    }
}

class BuilderCar
{
    public $brand;
    public $number;
    public $numberOfWheel;
    public $leftHand;

    public function __construct(string $brand)
    {
        $this->brand = $brand;
        return $this;
    }

    public function SetNumber(string $number): BuilderCar
    {
        $this->number = $number;
        return $this;
    }

    public function SetNumberOfWheel(int $numberOfWheel): BuilderCar
    {
        $this->numberOfWheel = $numberOfWheel;
        return $this;
    }

    public function SetLeftHand(bool $leftHand): BuilderCar
    {
        $this->leftHand = $leftHand;
        return $this;
    }
}

$car1 = new Car((new BuilderCar("BMW"))->SetNumber("A564ED")->SetNumberOfWheel(4)->SetLeftHand(true));
$car1->PrintInfo();
