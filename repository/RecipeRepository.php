<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class RecipeRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'recipes';

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
    //Liest alle Recipe welche zum ausgewählten Land gehören
    public function readrecipes($land) {
        $query = "SELECT * FROM $this->tableName WHERE country_id=(SELECT country_id FROM countries WHERE country like '$land%')";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        //$statement->bind_param('s', $land);
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

    //Liest das Recipe welches ausgewählt wurde
    public function readRecipe($rid) {
        $query = "SELECT * FROM $this->tableName WHERE recipe_id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $rid);
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
    //Liest alle Zutaten welche zum ausgewählten Recipe gehören
    public function readIngredients($recipe) {
        $query = "SELECT i.ingredient, ir.quantity FROM ingredients AS i LEFT JOIN ingredients_recipies AS ir ON i.ingredient_id=ir.ingredient_id LEFT JOIN recipes AS r ON r.recipe_id = ir.recipe_id WHERE r.recipe=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $recipe);
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

    public function addRecipe() {

    }
}
