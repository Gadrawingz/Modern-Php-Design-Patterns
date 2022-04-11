<?php

/***********************************************************************
 * Adapter
 * -------
 * 
 * This pattern allows you to repurpose a class with a different interface, 
 * allowing it to be used by a system which uses different calling methods:
 * 
 * *********************************************************************/

class SimpleBook {

    private $author;
    private $title;

    function __construct($author_in, $title_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }

    function getAuthor() {
        return $this->author;
    }

    function getTitle() {
        return $this->title;
    }
}

class BookAdapter {

    private $book;
    
    function __construct(SimpleBook $book_in) {
        $this->book = $book_in;
    }
    
    function getAuthorAndTitle() {
        return $this->book->getTitle().' by '.$this->book->getAuthor();
    }
}

// Usage
$book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
$bookAdapter = new BookAdapter($book);

echo 'Author and Title: '.$bookAdapter->getAuthorAndTitle()."<br>";
echo "Umwanditsi n' igitabo: ".$bookAdapter->getAuthorAndTitle()."<br>";

/*function ($line_in) {
  echo $line_in."<br/>";
}*/



?>