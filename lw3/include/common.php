<?php

spl_autoload_register(function($className) {
   require_once 'src/' . $className . '.php';
});

spl_autoload_register(function($className) {
   require_once 'src/beverage/condiment' . $className . '.php';
});

spl_autoload_register(function($className) {
   require_once 'src/beverage/' . $className . '.php';
});