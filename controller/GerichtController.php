<?php

require_once '../repository/UserRepository.php';
require_once '../repository/GerichtRepository.php';
require_once '../repository/GerichtArtRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class GerichtController
{
    public function anzeigen(){
        $gerichtRepository = new GerichtRepository();
        $gerichartRepository = new GerichtArtRepository();
        $view = new View('gericht_index');
        $view->heading = 'Gerichte';
        $view->title = 'Gerichte';
        if(isset($_SESSION['user_id'])) {
            if(isset($_GET['id'])) {
                $gaid = $_GET['id'];
                $view->gerichtarten = $gerichartRepository->readById($gaid);
                $view->gaid= $gaid;
                $view->gerichte = $gerichtRepository->readAllGerichte($gaid);
            }
        }
        $view->display();
    }

    public function addGericht(){
        $view = new View('gericht_addGericht');
        if(isset($_GET['id'])) {
            $gaid = $_GET['id'];
            $view->gaid = $gaid;
        }
        $view->title = 'Gericht hinzufügen';
        $view->heading = 'Gericht hinzufügen';
        $view->display();
    }
    public function doAddGericht(){

        $gaid = $_POST['m_id'];
        $gerichtname = $_POST['gerichtname'];
        $beschreibung = $_POST['gerichtbeschreibung'];
        $preis = $_POST['preis'];


        // Spielerbild in Ordner /public/images/ hochladen
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Schauen ob Datei auch ein BIld ist
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Schauen ob Bild schon existiert
        if (file_exists($target_file)) {
            echo "Bild existiert bereits.";
            $uploadOk = 0;
        }
        // Bildgrösse überprüfen (500KB)
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // JPG, PNG, JPEG und GIF erlauben
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Falls error -> $uploadOk = 0
        if ($uploadOk == 0) {
            echo "Datei wurde nicht hochgeladen.";
            // Falls alles okay, Bild hochladen
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $gerichtRepository = new GerichtRepository();
        $gerichtRepository->create($gerichtname,$beschreibung,$preis,$target_file,$gaid);

        // Anfrage an die URI /user weiterleiten (HTTP 302)

        header('Location: /gericht/anzeigen?id='.$gaid);
    }

    public function index()
    {
        header('Location: /gerichtart/meineGerichtarten');
    }


    public function delete(){
        $aid = $_GET['aid'];
        print_r($aid);
        $gerichtRepository = new GerichtRepository();
        $gerichtRepository->deleteById($_GET['gid']);
        header('Location: /gericht/anzeigen?id='.$aid);

    }

}
