<?php
/**
 * Created by PhpStorm.
 * User: bfellj
 * Date: 20.04.2018
 * Time: 13:08
 */
class Security
{
    public static function checkLogin() {
        if(!isset($_SESSION['uid']))
        {
            header('Location: /user/login');
        }
    }
    public static function checkAdmin() {
        Security::checkLogin();
        $uid = $_SESSION['user_id'];
        $userRepository = new UserRepository();
        $userdaten = $userRepository->readById($uid);
        if($userdaten->admin !== "1")
        {
            header('Location: /user?message=Du bist kein Admin!');
        }
    }
}