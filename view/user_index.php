<?php
if(isset($_SESSION['user_id'])):
else: ?>

<div class="content">
    <span class="titel"><?= $heading ?></span>
</div>

<?php if (empty($users)): ?>
    <div class="content">
        <h2 class="u_titel">Hoopla!Es sind noch keine Gerichte vorhanden!</h2>
    </div>
<?php else: ?>
    <?php foreach ($users as $user): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class = "u_titel">Verein: <?= $user->vereinsname;?></h2><br>
                <h3 class = "u_titel">Kontaktperson: <?= " " .$user->kontaktperson;?></h3><br>
                <h4 class="u_titel"> Email: <a class="link" href="mailto:<?= $user->mail;?>"><?= $user->mail;?></a></h4>
            </div>

            <div style="clear: both;"></div>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php endif ?>

