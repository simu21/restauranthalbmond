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
        header('Location: /gerichtart/meineGerichtarten');
    }

    public function createGerichtart(){

        $view = new View('gerichtArt_createGerichtArt');
        $view->title = 'Gericht hinzufügen';
        $view->heading = 'Gericht hinzufügen';
        $view->display();
    }

    public function meineGerichtarten(){
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
        $gerichtartRepository = new GerichtArtRepository();
        $view = new View('gerichtart_update');
        $view->title = 'Gerichtart bearbeiten';
        $view->heading = 'Gerichtart bearbeiten';
        if(isset($_GET['id'])) {
            //gaid = gerichtartID//
            $gaid = $_GET['id'];
            $view->gaid = $gaid;
            $view->gerichtart = $gerichtartRepository->readById($gaid);
        }
        $view->display();
    }

    public function doUpdate(){
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
        $gerichtartRepository = new GerichtArtRepository();
        $gerichtartRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /gerichtart/meinegerichtarten');
    }
}
