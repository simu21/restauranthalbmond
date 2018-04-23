<?php if(isset($_SESSION['user_id'])):
header('Location: /user/logout');

else: ?>

<div class="content">
    <form action="/user/doLogin" method="post">

        <span class="titel"><?= $heading ?></span>
        <br><br>
        <?php
        if(isset($_GET['message'])) {
            echo "<div class='fehler'>$fehlermeldung</div>";
        }
        ?>

        <label for="email" class="label">Mail</label><br>
        <input id="email" name="email" type="email" class="textForm" onkeyup="emailValidate(this)" required/><br>

        <label for="Passwort" class="label">Passwort</label><br>
        <input id="password" name="password" type="password" class="textForm" required/><br>

        <input id="send" name="send" value="Login" type="submit" class="submitForm">

        <br><br>
        <a href="/user/create"><div class="u_titel link">Noch kein Mitglied? Hier registrieren!</div></a>

    </form>

</div>

<?php endif ?>