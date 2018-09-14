<?php
abstract class Product
{
    protected $name = "ki";
    protected $quantity = 0;
    protected $price = 0;

    public function __construct($name, $price, $quantity)
    {
        if($name!==""&&$price>0&&$quantity>0 ){
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity);}
        else{
            throw new Exception ("Введите корректные значения");
        }
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function setPrice( $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

}
class Book extends Product
{

}


class Notebook extends Product
{

}

class Alcohol extends Product
{

}