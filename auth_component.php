<?php 

    require_once './classes/Password.classes.php';

    $msgAuth = '';
    $msgAuthClass = '';

    $userAuthFile = new SplFileObject('./data/users.csv', 'r');
    $userAuthFile -> setFlags(SplFileObject::READ_CSV);

    if(filter_has_var(INPUT_POST, 'login')) {

        foreach ($userAuthFile as $key => $value) {
            if (in_array($_POST['loginAuth'], $value, true)) {
                $_SESSION['user'] = $_POST['loginAuth'];
                if(Password::verify($_POST['passwAuth'], $value[2])) {
                    isset($value[3]) && $value[3] == 'idAdmin' 
                            ?   $_SESSION['adminSuccess'] = 'success' 
                            :   $_SESSION['loginSuccess'] = 'success';
                } else {
                    $msgAuth = 'wrong password';
                    $msgAuthClass = 'alert-danger';
                }
            }
        }

        if ($_SESSION['user'] === false) 
            $msgAuth = 'this login is not registred yet';
            $msgAuthClass = 'alert-danger';
    }
?>