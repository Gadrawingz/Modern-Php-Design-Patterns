<?php


/**************************************************
 * Sometime, some objects should be initialized multiple times. 
 * It makes sense to save on their initialization, 
 * especially if initialization requires time & resources. 
 * 
 * Prototype – a pre-initialized and saved object. If necessary, it could be cloned:
 * 
 * ***********************************************/


interface Product {
}

class Factory {
    private $product;
    
    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function getProduct() {
        return clone $this->product;
    }
}

class SomeProduct implements Product {
    public $name;
}

$prototypeFactory = new Factory(new SomeProduct());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product';

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product';

print_r($firstProduct->name);
// The first product
print_r($secondProduct->name);
// Second product