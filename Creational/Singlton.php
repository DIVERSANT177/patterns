<?php

require_once "../header.php";

echo "<h2>Одиночка</h2>";
echo "<strong>Смысл</strong>: Шаблон позволяет удостовериться, что создаваемый объект — единственный в своём классе. <br>";
echo "<strong>Используется</strong>: На самом деле шаблон «Одиночка» считается антипаттерном, не следует им слишком увлекаться. Он необязательно плох и иногда бывает полезен. Часто применяется при подключении к БД. <br>";

const USER = 'root';
const PASSWORD = 'root';

final class DB
{
    private static $instance = null;
    private $connection = null;

    public static function getInstance(): DB
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=mysql', USER, PASSWORD);
    }

    public static function Connection(): PDO
    {
        return DB::getInstance()->connection;
    }

    public static function Prepare($statement)
    {
        return DB::Connection()->prepare($statement);
    }

    private function __clone(){}
    private function __wakeup(){}
}

$db = DB::getInstance();
var_dump($db);