<?php

/**********************************
 * Object pool
 * -----------
 * Is a hash, which can be stacked to initialize an object and get them out if needed:
 * *******************************/

class Product {
    protected $id;
    public function __construct($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
}

class Factory {
    protected static $products = array();
    
    public static function pushProduct(Product $product) {
        self::$products[$product->getId()] = $product;
    }
    
    public static function getProduct($id) {
        return isset(self::$products[$id]) ? self::$products[$id] : null;
    }

    public static function removeProduct($id) {
        if (array_key_exists($id, self::$products)) {
            unset(self::$products[$id]);
        }
    }
}

Factory::pushProduct(new Product('first'));
Factory::pushProduct(new Product('second'));

print_r(Factory::getProduct('first')->getId());
// first

print_r(Factory::getProduct('second')->getId());
// second

print_r(Factory::getProduct('third')->getId());
// second