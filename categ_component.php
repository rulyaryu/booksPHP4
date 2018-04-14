<?php
     require_once './classes/Book.classes.php';
     require_once './functions/filehandlers.php';

     use function Filehandler\getBooksByCategory;

     if(isset($_GET['cat']) && $_GET['cat'] !== 'All') {
         $categoryArr = getBooksByCategory($file, $_GET['cat']);
         foreach ($categoryArr as $key => $value) {
            $tmpArr[] = new Book(...$value);
        }

        $pagObj = new Pagination(30, $current, count($tmpArr));

        $categoryArr = array_chunk(
                            array_slice($tmpArr, $startIdx, $pagObj->getPerpage()),
                            3
                        );
     }
 
?>