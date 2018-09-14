<?php
interface IStorage
{
    public function save($value);
    public function get();
    public function remove();
}