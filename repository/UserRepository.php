<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'users';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *lkjljkl
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function readallUsers() {
        $query = "SELECT * FROM $this->tableName";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $statement->close();
        return $rows;
    }

    public function create($username, $firstname, $lastname, $email, $password)
    {
        $query = "INSERT INTO $this->tableName (username, firstname, lastname, email, password) VALUES (?,?,?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssss', $username, $firstname, $lastname, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $statement->close();
        header('Location: /user');
    }

    public function deleteById($userid)
    {
        $query = "DELETE FROM users WHERE user_id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userid);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $statement->close();

        header('Location: /user/logout');
    }

    public function login($username, $password)
    {
        $query = "SELECT username, user_id, password FROM users WHERE username=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();

        $userResult = $statement->get_result();
        if (!$userResult) {
            $_SESSION['loginerror'] = true;
            $_SESSION['message'] = 'incorrect username';
            header('Location:'.$_SERVER['HTTP_REFERER']);

        }
        if ($userResult) {

            $user = $userResult->fetch_object();

            if (password_verify($password, $user->password)) {
                $_SESSION['loginsuccess'] = true;
                $_SESSION['loginmiss'] = false;
                $_SESSION['loginerror'] = false;
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $user->user_id;
                $_SESSION['message'] = 'Youre logged in!';
                header('Location: /user/profile');
            } else {
                $_SESSION['loginerror'] = true;
                $_SESSION['message'] = 'username or password are wrong';
                header('Location:'.$_SERVER['HTTP_REFERER']);
            }

        }
        $statement->close();

    }

    public function userSignedIn() {
        $query = "SELECT username, firstname, lastname, email, user_picture FROM users WHERE user_id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $_SESSION['userid']);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $statement->close();
        return $rows;
    }

    public function uploadPicture($path, $user) {
        $query="UPDATE users SET user_picture=? WHERE username=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $path, $user);
        $statement->execute();
        $statement->close();
    }

    public function update($userid, $username, $firstname, $lastname, $email, $password)
    {
        $query = "UPDATE users SET username=? ,firstname=?, lastname=?, email=?, password=? WHERE user_id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssss', $username, $firstname, $lastname, $email, $password, $userid);
        $statement->execute();
        header('Location: /user/profile');
    }
}
