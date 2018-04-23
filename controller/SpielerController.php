<?php

require_once '../repository/SpielerRepository.php';
require_once '../repository/MannschaftRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class SpielerController
{
    public function anzeigen(){
        $spielerRepository = new SpielerRepository();
        $mannschaftsRepository = new MannschaftRepository();
        $view = new View('spieler_index');
        $view->heading = 'Spieler';
        $view->title = 'Spieler';
        if(isset($_SESSION['user_id'])) {
            if(isset($_GET['id'])) {
                $m_id = $_GET['id'];
                $view->mannschaft = $mannschaftsRepository->readById($m_id);
                $view->m_id = $m_id;
                $view->spieler = $spielerRepository->readAllSpieler($m_id);
            }
        }
        $view->display();
    }

    // Spieler-Erstellen-Formularfeld anzeigen
    public function addSpieler(){
        $view = new View('spieler_addSpieler');
        if(isset($_GET['id'])) {
            $m_id = $_GET['id'];
            $view->m_id = $m_id;
        }
        $view->title = 'Spieler hinzufügen';
        $view->heading = 'Spieler hinzufügen';
        $view->display();
    }

    // Spieler in DB erstellen + Bild hochladen
    public function doAddSpieler(){

        $m_id = $_POST['m_id'];
        $nachname = $_POST['nachname'];
        $vorname = $_POST['vorname'];
        $position = $_POST['position'];


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

        $spielerRepository = new SpielerRepository();
        $spielerRepository->create($vorname, $nachname,$position, $target_file,$m_id);

        // Anfrage an die URI /user weiterleiten (HTTP 302)

        header('Location: /spieler/anzeigen?id='.$m_id);

    }

    // Spieler löschen in DB
    public function delete(){
        $m_id = $_GET['id'];
        print_r($m_id);
        $spielerRepository = new SpielerRepository();
        $spielerRepository->deleteById($_GET['sid']);
        header('Location: /spieler/anzeigen?id='.$m_id);

    }

    // Spieler Update-Seite (Formularfeld) anzeigen
    public function update(){
        $spielerRepository = new SpielerRepository();
        $view = new View('spieler_update');
        $view->title = 'Spieler bearbeiten';
        $view->heading = 'Spieler bearbeiten';
        if(isset($_GET['sid']) && isset($_GET['id'])) {
            $sid = $_GET['sid'];
            $m_id = $_GET['id'];
            $view->sid = $sid;
            $view->m_id = $m_id;
            $view->spieler = $spielerRepository->readById($sid);
        }
        $view->display();
    }

    // Spieler update in DB
    public function doUpdate(){
        if ($_POST['send']) {
            $m_id = $_GET['id'];
            $sid = $_GET['sid'];
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $postition = $_POST['sposition'];
            $spielerRepository = new SpielerRepository();

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

            $spielerRepository->update($sid,$vorname,$nachname,$postition,$target_file);
            header('Location: /spieler/anzeigen?id='.$m_id);
        }
    }

    public function index() {
        header('Location: /spieler/anzeigen');
    }
}