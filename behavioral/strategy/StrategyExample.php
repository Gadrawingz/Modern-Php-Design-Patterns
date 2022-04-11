
<?php

/*******************************************************************
 * Strategy:
 * ---------
 * 
 * The strategy pattern is based on algorithms. 
 * You encapsulate specific families of algorithms allowing the client class 
 * responsible for instantiating a particular algorithm to have no knowledge 
 * of the actual implementation. Example:
 * 
 * *****************************************************************/

interface OutputInterface {
    public function load();
}

class SerializedArrayOutput implements OutputInterface {
    public function load() {
        return serialize($arrayOfData);
    }
}
class JsonStringOutput implements OutputInterface {
    public function load() {
        return json_encode($arrayOfData);
    }
}
class ArrayOutput implements OutputInterface {
    public function load() {
        return $arrayOfData;
    }
}