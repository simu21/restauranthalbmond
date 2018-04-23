<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('users_index');
        $view->title = 'Users';
        $view->users = $userRepository->readallUsers();
        $view->heading = '';
        $view->display();
    }

    public function register()
    {
        $view = new View('user_register');
        $view->title = 'Register';
        $view->heading = '';
        $view->display();
    }

    public function profile()
    {
        $userRepository = new UserRepository();
        $view = new View('user_profile');
        $view->title = 'Profile';
        $view->heading = '';
        $view->userdata = $userRepository->userSignedIn();
        $view->display();
    }

    public function doRegister()
    { if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $passwort = $_POST['password'];
        $passwort = password_hash($passwort, PASSWORD_DEFAULT);
        $userRepository = new UserRepository();
        $userRepository->create($username, $firstname, $lastname, $email, $passwort);
        } else {
        header('Location: /user/register');
        }

    }

    public function logout() {
        unset($_SESSION);
        session_destroy();
        header('Location: /user/register');
    }

    public function delete(){
        $userRepository = new UserRepository();
        $userRepository->deleteById($_SESSION['userid']);
    }

    public function doUpdate(){
        if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $userid = $_SESSION['userid'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $passwort = $_POST['password'];
            $password = password_hash($passwort, PASSWORD_DEFAULT);
            $userRepository = new UserRepository();
            $userRepository->update($userid, $username, $firstname, $lastname, $email, $password);
        } else {
            header('Location: /user/update');
        }

    }

    public function update()
    {   $view = new View('user_update');
        $view->title = 'Profile';
        $view->heading = '';
        $view->display();
    }
    public function doLogin(){

        if (isset($_POST['username']) && isset($_POST['password'])) {
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $userRepository = new UserRepository();
                $userRepository->login($username, $password);

            } else {
                $_SESSION['message'] = 'username or password are are wrong';
                $_SESSION['loginerror'] = true;
                header('Location:'.$_SERVER['HTTP_REFERER']);
            }
        } else {
            $_SESSION['message'] = 'username or password are are wrong';
            $_SESSION['loginerror'] = true;
            header('Location:'.$_SERVER['HTTP_REFERER']);
        }
    }

    public function upload() {
        $userRepository = new UserRepository();
        $upload_folder = '/images/user_images/'; //Das Upload-Verzeichnis
        $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));



        //Überprüfung der Dateiendung
        $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
        if(!in_array($extension, $allowed_extensions)) {
            header('Location: profile?uploaderror=type');
            die();
        }

        //Überprüfung der Dateigröße
        $max_size = 500*1024; //500 KB
        if($_FILES['datei']['size'] > $max_size) {
            header('Location: profile?uploaderror=size');
            die();
        }

        //Pfad zum Upload
        $new_path = $upload_folder.$filename.'.'.$extension;

        //Neuer Dateiname falls die Datei bereits existiert
        if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
            $id = 1;
            do {
                $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
                $id++;
            } while(file_exists($new_path));
        }
        $user = $_SESSION['username'];
        //Datei auf dem Server speichern und Datenbank eintrag machen
        move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
        $userRepository->uploadPicture($new_path, $user);
        header('Location: profile');
    }
}
