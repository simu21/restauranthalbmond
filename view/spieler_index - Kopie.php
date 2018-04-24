<?php if(isset($_SESSION['user_id'])):
if(!isset($_GET['id'])): ?>
    <div class="content">
        <h3 class="u_titel">Diese Mannschaft hat noch keine Spieler!</h3>
    </div>
<?php else: ?>

<div class="content">
    <span class="titel"><?= htmlspecialchars($heading); ?> von <?= htmlspecialchars($mannschaft->mannschaftsname); ?></span>
    <a title="spieler" href="/spieler/addSpieler?id=<?=$m_id?>"><div style="float: right; width: 200px;" class="submitForm">Spieler hinzufügen</div></a>
</div>

<?php if (empty($spieler)): ?>
        <div class="content">
            <h3 class="u_titel">Diese Mannschaft hat noch keine Spieler!</h3>
        </div>
<?php else:?>

    <?php foreach ($spieler as $s): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class="u_titel"><?= htmlspecialchars($s->vorname); ?> <?= htmlspecialchars($s->nachname); ?></h2>
                <br>
                <h4 class="subinfo">Position: <?= htmlspecialchars($s->sposition); ?></h4>
                <br>

                <a href="/spieler/delete?sid=<?=$s->id?>&id=<?=$mannschaft->id;?>"><div style="width: 200px;" class="submitForm"><i class="far fa-trash-alt"></i> Löschen</div></a>                <br/>
                <a href="/spieler/update?sid=<?=$s->id?>&id=<?=$mannschaft->id;?>"><div style="width: 200px;" class="submitForm"><i class="far fa-edit"></i> Bearbeiten</div></a>
            </div>

            <div class="spielerBild" style="background-image: url(/<?= $s->bildpfad;?>);"></div>
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
