<?php
    header('Content-Type: application/json; charset=utf-8');  

    $author = new SplFileObject('./data/authors.csv', 'r');

    $author -> setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD 
                        | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

    $authorsArr = [];

    foreach ($author as $key => $value) {
        $authorsArr[] = utf8_encode($value[0]);
    }         
    echo json_encode($authorsArr, JSON_PRETTY_PRINT);
?>