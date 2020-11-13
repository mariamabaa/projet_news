<?php

class SessionMgn{

    private static $isStarted = false;
    
    public function start(){
        if(self::$isStarted == false){
            $s = session_start();
            self::$isStarted = true;
        }
    }


    public function destroySession(){
        if(self::$isStarted==true){
            $_SESSION =array();
            session_unset();
            session_destroy();
            self::$isStarted = false;
        }
    }

}