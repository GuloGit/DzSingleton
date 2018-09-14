<?php
class SessionStorage implements IStorage
{
    protected $key = "cartItemsList";
    protected static $instance = null;

    protected function __construct ()
    {
        session_start();
    }

    protected function __clone()
    {
    }
    protected function __wakeup()
    {
    }
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
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
    public function destroy()
    {
        unset($_SESSION);
        session_destroy();
    }

}