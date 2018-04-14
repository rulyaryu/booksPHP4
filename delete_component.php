<?php 
    session_start();
    require '../layout/head.view.php';
    require_once '../classes/Book.classes.php';
    $editFile = new SplFileObject('../data/srcopy.csv', 'r');
    
	$editFile -> setFlags(SplFileObject::READ_CSV | 
						SplFileObject::READ_AHEAD | 
						SplFileObject::SKIP_EMPTY |
						SplFileObject::DROP_NEW_LINE);  //важно было добавить эту строчку - 
                                                        // она позволяет удалять перенос строки 
                                                        // при использовании fputcsv()
    $deleteBook = [];

    foreach ($editFile as $key => $value) {
        if($value[0] === $_GET['id']) {
            $deleteBook = new Book(...$value);
            $currentIdx = $key; 
            break;
        }
         
	}
	
	if(filter_has_var(INPUT_POST, 'deleteSubmit')) {

		$editFile = null;		

		$list = [];
        $list = file('../data/srcopy.csv') or die('Не открывается');
        
		unset($list[$currentIdx]);

		$fileUpdated = fopen('../data/srcopy.csv', 'r+');
		flock($fileUpdated, LOCK_EX);
		ftruncate($fileUpdated, 0);
		foreach ($list as $key => $value) {
			fwrite($fileUpdated, $value);
		}
		fclose($fileUpdated);
	}
?>