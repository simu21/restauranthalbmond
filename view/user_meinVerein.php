<?php
if(isset($_SESSION['user_id'])):?>
    <div class="content">
        <span class="titel">Verein: <?= htmlspecialchars($verein->vereinsname); ?></span><br>
        <p class="u_titel">Kontaktperson: <?= htmlspecialchars($verein->kontaktperson); ?></p>
    </div>


    <?php if (empty($verein)): ?>
        <div class="content">
            <h2 class="item title">Hoopla! Alles ist leer!</h2>
        </div>
    <?php endif ?>
    <?php if (empty($mannschaft)): ?>

        <div class="content">
            <h2 class="u_titel">Hoopla! Es sind noch keine Mannschaften vorhanden!</h2>
        </div>

    <?php else: ?>

        <div class="content">
            <span class="titel"><?= $heading2?></span>
        </div>

         <?php foreach ($mannschaft as $m): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class="u_titel"><?= htmlspecialchars($m->mannschaftsname);?></h2>
                <p class="u_titel">Coach: <?= htmlspecialchars($m->coach);?></p>
            </div>

            <div style="width: 250px; float: right;">
                <a title="Löschen" href="/mannschaft/delete?id=<?= $m->id ?>"><div class="submitForm"><i class="far fa-trash-alt"></i> Löschen</div></a>
                <a title="spieler" href="/spieler/anzeigen?id=<?= $m->id ?>"><div class="submitForm"><i class="fas fa-users"></i> Spieler</div></a>
                <a title="spieler" href="/mannschaft/update?id=<?= $m->id ?>"><div class="submitForm"><i class="far fa-edit"></i> Mannschaft bearbeiten</div></a>
            </div>

            <div style="clear: both;"></div>

        </div>
        <?php endforeach ?>
    <?php endif ?>
    <?php else:?>
        <div class="content">
            <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
        </div>
<?php endif ?>

