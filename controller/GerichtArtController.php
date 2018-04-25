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
        header('Location: /user');
    }

    public function createGerichtart(){
        Security::checkAdmin();
        $userRepository = new UserRepository();
        $view = new View('gerichtArt_createGerichtArt');
        $view->title = 'Gericht hinzufügen';
        $view->heading = 'Gericht hinzufügen';
        if(isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];
            $view->user = $userRepository->readById($uid);
            $view->display();
        }
    }

    public function meineGerichtarten(){
        Security::checkAdmin();
        $userRepository = new UserRepository();
        $gerichtArtRepository = new GerichtArtRepository();
        $view = new View('gerichtart_meineGerichteArten');
        $view->title = 'Meine Gerichte';
        $view->heading = 'Meine Gerichte';
        $view->heading2 ="Gerichtearten";
        if(isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];
            $view->user = $userRepository->readById($uid);
            $view->gerichteArten = $gerichtArtRepository->readAllGerichteArt($uid);
        }
        $view->display();
    }

    public function doCreate()
    {
        Security::checkAdmin();
        if ($_POST['send']) {
            $gerichtart = $_POST['gerichtart'];
            $beschreibung = $_POST['gerichtartbeschreibung'];
            $gerichtArtRepository = new GerichtArtRepository();
            if(isset($_SESSION['user_id'])) {
                $uid = $_SESSION['user_id'];
                $gerichtArtRepository->create($gerichtart, $beschreibung, $uid);
            }

        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /gerichtart/meineGerichtarten');
    }
    public function update(){
        Security::checkAdmin();
        $gerichtartRepository = new GerichtArtRepository();
        $userRepository = new UserRepository();
        $uid = $_SESSION['user_id'];
        $view = new View('gerichtart_update');
        $view->title = 'Gerichtart bearbeiten';
        $view->heading = 'Gerichtart bearbeiten';
        if(isset($_GET['id'])) {
            //gaid = gerichtartID//
            $gaid = $_GET['id'];
            $view->gaid = $gaid;
            $view->user = $userRepository->readById($uid);
            $view->gerichtart = $gerichtartRepository->readById($gaid);
        }
        $view->display();
    }

    public function doUpdate(){
        Security::checkAdmin();
        if ($_POST['send']) {
            $gaid = $_GET['id'];
            $gerichtart = $_POST['gerichtart'];
            $beschreibung = $_POST['gerichtartbeschreibung'];
            $gerichtartRepository = new GerichtArtRepository();
            $gerichtartRepository->update($gaid, $gerichtart, $beschreibung);
        }
        header('Location: /gerichtart/meinegerichtarten');
    }

    public function delete()
    {
        Security::checkAdmin();
        $gerichtartRepository = new GerichtArtRepository();
        $gerichtartRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /gerichtart/meinegerichtarten');
    }
}
