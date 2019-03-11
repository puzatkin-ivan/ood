<?php

namespace exception;

class IncorrectCountOfArgument extends ShapeFactoryException
{
    public function __construct()
    {
        parent::__construct("Incorrect count of argument");
    }
}