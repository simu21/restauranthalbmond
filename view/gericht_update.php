<?php
if(isset($_SESSION['user_id'])):

if(!isset($_GET['gid']) && !isset($_GET['aid'])): ?>
<div class="content">
    <div class="u_titel">Link nicht verfügbar!</div>
</div>

<?php else: ?>
<div class="content">
    <form action="/gericht/doUpdate?gid=<?= $gid ?>&aid=<?= $aid ?>" method="post" enctype="multipart/form-data">
        <div class="titel"><?= $heading ?></div>


        <label for="gerichtname" class="label">Gerichtname</label>
        <input id="gerichtname" name="gerichtname" type="text" value="<?= $gericht->gerichtname ?>" class="textForm" required/>

        <label for="beschreibung" class="label">Beschreibung</label>
        <input id="beschreibung" name="beschreibung" type="text"  value="<?= $gericht->beschreibung ?>" class="textForm" required/>

        <label for="preis" class="label">Preis</label>
        <input id="preis" name="preis" type="text" value="<?= $gericht->preis ?>" class="textForm" required/>

        <label for="fileToUpload" value="<?= $gericht->bildpfad ?>" class="label">Bildpfad</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="textForm"/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">


    </form>
</div>

<?php endif; else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
