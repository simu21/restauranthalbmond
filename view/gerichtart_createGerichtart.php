<?php
if(isset($_SESSION['user_id'])): ?>

<div class="content">
    <form action="/gerichtart/doCreate" method="post">
        <span class="titel"><?= $heading ?></span><br><br>

        <label for="gerichtart" class="label">Gerichtart</label>
        <input id="gerichtart" name="gerichtart" type="text" class="textForm" required/>

        <label for="gerichtartbeschreibung" class="label">Beschreibung</label>
        <input id="gerichtartbeschreibung" name="gerichtartbeschreibung" type="text" class="textForm" required/>

        <input id="send" name="send" value="Erstellen" type="submit" class="submitForm">

        <div class="fehlermeldung">
            <p><?php $fehlermeldung?></p>
        </div>
    </form>

</div>

<?php else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
