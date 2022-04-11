<?php

/******************************************************************
 * Factory
 * -------
 * 
 * This is another very known pattern. 
 * 
 * It acts exactly as it sounds: this is class that does as 
 * the real factory of object instances. 
 * 
 * In other words, assume that we know that there are 
 * factories that produce some kind of a product. 
 * 
 * We do not care how a factory makes this product, but we know that any 
 * factory has one universal way to ask for it:
 * 
 * ***************************************************************/

interface Factory {
    public function getProduct();
}

interface Product {
    public function getName();
}

class FirstFactory implements Factory {
    public function getProduct() {
        return new FirstProduct();
    }
}

class SecondFactory implements Factory {
    public function getProduct() {
        return new SecondProduct();
    }
}




class FirstProduct implements Product {
    public function getName() {
        return 'The first product';
    }
}

class SecondProduct implements Product {
    public function getName() {
        return 'Second product';
    }
}

$factory = new FirstFactory();
$firstProduct = $factory->getProduct();

$factory = new SecondFactory();
$secondProduct = $factory->getProduct();

print_r($firstProduct->getName());
// The first product

print_r($secondProduct->getName());
// Second product
