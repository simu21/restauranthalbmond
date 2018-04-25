<?php

class Security
{
    public static function checkLogin() {
        if(!isset($_SESSION['user_id']))
        {
            header('Location: /user/login?message=Loggen Sie sich erst ein!');
        }
    }
    public static function checkAdmin() {
        $uid = $_SESSION['user_id'];
        $userRepository = new UserRepository();
        $userdaten = $userRepository->readById($uid);
        if($userdaten->admin != "1")
        {
            header('Location: /user?message=Du bist kein Admin!');
        }
    }
}