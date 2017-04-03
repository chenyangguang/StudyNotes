<?php

// require 'vendor/autoload.php';
use Acme\Book;
use Acme\BookInterface;
use Acme\Kindle;
use Acme\eReaderInterface;

class Person {

    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }

}

(new Person)->read(new Book);
(new Person)->read(new KindleAdapter(new Kindle));