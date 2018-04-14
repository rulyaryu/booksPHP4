<?php 

    class Password {
        
        public static function hash($password) {
            return password_hash(htmlentities($password), PASSWORD_DEFAULT);
        }

        //true or false
        public static function verify($password, $hash) {
            return password_verify(htmlentities($password), $hash);
        }

    }

?>