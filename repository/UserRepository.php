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
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($vorname,$nachname,$plz,$ort,$telefonnumer,$email, $password,$admin)
    {
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);

        $query = "INSERT INTO $this->tableName (vorname, nachname, mail, passwort,plz,ort,telefonnummer,admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssissi', $vorname, $nachname, $email,$password,$plz,$ort,$telefonnumer,$admin);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    public function update($uid,$vereinsname,$kontaktperson){
        $query = "UPDATE $this->tableName SET vereinsname = ?, kontaktperson = ? WHERE id=? ;";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi',$vereinsname,$kontaktperson,$uid);
        $statement->execute();
        header('Location: /user/meinVerein');
    }
    public function login($loginemail,$loginpassword){
        $query = "SELECT * FROM $this->tableName WHERE mail = ?";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('s',$loginemail);
            $statement->execute();
            $result = $statement->get_result();
            $user = $result->fetch_object();

            // Verify user password and set $_SESSION
            if (password_verify($loginpassword, $user->passwort)){
                $_SESSION['user_id'] = $user->id;
                return $user->id;
            } else {

                return -1;

            }
    }
}

