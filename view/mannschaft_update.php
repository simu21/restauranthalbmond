<?php
if(isset($_SESSION['user_id'])):?>

<div class="content">
    <form action="/mannschaft/doUpdate?id=<?= $m_id ?>" method="post">
        <div class="titel"><?= $heading ?></div>

        <label for="mannschaftsname" class="label">Mannschaftsname</label>
        <input id="mannschaftsname" name="mannschaftsname" type="text" value="<?= htmlspecialchars($mannschaft->mannschaftsname); ?>" class="textForm" required/>

        <label for="coach" class="label">Coach</label>
        <input id="coach" name="coach" type="text"  value="<?= htmlspecialchars($mannschaft->coach); ?>" class="textForm" required/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">
    </form>
</div>

<?php else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
