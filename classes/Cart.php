<?php
require_once "Product.php";

class Cart implements Countable
{
    protected $items = [];
    protected $storage;

    public function __construct(IStorage $storage) {
        $this->storage = $storage;
        $data = $this->storage->get();

        if ($data !== null) {
            $this->items = $data;
        }
    }
    public function add($product, $quantity = 1)
    {
        if ($product->getQuantity() >= $quantity) {
            $this->items[] = [
                "product" => $product->getName(),
                "quantity" => $quantity,
                "price" => $product->getPrice()
            ];
            $this->storage->save($this->items);

        } else {
            throw new Exception ("Недостаточно кол-ва товара на складе!");
        }

    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotalQuantity()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item["quantity"];
        }

        return $total;
    }

    public function total()
    {
        $total_price = 0;
        foreach ($this->items as $item) {
            $total_price += $item["price"] * $item["quantity"];
        }
        return $total_price;

    }

    public function count()
    {
        return count($this->items);
    }

    public function delete($prod_num)
    {
        if($prod_num===1){
            unset($this->items[0]);
        }elseif ($prod_num<=0 || $prod_num>count($this->items)){
            throw new Exception ("нет такого товара");
        }else{
            unset($this->items[$prod_num-1]);
        }
    }
    public function clear()
    {
        $this->items = [];
        $this->storage->save($this->items);
    }

}