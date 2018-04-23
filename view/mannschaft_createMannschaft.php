<?php
if(isset($_SESSION['user_id'])): ?>

<div class="content">
    <form action="/mannschaft/doCreateMannschaft" method="post">
        <span class="titel"><?= $heading ?></span><br><br>

        <label for="mannschaftsname" class="label">Mannschaftsname</label>
        <input id="mannschaftsname" name="mannschaftsname" type="text" class="textForm" required/>

        <label for="coach" class="label">Coach</label>
        <input id="coach" name="coach" type="text" class="textForm" required/>

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
