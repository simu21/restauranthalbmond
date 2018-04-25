<?php if (empty($reservationen)): ?>
    <div class="content">
        <h3 class="u_titel">Du hast noch keine Reservationen!</h3>
    </div>
<?php else:?>

    <?php foreach ($reservationen as $reservation): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class="u_titel">Datum: <?= htmlspecialchars($reservation->datum); ?></h2>
                <br>
                <h4 class="subinfo"> Uhrzeit: <?= htmlspecialchars($reservation->zeit); ?></h4>
                <h4 class="subinfo">Anzahlpersonen: <?= htmlspecialchars($reservation->anzahlpersonen); ?></h4>
                <br>
                <h4 class="subinfo">Name: <?= htmlspecialchars($user->vorname." ".$user->nachname); ?></h4>
                <br>
                <h4 class="subinfo">Telefonnummer: <?= htmlspecialchars($user->telefonnummer); ?></h4>

                <!--<a href="/gericht/delete?gid=<?=$gericht->id?>&aid=<?=$gerichtarten->id;?>"><div style="width: 200px;" class="submitForm"><i class="far fa-trash-alt"></i> Löschen</div></a>-->
                <!--<br/>-->
                <!--<a href="/gericht/update?gid=<?=$gericht->id?>&aid=<?=$gerichtarten->id;?>"><div style="width: 200px;" class="submitForm"><i class="far fa-edit"></i> Bearbeiten</div></a>-->
            </div>
            <?php
            $slash = "/";?>
            <div class="spielerBild" style="background-image: url(<?= $slash.$gericht->bildpfad;?>);"></div>
            <div style="clear: both;"></div>


        </div>
    <?php endforeach ?>
<?php endif;?>