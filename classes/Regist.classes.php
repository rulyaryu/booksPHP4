<?php 

        class Regist {

            public static function isLoginTaken($loginArr, $login) {
                return empty($loginArr) ? true : in_array($login, $loginArr, true);
            }

            public static function isFormFilled(array $arr) {
                return in_array([], $arr) ? false : true;
            }

            public static function isEmailValid($email) {
               return filter_var($email, FILTER_VALIDATE_EMAIL);
            }

        }

?>