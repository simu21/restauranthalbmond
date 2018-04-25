<?php

require_once '../repository/ReservationRepository.php';
require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class ReservationController
{
    public function index()
    {
        Security::checkLogin();
        $view = new View('reservation_index');
        $view->title = 'Reservation';
        $view->heading = 'Reservation';
        $view->display();
    }
    public function alleReservationen(){
        Security::checkAdmin();
        $reservationRepository = new ReservationRepository();
        $view = new View('reservation_all');
        $view->title = "Alle Reservationen";
        $view->heading = "Alle Reservationen";
        $view->reservationen = $reservationRepository->readAll();
        $view->display();
    }
    public function meineReservationen(){
        Security::checkLogin();
        $reservationRepository = new ReservationRepository();
        $userRepository = new UserRepository();
        $view = new View('reservation_index');
        $view->title = 'Meine Reservationen';
        $view->heading = 'Meine Reservationen';
        if(isset($_SESSION['user_id'])){
            $uid = $_SESSION['user_id'];
            $user = $userRepository->readById($uid);
        }
        $view->reservationen = $reservationRepository->readAllReservationen($uid);
        $view->user = $userRepository->readById($uid);

        $view->display();

    }
    public function create()
    {
        Security::checkLogin();
        $userRepository = new UserRepository();
        $view = new View('reservation_create');
        $view->title = 'Reservation';
        $view->heading = 'Reservation';
        if(isset($_SESSION['user_id'])){
            $uid = $_SESSION['user_id'];
            $view->user = $userRepository->readById($uid);
        }


        $view->display();
    }

    public function thanks()
    {
        $view = new View('reservation_thanks');
        $view->title = 'Reservation';
        $view->heading = 'Reservation';
        $view->display();
    }

    public function doCreate()
    {
        $to = "simonecrupi21@gmail.com"; // this is your Email address
        $from = "simonecrupi21@gmail.com"; // this is the sender's Email address
        $first_name = $_SESSION['name'];
        $last_name = $_SESSION['nachname'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $personen = $_POST['personen'];
        $subject = "Reservation";
        $subject2 = "Ihre Reservation";
        $message = $first_name . " " . $last_name . " hat für " . $personen . " personen am Tish " . $_SESSION['table'] . " reserviert. Datum: " . $date . " Zeit: " . $time . " Bemerkungen: " . $_POST['message'];
        $message2 = "Sie haben für " . $personen . " personen am Tish " . $_SESSION['table'] . " reserviert. Datum: " . $date . " Zeit: " . $time . " Bemerkungen: " . $_POST['message'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to, $subject, $message, $headers);
        mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
        header('Location: thanks');
        Security::checkLogin();
        if(isset($_POST['send'])) {
            if (isset($_SESSION['user_id'])) {
                $uid = $_SESSION['user_id'];
                $datum = $_POST['date'];
                $zeit = $_POST['time'];
                $personen = $_POST['personen'];

                $reservationRepository = new ReservationRepository();
                $reservationRepository->create($uid, $datum, $zeit, $personen);
            }

            // $to = "simonecrupi21@gmail.com"; // this is your Email address
            // $from = $_SESSION['email']; // this is the sender's Email address
            // $first_name = $_SESSION['name'];
            // $last_name = $_SESSION['nachname'];
            // $date = $_POST['date'];
            // $time = $_POST['time'];
            //   //  $personen = $_POST['personen'];
            //  $subject = "Reservation";
            //  $subject2 = "Ihre Reservation";
            //  $message = $first_name . " " . $last_name . " hat für " .$personen. " personen am Tish " .$_SESSION['table']. " reserviert. Datum: " .$date. " Zeit: ".$time." Bemerkungen: " .$_POST['message'];
            //  $message2 = "Sie haben für " .$personen. " personen am Tish " .$_SESSION['table']. " reserviert. Datum: " .$date. " Zeit: ".$time." Bemerkungen: " .$_POST['message'];

            // $headers = "From:" . $from;
            // $headers2 = "From:" . $to;
            // mail($to,$subject,$message,$headers);
            //  mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
            header('Location: /reservation/meineReservationen');
            //tish auf reserviert setzen
        }
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
