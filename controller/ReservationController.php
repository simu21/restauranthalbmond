<?php

require_once '../repository/ReservationRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class ReservationController
{
    public function index()
    {
        $view = new View('reservation_index');
        $view->title = 'Reservation';
        $view->heading = 'Reservation';
        $view->display();
    }

    public function create()
    {
        $view = new View('reservation_create');
        $view->title = 'Reservation';
        $view->heading = 'Reservation';
        $view->display();
    }

    public function doCreate()
    {
        if(isset($_POST['submit'])){
            $to = "simonecrupi21@gmail.com"; // this is your Email address
            $from = $_SESSION['email']; // this is the sender's Email address
            $first_name = $_SESSION['name'];
            $last_name = $_SESSION['nachname'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $personen = $_POST['personen'];
            $subject = "Reservation";
            $subject2 = "Ihre Reservation";
            $message = $first_name . " " . $last_name . " hat für " .$personen. " personen am Tish " .$_SESSION['table']. " reserviert. Datum: " .$date. " Zeit: ".$time." Bemerkungen: " .$_POST['message'];
            $message2 = "Sie haben für " .$personen. " personen am Tish " .$_SESSION['table']. " reserviert. Datum: " .$date. " Zeit: ".$time." Bemerkungen: " .$_POST['message'];

            $headers = "From:" . $from;
            $headers2 = "From:" . $to;
            mail($to,$subject,$message,$headers);
            mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
            header('Location: reservation_thanks');
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
