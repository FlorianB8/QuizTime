<?php
require_once(__DIR__.'/Connect.php');

class Flash {

    public static function setMessage(string $message, string $type) {
        if(session_status() != 2){
            session_start();
        }
        $_SESSION['type'] = $type;
        $_SESSION['message'] = $message;
    }

    public static function getMessage() {
        if(session_status() != 2){
            session_start();
        }
        if(isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $type = $_SESSION['type'];
            self::deleteMessage();
            return '<div class="mt-3 alert alert-'.$type.'">'.$message.'</div>';
        }else {
            return '';
        }
    }
    
    private static function deleteMessage() {
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}