<?php
require_once "./vendor/autoload.php";
$sStorage = new SessionStorage();

$myCart = new Cart($sStorage);

$book1 = new Book("Учим php", 100, 50);
$book2 = new Book("Не забываем JS и HTML", 30, 40);
$nb = new Notebook("lenovo", 30, 40);
$rom = new Alcohol("ром", 1000, 200);

try
{
    $myCart->clear();
    $myCart->add($book1, 3);
    $myCart->add($book2, 1);
    $myCart->add($nb, 1);
    $myCart->add($rom, 1);
} catch (Exception $e) {
    echo "Поймано исключение: " . $e->getMessage();
}
echo $myCart->getTotalQuantity();

echo "<hr>";

echo count($myCart);

echo "<hr>";

echo $myCart->total();

echo "<pre>";
print_r($myCart->getItems());

try
{
    $myCart->delete(2);
}  catch (Exception $e) {
    echo "Поймано исключение: " . $e->getMessage();
}

foreach ($myCart->getItems() as $num=>$prod)
{
    foreach ($prod as $param=>$value)
    {
        echo "[{$num}][{$param}] => {$value}<br>";
    }

}
echo "<hr>";
print_r($_SESSION);