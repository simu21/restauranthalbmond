<?php

require_once '../repository/UserRepository.php';
require_once '../repository/GerichtRepository.php';
require_once '../repository/GerichtArtRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{

    public function index()
    {
        $gerichtartRepository = new GerichtArtRepository();
        $userRepository = new UserRepository();



        $view = new View('user_index');
        if(isset($_GET['message'])) {
            $fehlermeldung = $_GET["message"];
            $view->fehlermeldung = $fehlermeldung;
        }
        if(isset($_SESSION['user_id'])){
            $uid = $_SESSION['user_id'];
            $view->user = $userRepository->readById($uid);
        }
        $view->title = 'Alle Gerichte';
        $view->heading = 'Alle Gerichte';
        $view->gerichtarten = $gerichtartRepository->readAll();
        $view->display();
    }



    public function gerichteanzeigen(){
        $gerichtRepository = new GerichtRepository();
        $userRepository = new UserRepository();
        $gerichartRepository = new GerichtArtRepository();
        $view = new View('user_gerichtindex');
        $view->heading = 'Gerichte';
        $view->title = 'Gerichte';
        if(isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];}
        if(isset($_GET['id'])) {
            $gaid = $_GET['id'];
            $view->gerichtarten = $gerichartRepository->readById($gaid);
            $view->gaid= $gaid;
            $view->gerichte = $gerichtRepository->readAllGerichte($gaid);
        }
        $view->display();
    }
    // Verein updaten
    public function doUpdate(){
        if ($_POST['send']) {
            $uid = $_SESSION['user_id'];
            $vereinsname = $_POST['vereinsname'];
            $kontaktperson = $_POST['kontaktperson'];
            $userRepository = new UserRepository();
            $userRepository->update($uid,$vereinsname,$kontaktperson);
        }
    }

    // Login-Seite anzeigen
    public function login()
    {
        $view = new View('user_login');
        if(isset($_GET['message'])) {
            $fehlermeldung = $_GET["message"];
            $view->fehlermeldung = $fehlermeldung;
        }
        $view->title = 'Login';
        $view->heading = 'Einloggen';
        $view->display();
    }

    //Logout anzeigen
    public function logout(){
        $view = new View('user_logout');
        $view->title = 'Logout';
        $view->display();
    }

    //Logout durchführen
    public function doLogout(){
        session_destroy();
        header('Location: ../');
    }

    // Registrieren-Seite anzeigen
    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Registration';
        $view->heading = 'Registrieren';
        $view->display();
    }

    // Erstellen von einem User in DB
    public function doCreate()
    {
        if ($_POST['send']) {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $plz = $_POST['plz'];
            $ort = $_POST['ort'];
            $telefonnummer = $_POST['telefonnummer'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $admin = 0;
            $userRepository = new UserRepository();
            $userRepository->create($vorname,$nachname,$plz,$ort,$telefonnummer, $email, $password,$admin);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user/login');
    }

    // Einloggen (überprüfung mit datenbank-einträgen)
    public function doLogin()
    {
        if ($_POST['send']) {
            if(isset($_POST['email'])&&isset($_POST['password'])){

            $email = $_POST['email'];
            $password = $_POST['password'];

            $emailregex = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
            $passwordregex = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$";


            //if(preg_match($emailregex,$email)&& preg_match($passwordregex,$password)){
            //if(isset($_POST['email'])&& isset($_POST['password'])){
              //  $email = $_POST['email'];
                //$password = $_POST['password'];

                $userRepository = new UserRepository();
                $userRepository->login($email, $password);
                if($userRepository->login($email, $password) < 1) {
                    header('Location: /user/login?message=Die Daten stimmen nicht überein!');
                } else {
                    header('Location: /user');
                }
            }
            else{

            }
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        //header('Location: /user');
    }

    // Delete-Seite anzeigen
    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
