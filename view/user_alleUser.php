<div class="content">
    <span class="titel"><?= $heading?></span>
</div>

<?php if (empty($users)): ?>
    <div class="content">
        <h2 class="u_titel">Hoopla!Es sind noch keine Users vorhanden!</h2>
    </div>
<?php else: ?>
    <?php foreach ($users as $u): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class = "u_titel">Vor-& Nachname: <?= $u->vorname. " "  .$u->nachname;?></h2><br>
                <h3 class = "u_titel"> <?= " " .$u->telefonnummer;?></h3><br>
                <h3 class = "u_titel"> <?= " " .$u->mail;?></h3><br>
                <a title="spieler" href="/user/delete?id=<?= $u->id ?>"><div class="submitForm"><i class="fas fa-trash"></i> Löschen</div></a>
            </div>

            <div style="clear: both;"></div>
        </div>
    <?php endforeach ?>
<?php endif ?>


