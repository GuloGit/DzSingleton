<?php
class SessionStorage implements IStorage
{
    protected $key = "cartItemsList";

    public function __construct ()
    {
        session_start();
    }

    public function save($value)
    {
        $_SESSION[$this->key] = serialize($value);
    }

    public function get()
    {
        if (isset($_SESSION[$this->key])) {
            return unserialize($_SESSION[$this->key]);
        }

        return null;
    }

    public function remove()
    {
        if (isset($_SESSION[$this->key])) {
            unset($_SESSION[$this->key]);
        } else {
            throw new Exception("Невозможно удалить несуществующие данные!");
        }

    }
}