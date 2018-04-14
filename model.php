<?php 

// namespace Book;

require_once "./functions/filehandlers.php";
require_once "./functions/helpers.php";
require "./classes/Book.classes.php";

$booksFile = new SplFileObject('./data/src.csv', 'r');

$booksFile -> setFlags(SplFileObject::SKIP_EMPTY | 
                       SplFileObject::READ_AHEAD);

$page = 1;
$perpage = 30;

$idx = range($page, $perpage);

$booksArr = getBooksByIdx($booksFile, $idx);

foreach ($booksArr as $key => $value) {
    $booksCollection[] = new Book(...$value);
}



// var_dump($booksCollection);


// var_dump($idx);

