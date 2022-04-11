<?php
/**
 * Singleton class:
 * ----------------
 * This is one of the most popular patterns. 
 * 
 * When developing web applications, it often makes sense conceptually and 
 * architecturally to allow access to only one instance of a particular class 
 * (during runtime). The singleton pattern enables us to do this. Example:
 * 
 */
final class Product
{
    /**
     * @var self
     */

    private static $instance;
    /**
     * @var mixed
     */

    public $mix;
    /**
     * Return self instance
     * @return self
     */

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
    }

    private function __clone() {
    }
}

$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();

$firstProduct->mix = 'test';
$secondProduct->mix = 'example';


print_r($firstProduct->mix);
// example
print_r($secondProduct->mix);
// example

?>