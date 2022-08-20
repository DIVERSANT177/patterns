<?php
namespace FactoryMethod;
require_once "../header.php";

echo "<h2>Фабричный метод</h2>";
echo "<strong>Смысл</strong>: Это способ делегирования логики создания объектов (instantiation logic) дочерним классам. <br>";
echo "<strong>Используется</strong>: Этот шаблон полезен для каких-то общих обработок в классе, но требуемые подклассы динамически определяются в ходе выполнения (runtime). <br>";

abstract class BaseTable
{
    abstract public function getTableName(): string;
    public function Read(): string
    {
        return "SELECT * FROM " . $this->getTableName();
    }
}
class Table1 extends BaseTable
{
    public function getTableName(): string
    {
        return "Table1";
    }
}

class Table2 extends BaseTable
{
    public function getTableName(): string
    {
        return "Table2";
    }
}

$table1 = new Table1();
echo $table1->Read() . "<br>";
$table2 = new Table2();
echo $table2->Read();