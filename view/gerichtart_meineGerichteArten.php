<?php
if(isset($_SESSION['user_id'])):?>
    <div class="content">
        <?php htmlspecialchars($user->vorname);?>
        <span class="titel">Angemeldet als: <?=  strtoupper($user->vorname); ?></span><br>
    </div>


    <?php if (empty($user)): ?>
        <div class="content">
            <h2 class="item title">Hoopla! Alles ist leer!</h2>
        </div>
    <?php endif ?>
    <?php if (empty($gerichteArten)): ?>

        <div class="content">
            <h2 class="u_titel">Hoopla! Es sind noch keine Gerichtarten vorhanden!</h2>
        </div>

    <?php else: ?>

        <div class="content">
            <span class="titel"><?= $heading2?></span>
        </div>

         <?php foreach ($gerichteArten as $gerichteArt): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class="u_titel"><?= htmlspecialchars($gerichteArt->gerichtartname);?></h2>
                <p class="u_titel"><?= htmlspecialchars($gerichteArt->beschreibung);?></p>
            </div>

            <div style="width: 250px; float: right;">
                <a title="Löschen" href="/gerichtart/delete?id=<?= $gerichteArt->id ?>"><div class="submitForm"><i class="far fa-trash-alt"></i> Gerichtart Löschen</div></a>
                <a title="spieler" href="/gericht/anzeigen?id=<?= $gerichteArt->id ?>"><div class="submitForm"><i class="fas fa-users"></i> Gerichte</div></a>
                <a title="spieler" href="/gerichtart/update?id=<?= $gerichteArt->id ?>"><div class="submitForm"><i class="far fa-edit"></i> Gerichtart bearbeiten</div></a>
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

