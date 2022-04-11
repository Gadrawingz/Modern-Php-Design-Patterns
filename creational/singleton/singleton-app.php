<?php
/*********************************************************
 * In order to restrict the instantiation of a class to a single object, 
 * singleton pattern is used, which can be useful when only one object is required 
 * across the system. It often makes sense conceptually and architecturally to allow access 
 * to one and only one instance of a particular class while designing web applications. 
 * 
 * In order to prevent the direct creation of objects from the class, private constructor is used.
 * 
 * The only way to create an instance from the class is by using a static method that 
 * creates the object only if it wasn’t already created.The class has to provide global point of 
 * access to the unique instance. We end up with all the variables pointing to the same, single 
 * object as we restrict the number of objects that can be created from a class to only one. 
 * 
 * Following code demonstrates the concept of singleton concept. It is implemented based on static 
 * method creation is getInstance().
 * 
 * *******************************************************/


class Singleton { 

	public static function getInstance() { 
		
		static $instance = null; 

		if (null === $instance) { 
			$instance = new static(); 
		} 
		return $instance; 
	}

	protected function __construct() {
	}

	private function __clone() {
	} 

	public function __wakeup() {
	}
} 


class SingletonChild extends Singleton {

} 

$obj = Singleton::getInstance(); 
var_dump($obj === Singleton::getInstance()); 

$obj2 = SingletonChild::getInstance(); 
var_dump($obj2 === Singleton::getInstance());
var_dump($obj2 === SingletonChild::getInstance());

?>