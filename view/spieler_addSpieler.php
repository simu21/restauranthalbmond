<?php
if(isset($_SESSION['user_id'])):?>

<div class="content">
    <form action="/spieler/doAddSpieler" method="post" enctype="multipart/form-data">

        <span class="titel"><?= $heading ?></span>
        <br><br>

        <label for="vorname" class="label">Vorname</label>
        <input id="vorname" name="vorname" type="text" class="textForm" required/>

        <label for="nachname" class="label">Nachname</label>
        <input id="nachname" name="nachname" type="text" class="textForm" required/>

        <label for="position" class="label">Position</label>
        <input id="position" name="position" type="text" class="textForm" required/>

        <label for="bildpfad" class="label">Bildpfad</label>
        <input type="file" name="fileToUpload" id="fileToUpload"class="textForm" required/>


        <input type="hidden" name="m_id" value="<?= $m_id ?>">
        <input id="send" name="send" value="Spieler hinzufügen" type="submit" class="submitForm">

    </form>
</div>

<?php else: ?>
<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>
<?php endif ?>