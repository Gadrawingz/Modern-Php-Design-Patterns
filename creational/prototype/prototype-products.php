<?php 
/********************************************
 * It is a creational design pattern that solves problem of creating product objects 
 * without specifying their concrete classes. 
 * 
 * It is one of the most commonly used design patterns. 
 * 
 * We separate the making of objects into a dedicated class whose main responsibility 
 * is the making of objects, when we use the factory pattern. 
 * 
 * ******************************************/

class Product { 

	private $companyType; 
	private $companyName; 

	public function __construct($productBased, $Amazon) { 
		$this->companyType = $productBased;
		$this->companyName = $Amazon;
	}

	public function designModel(){
		return $this->companyType . ' ' . $this->companyName;
	}
}


class DevelopProduct {

	public static function create($productBased, $Amazon){
		return new Product($productBased, $Amazon);
	}
}

$obj1 = DevelopProduct::create('Automation', 'Cloud service');
$obj2 = DevelopProduct::create('Testing Apps', 'Other service');


print_r($obj1->designModel());
echo "<br>";
print_r($obj2->designModel());




/***********************************************
 * 
 * The above code uses a factory to create the Product object. 
 * 
 * Benefits for building this code are:
 * ------------------------------------
 * 
 * If you want to change, rename, or replace the Product class later on you can do it 
 * and instead of every place in your project that uses the Product class, 
 * you will only have to modify the code in the factory.
 * 
 * Instead of repeating it every time you want to create a new instance, 
 * you can do all of the work in the factory, If creating the object is a complicated job.
 * For making large or complex projects, factories might not be suitable.
 * 
 * *********************************************/

?>