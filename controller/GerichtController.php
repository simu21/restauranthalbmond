<?php

require_once '../repository/UserRepository.php';
require_once '../repository/GerichtRepository.php';
require_once '../repository/GerichtArtRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class GerichtController
{

    public function index()
    {
        header('Location: /gerichtart/meineGerichtarten');
    }

    public function anzeigen(){
        Security::checkAdmin();
        $gerichtRepository = new GerichtRepository();
        $gerichartRepository = new GerichtArtRepository();
        $userRepository = new UserRepository();
        $view = new View('gericht_index');
        $view->heading = 'Gerichte';
        $view->title = 'Gerichte';
        if(isset($_SESSION['user_id'])) {
            if(isset($_GET['id'])) {
                $gaid = $_GET['id'];
                $uid = $_SESSION['user_id'];
                $view->user = $userRepository->readById($uid);
                $view->gerichtarten = $gerichartRepository->readById($gaid);
                $view->gaid= $gaid;
                $view->gerichte = $gerichtRepository->readAllGerichte($gaid);
            }
        }
        $view->display();
    }

    public function addGericht(){
        Security::checkAdmin();
        $userRepository = new UserRepository();
        $view = new View('gericht_addGericht');
        if(isset($_GET['id'])) {
            $gaid = $_GET['id'];
            $view->gaid = $gaid;
        }
        $uid = $_SESSION['user_id'];
        $view->title = 'Gericht hinzufügen';
        $view->heading = 'Gericht hinzufügen';
        $view->user = $userRepository->readById($uid);
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


    public function delete(){
        $aid = $_GET['aid'];
        print_r($aid);
        $gerichtRepository = new GerichtRepository();
        $gerichtRepository->deleteById($_GET['gid']);
        header('Location: /gericht/anzeigen?id='.$aid);

    }
    public function update(){
        Security::checkAdmin();
        $userRepository = new UserRepository();
        $uid = $_SESSION['user_id'];
        $gerichtRepository = new GerichtRepository();
        $view = new View('gericht_update');
        $view->title = 'Gericht bearbeiten';
        $view->heading = 'Gericht bearbeiten';
        if(isset($_GET['gid']) && isset($_GET['aid'])) {
            $gid = $_GET['gid'];
            $aid = $_GET['aid'];
            $view->gid = $gid;
            $view->aid = $aid;
            $view->user = $userRepository->readById($uid);
            $view->gericht = $gerichtRepository->readById($gid);

        }
        $view->display();
    }
        public function doUpdate(){
            if ($_POST['send']) {
                $gid = $_GET['gid'];
                $aid = $_GET['aid'];
                $gerichtname = $_POST['gerichtname'];
                $beschreibung = $_POST['beschreibung'];
                $preis = $_POST['preis'];
                $gerichtRepository = new GerichtRepository();

                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
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
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $gerichtRepository->update($gid,$gerichtname,$beschreibung,$preis,$target_file);
                header('Location: /gericht/anzeigen?id='.$aid);
            }
        }
}
