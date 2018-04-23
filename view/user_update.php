<?php if(!isset($_SESSION['user_id'])): ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php else: ?>

<div class="content">
    <form action="/user/doUpdate" method="post">

        <div class="titel"><?= $heading ?></div>

        <label for="kontaktperson" class="label">Kontaktperson</label>
        <input id="kontaktperson" name="kontaktperson" type="text" value="<?= htmlspecialchars($verein->kontaktperson); ?>" class="textForm" required/>

        <label for="vereinsname" class="label">Vereinsname</label>
        <input id="vereinsname" name="vereinsname" type="text"  value="<?= htmlspecialchars($verein->vereinsname); ?>" class="textForm" required/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">

    </form>
</div>

<?php endif ?>