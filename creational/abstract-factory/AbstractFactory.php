<?php

/******************************************************
 * 
 * Abstract Factory
 * ----------------
 * There are situations when we have some of the same type of factories and 
 * we want to encapsulate the logic of choice, what of the factories use to a given task. 
 * 
 * This pattern cames to the rescue:
 * ****************************************************/

class Config {
    public static $factory = 1;
}

interface Product {
    public function getName();
}

abstract class AbstractFactory {
    
    public static function getFactory() {
        switch (Config::$factory) {
            case 1:
                return new FirstFactory();
            case 2:
                return new SecondFactory();
        }
        throw new Exception('Bad config');
    }
    abstract public function getProduct();
}

class FirstFactory extends AbstractFactory {
    public function getProduct() {
        return new FirstProduct();
    }
}

class FirstProduct implements Product {
    public function getName() {
        return 'The product from the first factory';
    }
}

class SecondFactory extends AbstractFactory {
    public function getProduct() {
        return new SecondProduct();
    }
}

class SecondProduct implements Product {
    public function getName() {
        return 'The product from second factory';
    }
}

$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

print_r($firstProduct->getName());
// The first product from the first factory

print_r($secondProduct->getName());
// Second product from second factory


?>