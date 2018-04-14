<?php 
    require "content layouts/header.php";
    
    

    if(isset($_GET['auth']) && $_GET['auth'] == 'login') {
		require 'layout/auth.view.php';
	}
	if(isset($_GET['auth']) && $_GET['auth'] == 'signup') {
		require 'layout/registr.view.php';
	} 
	
	if(isset($_SESSION['loginSuccess']) && $_SESSION['loginSuccess'] === 'success') {
        require "content layouts/books.php";
        require "content layouts/pagination.php";
	}

	if(isset($_SESSION['adminSuccess']) && $_SESSION['adminSuccess'] === 'success') {
        require "content layouts/books.php";
        require "content layouts/pagination.php";
	}

?> 