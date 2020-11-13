<?php
/**
 * Validate user credentials
 */
class Validator{
    
    public function validateUsername($username){
        $length =strlen($username);
        return $length>=8 && $length<= 26 ? 1 : -1;
    }

    public function validatePassword($password){
        $length = strlen($password);
        return $length>=8 && $length<= 15 ? 1 : -1;
    }

    public function validateEmail($email){
         return filter_var($email,FILTER_VALIDATE_EMAIL) ? 1 : -1;
    }
}
