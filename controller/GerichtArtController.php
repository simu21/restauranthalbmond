<?php

require_once '../repository/UserRepository.php';
require_once '../repository/GerichtArtRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class GerichtArtController
{
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('user_index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    //MeinVerein mit den Mannschaften anzeigen
    public function meineGerichte(){
        $userRepository = new UserRepository();
        $gerichtArtRepository = new GerichtArtRepository();
        $view = new View('gericht_meineGerichteArten');
        $view->title = 'Meine Gerichte';
        $view->heading = 'Meine Gerichte';
        $view->heading2 ="Art Gericht";
        if(isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];
            $view->user = $userRepository->readById($uid);
            $view->gerichte = $gerichtArtRepository->readAllGerichteArt($uid);
        }
        $view->display();
    }

    public function doCreate()
    {
        if ($_POST['send']) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
