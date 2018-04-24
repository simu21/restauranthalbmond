<div class="content">

    <?php
    $dt = new DateTime();
    $dtt = new DateTime();
    //if(isset($_SESSION['user_id'])){
        echo " 
        <form action=\"/reservation/doCreate\" method=\"post\">

        <span class=\"titel\"><?= $heading ?></span>
        <br><br>

        <label for=\"date\" class=\"label\">Datum</label>
        <input min='".$dt->format('Y-m-d')."' id=\"date\" name=\"date\" type=\"date\" class=\"textForm\" required/>

        <label for=\"time\" class=\"label\">Zeit</label>
        <input min='18:00' max='24:00' id=\"time\" value='".$dt->format('H:i')."' name=\"time\" type=\"time\" class=\"textForm\" required/>

        <label for=\"personen\" class=\"label\">Anzahl Personen</label>
        <input id=\"personen\" name=\"personen\" type=\"number\" class=\"textForm\" required/>

        <input id=\"send\" name=\"send\" value=\"Reservieren\" type=\"submit\" class=\"submitForm\">
    </form>";
    //}else{
    //    header('Location: /user/create');
    //}
?>
