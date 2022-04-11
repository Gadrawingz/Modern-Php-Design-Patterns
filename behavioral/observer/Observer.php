<?php

/*******************************************************
 * Observer
 * --------
 * An object is made observable by adding a method that allows another object, 
 * the observer to get registered. If the observable object gets changed, 
 * it sends a message to the objects which are registered as observers:
 * 
 * *****************************************************/

interface Observer {
  function onChanged($sender, $args);
}

interface Observable {
  function addObserver($observer);
}

class CustomerList implements Observable {
  
  private $_observers = array();
  
  public function addCustomer($name) {
    foreach($this->_observers as $obs)
      $obs->onChanged($this, $name);
  }
  
  public function addObserver($observer) {
    $this->_observers []= $observer;
  }
}

class CustomerListLogger implements Observer {
  public function onChanged($sender, $args) {
    echo( "'$args' Customer has been added to the list<br>" );
  }
}


// Awesome implementation
$ul = new CustomerList();
$ul->addObserver( new CustomerListLogger() );
$ul->addCustomer( "Gad" );
$ul->addCustomer( "Jackson" );
$ul->addCustomer( "Paula" );


?>