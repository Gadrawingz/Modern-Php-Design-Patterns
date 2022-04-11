<?php

/*****************************************************
 * Multiton:
 * ---------
 * Maybe someone will want to use a variety of singletons in your project:
 * 
 * ***************************************************/

abstract class FactoryAbstract {

    protected static $instances = array();

    public static function getInstance() {
        
        $className = static::getClassName();
        
        if (!(self::$instances[$className] instanceof $className)) {
            self::$instances[$className] = new $className();
        }
        return self::$instances[$className];
    }

    public static function removeInstance() {
        $className = static::getClassName();
        
        if (array_key_exists($className, self::$instances)) {
            unset(self::$instances[$className]);
        }
    }

    final protected static function getClassName() {
        return get_called_class();
    }

    protected function __construct() {
    }

    final protected function __clone() {
    }
}

abstract class Factory extends FactoryAbstract {
    
    final public static function getInstance() {
        return parent::getInstance();
    }

    final public static function removeInstance() {
        parent::removeInstance();
    }
}

// USING:
class FirstProduct extends Factory {
    public $a = [];
}

class SecondProduct extends FirstProduct {
}

FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 3;
SecondProduct::getInstance()->a[] = 4;

print_r(FirstProduct::getInstance()->a);
// array(1, 3)
print_r(SecondProduct::getInstance()->a);
// array(2, 4)