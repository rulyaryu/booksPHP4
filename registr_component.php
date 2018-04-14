<?php 

//нужно перенести в модель
$usrf = new SplFileObject('./data/users.csv', 'a+');
$usrf -> setFlags(SplFileObject::READ_CSV);

foreach($usrf as $key => $value) {
    $usrArr[] = $value[0];
}

////////////////////////////////////////////////
require_once './classes/Regist.classes.php';
require_once './classes/Password.classes.php';

$msg = '';
$msgArr = [
    'ok' => 'Passed',
    'passw' => 'passwords don\'t match',
    'login' => 'This login already exist.. try something else',
    'email' => 'Please enter correct email',
    'fail' => 'Failed'
];
$msgClass = '';
$registrArr = [];

if(filter_has_var(INPUT_POST, 'submitReg')) {
    
    $registrArr = [
        'login' => htmlentities($_POST['loginReg']),
        'email' => htmlentities($_POST['emailReg']),
        'password' => Password::hash($_POST['passwReg'])
    ];

    
    if(Regist::isFormFilled($registrArr)) {

        if(Regist::isLoginTaken($usrArr, $registrArr['login'])) {
            $msg = $msgArr['login'];
            $msgClass = 'alert-danger';
        }
        else if(!Regist::isEmailValid($registrArr['email'])) {
            $msg = $msgArr['email'];
            $msgClass = 'alert-danger';
        } else if(!Password::verify($_POST['passwRepReg'], $registrArr['password'])) {
            $msg = $msgArr['passw'];
            $msgClass = 'alert-danger';
        } else {
            $usrf -> fputcsv($registrArr); 
            $msg = $msgArr['ok'];
            $msgClass = 'alert-success';
        }
    } else {
        $msg = $msgArr['fail'];
        $msgClass = 'alert-danger';
    }

}

?>