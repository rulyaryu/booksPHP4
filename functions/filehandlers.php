<?php

namespace Filehandler;

function getBooksByIdx(&$fileObj, $idxArr) {
    foreach ($idxArr as $key => $value) {
       $fileObj->seek($key);
       if(count(str_getcsv($fileObj->current())) < 7 ===false)
       $books[] = str_getcsv($fileObj->current());
    }
    return $books;
}

function getBooksByCategory(&$fileObj, $category) {
    $fileObj->rewind();
    while(!$fileObj->eof()) {
        $tmp = str_getcsv($fileObj->current());
        if(isset($tmp[6]) && $tmp[6] == $category) {
            yield $tmp;
        }
        
        $fileObj->next();
    }
}

function getBooksByQuery(&$fileObj, $search) {
    $fileObj->rewind();
    while($fileObj->valid()) {
        $tmp = str_getcsv($fileObj->current());
        // if(isset($tmp[4]) && $tmp[4] == $search)
        if(isset($tmp[4]) && (strripos($tmp[4], $_GET['q']) !== false))  {
            yield $tmp;
        }

        $fileObj->next();
    }
}


function getNumOfLines(&$fileObj) {
    $fileObj -> seek(PHP_INT_MAX);
    return $fileObj -> key() - 1;
}


function readTheFile($path) {
    $handle = fopen($path, "r");
    while(!feof($handle)) {
        yield fgetcsv($handle);
    }
    fclose($handle);
}

