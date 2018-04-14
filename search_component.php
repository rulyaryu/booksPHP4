<?php 
    require_once './classes/Book.classes.php';
    require_once './functions/filehandlers.php';

    use function Filehandler\getBooksByQuery;

    if(isset($_GET['q'])) {
        $authorArr = getBooksByQuery($file, $_GET['q']);
        $authorTmp = [];
        foreach ($authorArr as $key => $value) {
            $authorTmp[] = new Book(...$value);
        }

        $pagObj = new Pagination(30, $current, count($authorTmp));

        $authorArr = array_chunk(
                    array_slice($authorTmp, $startIdx, $pagObj->getPerpage()),
                    3
                );
    }
    
?> 