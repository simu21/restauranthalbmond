<?php
if(!isset($_GET['id'])): ?>
    <div class="content">
        <h3 class="u_titel">Diese Gerichtart hat noch keine Gerichte!</h3>
    </div>
<?php else: ?>

<div class="content">
    <span class="titel"><?= htmlspecialchars($heading); ?> von <?= htmlspecialchars($gerichtarten->gerichtartname); ?></span>
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
            </div>
            <?php
            $slash = "/";?>
            <div class="spielerBild" style="background-image: url(<?= $slash.$gericht->bildpfad;?>);"></div>
            <div style="clear: both;"></div>


        </div>
    <?php endforeach ?>
<?php endif;?>

<?php endif; ?>


