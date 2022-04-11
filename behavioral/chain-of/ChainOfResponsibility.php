
<?php

/*******************************************************************
 * Chain of responsibility
 * ------------------------
 * The pattern also has another name – Chain of Command. 
 * It follows a chain of command with a series of handlers. The message (query) runs through 
 * a series of these handlers and at each junction it is regulated whether the handler can handle 
 * the query or not. The process stops the moment a handler can handle the request:
 * 
 * *****************************************************************/

interface Command {
    function onCommand($name, $args);
}

class CommandChain {
    private $_commands = array();
    public function addCommand($cmd) {
        $this->_commands[]= $cmd;
    }
    public function runCommand($name, $args) {
        foreach($this->_commands as $cmd) {
            if ($cmd->onCommand($name, $args))
                return;
        }
    }
}

class CustCommand implements Command {
    public function onCommand($name, $args) {
        if ($name != 'addCustomer')
            return false;
        echo("This is CustomerCommand handling 'addCustomer'<br>");
        return true;
    }
}

class MailCommand implements Command {
    public function onCommand($name, $args) {
        if ($name != 'mail')
            return false;
        echo("This is MailCommand handling 'mail'<br>");
        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand( new CustCommand());
$cc->addCommand( new MailCommand());

$cc->runCommand('addCustomer', null);
$cc->runCommand('mail', null);
$cc->runCommand('calling', null); // Calling won't be returned as we dont have it!
