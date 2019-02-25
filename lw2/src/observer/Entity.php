<?php

class Entity
{
    /** @var string */
    private $uid;

    public function __construct()
    {
        $this->uid = uniqid();
    }

    public function getUid(): string
    {
        return $this->uid;
    }
}