<?php
if(isset($_SESSION['user_id'])):?>
    <?php
    if(isset($fehlermeldung)){
    echo "<div class='fehler'>$fehlermeldung</div>";
    }?>

<div class="content">
    <span class="titel"><?= $heading .$user->vorname ?></span>
</div>

<?php if (empty($gerichtarten)): ?>
    <div class="content">
        <h2 class="u_titel">Hoopla!Es sind noch keine Gerichte vorhanden!</h2>
    </div>
<?php else: ?>
    <?php foreach ($gerichtarten as $gerichtart): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class = "u_titel">Gerichtart: <?= $gerichtart->gerichtartname;?></h2><br>
                <h3 class = "u_titel"> <?= " " .$gerichtart->beschreibung;?></h3><br>
                <a title="spieler" href="/user/gerichteanzeigen?id=<?= $gerichtart->id ?>"><div class="submitForm"><i class="fas fa-users"></i>Zu den Gerichten</div></a>
            </div>

            <div style="clear: both;"></div>
        </div>
    <?php endforeach ?>
<?php endif ?>

    
<?php else: ?>

    <?php
    if(isset($fehlermeldung)){
        echo "<div class='fehler'>$fehlermeldung</div>";
    }?>
<div class="content">
    <span class="titel"><?= $heading ?></span>

</div>

<?php if (empty($gerichtarten)): ?>
    <div class="content">
        <h2 class="u_titel">Hoopla!Es sind noch keine Gerichte vorhanden!</h2>
    </div>
<?php else: ?>
    <?php foreach ($gerichtarten as $gerichtart): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class = "u_titel">Gerichtart: <?= $gerichtart->gerichtartname;?></h2><br>
                <h3 class = "u_titel"> <?= " " .$gerichtart->beschreibung;?></h3><br>
                <a title="spieler" href="/user/gerichteanzeigen?id=<?= $gerichtart->id ?>"><div class="submitForm"><i class="fas fa-users"></i>Zu den Gerichten</div></a>
            </div>

            <div style="clear: both;"></div>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php endif ?>

