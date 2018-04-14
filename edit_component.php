<?php 
	session_start();
    require '../layout/head.view.php';
    require_once '../classes/Book.classes.php';
    
    $editFile = new SplFileObject('../data/srcopy.csv', 'r');
    
	$editFile -> setFlags(SplFileObject::READ_CSV);
    foreach ($editFile as $key => $value) {
        if($value[0] == $_GET['id']) {
            $editBook = new Book(...$value);
            break;
        }
         
	}
	
	if(filter_has_var(INPUT_POST, 'editSubmit')) {
		$editedFields = [
			'title' => $_POST['edit-book'],
			'author' => $_POST['edit-writer'],
			'imgUrl' => $_POST['edit-src'],
			'category' => $_POST['edit-category']
		];

        $editBook->setCardFields($editedFields);
        $ef = file('../data/srcopy.csv') or die('Не открывается');  

        foreach ($ef as $key => $value) {
            if(in_array($editBook->id, str_getcsv($value))) {
                $currentIdx = $key;
            }
        }
        $ef[$currentIdx] = $editBook->getString() . "\n";
        $fileEdited = fopen('../data/srcopy.csv', 'r+');
        flock($fileEdited, LOCK_EX);
        ftruncate($fileEdited, 0);
        foreach ($ef as $k => $val) {
            fwrite($fileEdited, $val);
        }
        fclose($fileEdited);
    }
?>