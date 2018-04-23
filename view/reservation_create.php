<div class="content">

    <?php
    if(isset($_SESSION['user_id'])){
        echo " 
        <form action=\"/reservation/docreate\" method=\"post\">

        <span class=\"titel\"><?= $heading ?></span>
        <br><br>

        <label for=\"date\" class=\"label\">Datum</label>
        <input id=\"date\" name=\"date\" type=\"date\" class=\"textForm\" required/>

        <label for=\"time\" class=\"label\">Zeit</label>
        <input id=\"time\" name=\"time\" type=\"time\" class=\"textForm\" required/>

        <label for=\"personen\" class=\"label\">Anzahl Personen</label>
        <input id=\"personen\" name=\"personen\" type=\"number\" class=\"textForm\" required/>

        <input id=\"send\" name=\"send\" value=\"Registrieren\" type=\"submit\" class=\"submitForm\">
    </form>";
    }else{
        header('Location: /user/create');
    }
    ?>


