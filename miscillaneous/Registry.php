<?php
/**
* Registry class:
* 
* This pattern is a bit unusual from the overall list, because it is not a Creational pattern. 
* Well, register – it is hash, and you access to data through the static methods.
* 
*/
class Package {
    protected static $data = array();
    
    public static function set($key, $value) {
        self::$data[$key] = $value;
    }
    
    public static function get($key) {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    final public static function removeObject($key) {
        if (array_key_exists($key, self::$data)) {
            unset(self::$data[$key]);
        }
    }
}

Package::set('name', 'Package name');
print_r(Package::get('name'));
// Package name

print("<br>");

Package::set('gadson', 'Gadrawingz');
print_r(Package::get('gadson'));
// Gadrawingz