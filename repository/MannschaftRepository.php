
<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class MannschaftRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'mannschaft';

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
    public function create($mannschaftsname,$coach,$uid)
    {

        $query = "INSERT INTO $this->tableName (mannschaftsname, coach,u_id) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi', $mannschaftsname, $coach,$uid);
        $statement->execute();
        header('Location: /user/meinVerein');
    }
    public function update($m_id,$mannschaftsname,$coach){
        $query = "UPDATE $this->tableName SET mannschaftsname = ?, coach = ? WHERE id=? ;";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi',$mannschaftsname,$coach,$m_id);
        $statement->execute();
        header('Location: /user/meinVerein');
    }
    public function readAllMannschaft($id)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE u_id=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

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

}
