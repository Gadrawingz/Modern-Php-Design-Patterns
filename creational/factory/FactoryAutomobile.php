<?php

/****************************************************************************
 * Factory
 * -------
 * One of the most commonly used design patterns is the factory pattern. 
 * In this pattern, a class simply creates the object you want to use. 
 * *************************************************************************/

class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . ' ' . $this->vehicleModel .'<br>';
    }
}

class AutomobileFactory
{
    public static function create($make, $model) 
    {
        return new Automobile($make, $model);
    }
}

// have the factory create the Automobile object
$veyron = AutomobileFactory::create('Bugatti', 'Veyron');
$toyota = AutomobileFactory::create('Toyota', 'Toyota.inc');

print_r($veyron->getMakeAndModel()); // outputs "Bugatti Veyron"
print_r($toyota->getMakeAndModel()); // outputs "Toyota Toyota.inc"


/*****************************************************************
 * This code uses a factory to create the Automobile object. 
 * 
 * There are two possible benefits to building your code this way; 
 * 
 * 1. the first is that if you need to change, rename, or replace the Automobile class 
 * later on you can do so and you will only have to modify the code in the factory, 
 * instead of every place in your project that uses the Automobile class. 
 * 
 * 2. The second possible benefit is that, if creating the object is a complicated job, 
 * you can do all of the work in the factory instead of repeating it every time you want to 
 * create a new instance.
 * 
 * Using the factory pattern isn’t always necessary (or wise). 
 * 
 * The example code used here is so simple that a factory would simply be adding unneeded complexity.
 * However if you are making a fairly large or complex project you may save yourself 
 * a lot of trouble down the road by using factories.
 * 
 * ***************************************************************/