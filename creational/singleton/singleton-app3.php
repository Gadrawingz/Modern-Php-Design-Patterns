<?php

/***************************************************************
 * Singleton
 * ---------
 * 
 * When designing web applications, it often makes sense conceptually and architecturally 
 * to allow access to one and only one instance of a particular class. 
 * 
 * The singleton pattern enables us to do this.
 * 
 * TODO: NEED NEW SINGLETON CODE EXAMPLE
 * 
 * The code above implements the singleton pattern using a static variable and the static 
 * creation method getInstance(). Note the following:
 * 
 * X1. The constructor __construct() is declared as protected to prevent creating a new instance 
 * outside of the class via the new operator.
 * 
 * X2. The magic method __clone() is declared as private to prevent cloning of an instance of 
 * the class via the clone operator.
 * 
 * X3. The magic method __wakeup() is declared as private to prevent unserializing of an instance of 
 * the class via the global function unserialize() .
 * 
 * X4. A new instance is created via late static binding in the static creation method getInstance() 
 * with the keyword static. This allows the subclassing of the class Singleton in the example.
 * 
 * 
 * 
 * The singleton pattern is useful when we need to make sure we only have a single instance 
 * of a class for the entire request lifecycle in a web application. This typically occurs when 
 * we have global objects (such as a Configuration class) or a shared resource (such as an event queue).
 * 
 * 
 * You should be wary when using the singleton pattern, as by its very nature it introduces 
 * global state into your application, reducing testability. 
 * 
 * In most cases, dependency injection can (and should) be used in place of a singleton class. 
 * Using dependency injection means that we do not introduce unnecessary coupling into the design 
 * of our application, as the object using the shared or global resource requires no knowledge of 
 * a concretely defined class.
 * 
 * *************************************************************/




?>