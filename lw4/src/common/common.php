<?php

spl_autoload_register(function($className) {
    require_once 'src/' . $className . '.php';
});