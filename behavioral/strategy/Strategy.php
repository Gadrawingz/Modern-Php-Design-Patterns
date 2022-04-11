<?php

/*********************************************************************
 * https://phptherightway.com/pages/Design-Patterns.html
 * 
 * With the strategy pattern you encapsulate specific families of algorithms allowing the client 
 * class responsible for instantiating a particular algorithm to have no knowledge 
 * of the actual implementation.
 *  
 * There are several variations on the strategy pattern, the simplest of which is outlined below:
 * 
 * This first code snippet outlines a family of algorithms; you may want a serialized array, 
 * some JSON or maybe just an array of data:
 * 
 * *******************************************************************/

interface OutputInterface
{
    public function load();
}

class SerializedArrayOutput implements OutputInterface
{
    public function load()
    {
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load()
    {
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load()
    {
        return $arrayOfData;
    }
}


/*********************************************************************
 * 
 * By encapsulating the above algorithms you are making it nice and clear in your code 
 * that other developers can easily add new output types without affecting the client code.
 * 
 * You will see how each concrete ‘output’ class implements an OutputInterface - 
 * this serves two purposes, primarily it provides a simple contract which must be obeyed 
 * by any new concrete implementations. 
 * 
 * Secondly by implementing a common interface you will see in the next section that you can 
 * now utilise Type Hinting to ensure that the client which is utilising these behaviours is 
 * of the correct type in this case ‘OutputInterface’.
 * 
 * 
 * The next snippet of code outlines how a calling client class might use one of these 
 * algorithms and even better set the behaviour required at runtime:
 * 
 * *******************************************************************/


class SomeClient
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput()
    {
        return $this->output->load();
    }
}

/***********************************************************************
 * The calling client class above has a private property which must be set at runtime and 
 * be of type ‘OutputInterface’ once this property is set a call to loadOutput() will call 
 * the load() method in the concrete class of the output type that has been set.
 * *********************************************************************/

$client = new SomeClient();

// Want an array?
$client->setOutput(new ArrayOutput());
$data = $client->loadOutput();

// Want some JSON?
$client->setOutput(new JsonStringOutput());
$data = $client->loadOutput();


?>