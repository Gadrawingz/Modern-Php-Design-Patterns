<?php

/************************************************************************************
 * Lazy Initialization
 * -------------------
 * 
 * Here is another interesting situation. Imagine that you have a factory, 
 * but you do not know what part of its functionality you need, and what – no. 
 * In such cases, the necessary operations are performed only if they are needed and only once:
 * 
 * *********************************************************************************/

interface Product {
    public function getName();
}

class Factory {

    protected $firstProduct;
    protected $secondProduct;

    public function getFirstProduct() {
        if (!$this->firstProduct) {
            $this->firstProduct = new FirstProduct();
        }
        return $this->firstProduct;
    }

    public function getSecondProduct() {
        if (!$this->secondProduct) {
            $this->secondProduct = new SecondProduct();
        }
        return $this->secondProduct;
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


$factory = new Factory();
print_r($factory->getFirstProduct()->getName());
echo "<br>";
// The first product
print_r($factory->getSecondProduct()->getName());
echo "<br>";
// Second product
print_r($factory->getFirstProduct()->getName());
echo "<br>";
// The first product