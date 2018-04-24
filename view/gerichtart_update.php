<?php
if(isset($_SESSION['user_id'])):?>

<div class="content">
    <form action="/gerichtart/doUpdate?id=<?= $gaid ?>" method="post">
        <div class="titel"><?= $heading ?></div>

        <label for="gerichtart" class="label">Gerichtart</label>
        <input id="gerichtart" name="gerichtart" type="text" value="<?= htmlspecialchars($gerichtart->gerichtartname); ?>" class="textForm" required/>

        <label for="gerichtartbeschreibung" class="label">Beschreibung</label>
        <input id="gerichtartbeschreibung" name="gerichtartbeschreibung" type="text"  value="<?= htmlspecialchars($gerichtart->beschreibung); ?>" class="textForm" required/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">
    </form>
</div>

<?php else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
