<div class="content">

    <?php
    $dt = new DateTime();
    if(isset($_SESSION['user_id'])){
        if($_GET['tid'] == 1){
            $s1 = "selected";
            $s2 = "";
            $s3 = "";
        } elseif($_GET['tid'] == 2){
            $s1 = "";
            $s2 = "selected";
            $s3 = "";
        } else {
            $s1 = "";
            $s2 = "";
            $s3 = "selected";
        }
        echo " 
        <form action=\"/reservation/doCreate\" method=\"post\">

        <span class=\"titel\"><?= $heading ?></span>
        <br><br>

        <label for=\"date\" class=\"label\">Datum</label>
        <input min='".$dt->format('Y-m-d')."' id=\"date\" name=\"date\" type=\"date\" class=\"textForm\" required/>

        <label for=\"time\" class=\"label\">Zeit</label>
        <input min='11:00' max='22:00' id=\"time\" value='".$dt->format('H:i')."' name=\"time\" type=\"time\" class=\"textForm\" required/>

        <label for=\"personen\" class=\"label\">Anzahl Personen</label>
        <input min='1' id=\"personen\" name=\"personen\" type=\"number\" class=\"textForm\" required/>
        
        <label for=\"ort\" class=\"label\">Sitzort </label>
        <select name=\"ort\" class='textForm''>
            <option ".$s1." value=\"Terasse\">Terasse</option>
            <option ".$s2." value=\"Wintergarten\">Wintergarten</option>
            <option ".$s3." value=\"Saal\">Saal</option>
      </select>

        <input id=\"send\" name=\"submit\" value=\"Reservieren\" type=\"submit\" class=\"submitForm\">
    </form>";
    }else{
        header('Location: /user/create');
    }
?>
