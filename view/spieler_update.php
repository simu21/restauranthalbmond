<?php
if(isset($_SESSION['user_id'])):

if(!isset($_GET['sid']) && !isset($_GET['id'])): ?>
<div class="content">
    <div class="u_titel">Link nicht verfügbar!</div>
</div>

<?php else: ?>

<div class="content">
    <form action="/spieler/doUpdate?sid=<?= $sid ?>&id=<?= $m_id ?>" method="post" enctype="multipart/form-data">
        <div class="titel"><?= $heading ?></div>


        <label for="vorname" class="label">Vorname</label>
        <input id="vorname" name="vorname" type="text" value="<?= $spieler->vorname ?>" class="textForm" required/>

        <label for="nachname" class="label">Nachname</label>
        <input id="nachname" name="nachname" type="text"  value="<?= $spieler->nachname ?>" class="textForm" required/>

        <label for="sposition" class="label">Position</label>
        <input id="sposition" name="sposition" type="text" value="<?= $spieler->sposition ?>" class="textForm" required/>

        <label for="fileToUpload" class="label">Bildpfad</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="textForm"/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">


    </form>
</div>

<?php endif; else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
