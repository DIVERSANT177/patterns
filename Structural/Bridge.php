<?php
namespace Bridge;
require_once "../header.php";

echo "<h2>Мост</h2>";
echo "<strong>Смысл</strong>: Шаблон «Мост» — это предпочтение компоновки наследованию. Подробности реализации передаются из одной иерархии другому объекту с отдельной иерархией. <br>";
echo "<strong>Используется</strong>: Шаблон «Мост» означает отделение абстракции от реализации, чтобы их обе можно было изменять независимо друг от друга. <br>";

interface Car
{
    public function __construct(Color $color);
    public function getDescription();
}

interface Color
{
    public function getColor();
}

class Green implements Color
{
    private $color = "green";
    public function getColor()
    {
        return $this->color;
    }
}

class Red implements Color
{
    private $color = "red";
    public function getColor()
    {
        return $this->color;
    }
}
class Blue implements Color
{
    private $color = "blue";
    public function getColor()
    {
        return $this->color;
    }
}
class BMW implements Car
{
    private $color;
    public function __construct(Color $color)
    {
        $this->color = $color->getColor();
    }
    public function getDescription()
    {
        echo "This BMW is " . $this->color;
    }
}

class Mercedes implements Car
{
    private $color;
    public function __construct(Color $color)
    {
        $this->color = $color->getColor();
    }
    public function getDescription()
    {
        echo "This Mercedes is " . $this->color;
    }
}

$car1 = new Mercedes(new Green());
$car1->getDescription();
echo "<br>";
$car2 = new BMW(new Blue());
$car2->getDescription();