<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class GerichtRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'gericht';

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

    public function readAllGerichte($aid)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE aid=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $aid);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function create($gerichtname,$beschreibung,$preis,$bildpfad,$gaid)
    {
        $query = "INSERT INTO $this->tableName (gerichtname,beschreibung,preis,bildpfad,aid) VALUES (?, ?, ?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssi', $gerichtname,$beschreibung,$preis,$bildpfad,$gaid);
        $statement->execute();
    }

    public function update($gid,$gerichtname,$beschreibung,$preis,$bildpfad){
        $query = "UPDATE $this->tableName SET gerichtname = ?, beschreibung = ?,preis = ?,bildpfad = ? WHERE id=? ;";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssi',$gerichtname,$beschreibung,$preis,$bildpfad,$gid);
        $statement->execute();
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

