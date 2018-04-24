<?php if(isset($_SESSION['user_id'])):
if(!isset($_GET['id'])): ?>
    <div class="content">
        <h3 class="u_titel">Diese Gerichtart hat noch keine Gerichte!</h3>
    </div>
<?php else: ?>

<div class="content">
    <span class="titel"><?= htmlspecialchars($heading); ?> von <?= htmlspecialchars($gerichtarten->gerichtartname); ?></span>
    <a title="spieler" href="/gericht/addGericht?id=<?=$gaid?>"><div style="float: right; width: 200px;" class="submitForm">Gericht hinzufügen</div></a>
</div>

<?php if (empty($gerichte)): ?>
        <div class="content">
            <h3 class="u_titel">Diese Gerichtart hat noch keine Gerichte!</h3>
        </div>
<?php else:?>

    <?php foreach ($gerichte as $gericht): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class="u_titel"><?= htmlspecialchars($gericht->gerichtname); ?></h2>
                <br>
                <h4 class="subinfo"> <?= htmlspecialchars($gericht->beschreibung); ?></h4>
                <h4 class="subinfo">Preis: <?= htmlspecialchars($gericht->preis); ?></h4>
                <br>

                <a href="/gericht/delete?gid=<?=$gericht->id?>&aid=<?=$gerichtarten->id;?>"><div style="width: 200px;" class="submitForm"><i class="far fa-trash-alt"></i> Löschen</div></a>
                <br/>
                <a href="/gericht/update?gid=<?=$gericht->id?>&aid=<?=$gerichtarten->id;?>"><div style="width: 200px;" class="submitForm"><i class="far fa-edit"></i> Bearbeiten</div></a>
            </div>
            <?php
            $slash = "/";?>
            <div class="spielerBild" style="background-image: url(<?= $slash.$gericht->bildpfad;?>);"></div>
            <div style="clear: both;"></div>


        </div>
    <?php endforeach ?>
<?php endif;?>

<?php endif; ?>
<?php else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif; ?>
