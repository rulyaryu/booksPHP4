<?php 

    session_start();

    require './classes/Book.classes.php';
    require './classes/Pagination.classes.php';
    require_once './functions/filehandlers.php';
    require_once './functions/helpers.php';

    use function Filehandler\getBooksByIdx;
    use function Filehandler\getNumOfLines;
    use function Filehandler\getBooksByCategory;
    use function Helpers\getStartIdx;

    $file = new SplFileObject("./data/srcopy.csv");
    $file->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::READ_AHEAD);

    if(isset($_GET['page'])) {
        $current = $_GET['page'];
    } else {
        $current = 1;
    }

    $pagObj = new Pagination(30, $current, getNumOfLines($file));

    $startIdx = getStartIdx($current, $pagObj->getPerpage());

    $idxArr = array_fill($startIdx, $pagObj->getPerpage(), '');

    $booksArr = getBooksByIdx($file, $idxArr);

    $arr = [];

    foreach ($booksArr as $key => $fields) {
            $arr[] = new Book(...$fields);
    }

    $pageArr = array_chunk($arr, 3);

    require './layout/head.view.php';
    require './layout/content.view.php';
    require './layout/foot.view.php';

    require "memory.php";

?>