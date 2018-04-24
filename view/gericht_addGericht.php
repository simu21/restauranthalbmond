<?php
if(isset($_SESSION['user_id'])):?>

<div class="content">
    <form action="/gericht/doAddGericht" method="post" enctype="multipart/form-data">

        <span class="titel"><?= $heading ?></span>
        <br><br>

        <label for="gerichtname" class="label">Gerichtname</label>
        <input id="gerichtname" name="gerichtname" type="text" class="textForm" required/>

        <label for="gerichtbeschreibung" class="label">Gerichtbeschreibung</label>
        <input id="gerichtbeschreibung" name="gerichtbeschreibung" type="text" class="textForm" required/>

        <label for="preis" class="label">Preis</label>
        <input id="preis" name="preis" type="text" class="textForm" required/>

        <label for="bildpfad" class="label">Bildpfad</label>
        <input type="file" name="fileToUpload" id="fileToUpload"class="textForm" required/>


        <input type="hidden" name="m_id" value="<?= $gaid ?>">
        <input id="send" name="send" value="Gericht hinzufügen" type="submit" class="submitForm">

    </form>
</div>

<?php else: ?>
<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>
<?php endif ?>