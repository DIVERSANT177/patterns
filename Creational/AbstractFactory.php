<?php
namespace AbstractFactory;
require_once "../header.php";

echo "<h2>Абстрактная фабрика</h2>";
echo "<strong>Смысл</strong>: Это фабрика фабрик. То есть фабрика, группирующая индивидуальные, но взаимосвязанные/взаимозависимые фабрики без указания для них конкретных классов. <br>";
echo "<strong>Используется</strong>: Когда у вас есть взаимосвязи с не самой простой логикой создания (creation logic). <br>";

interface Car
{
    public function getDescription();
}

interface Builder
{
    public function getDescription();
}

interface CarFactory
{
    public function makeCar(): Car;
    public function makeBuilder(): Builder;
}

class BMW implements Car
{
    public function getDescription()
    {
        echo "This is BMW";
    }
}

class Mercedes implements Car
{
    public function getDescription()
    {
        echo "This is Mercedes";
    }
}

class BuilderBMW implements Builder
{
    public function getDescription()
    {
        echo "He is build BMW";
    }
}

class BuilderMercedes implements Builder
{
    public function getDescription()
    {
        echo "He is build Mercedes";
    }
}

class CarFactoryBMW implements CarFactory
{
    public function makeCar(): Car
    {
        return new BMW();
    }
    public function makeBuilder(): Builder
    {
        return new BuilderBMW();
    }
}

class CarFactoryMercedes implements CarFactory
{
    public function makeCar(): Car
    {
        return new Mercedes();
    }
    public function makeBuilder(): Builder
    {
        return new BuilderMercedes();
    }
}

$factoryBMW = new CarFactoryBMW();
echo $factoryBMW->makeCar()->getDescription() . "<br>";
echo $factoryBMW->makeBuilder()->getDescription() . "<br>";

$factoryMercedes = new CarFactoryMercedes();
echo $factoryMercedes->makeCar()->getDescription() . "<br>";
echo $factoryMercedes->makeBuilder()->getDescription();