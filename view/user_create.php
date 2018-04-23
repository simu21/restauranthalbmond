<div class="content">
    <form action="/user/doCreate" method="post">

        <span class="titel"><?= $heading ?></span>
        <br><br>

        <label for="vorname" class="label">Vorname</label>
        <input id="vorname" name="vorname" type="text" class="textForm" required/>

        <label for="nachname" class="label">Nachname</label>
        <input id="nachname" name="nachname" type="text" class="textForm" required/>

        <label for="plz" class="label">PLZ</label>
        <input id="plz" name="plz" type="text" class="textForm" required/>

        <label for="ort" class="label">Ort</label>
        <input id="ort" name="ort" type="text" class="textForm" required/>

        <label for="telefonnummer" class="label">Telefonnummer</label>
        <input id="telefonnummer" name="telefonnummer" type="text" class="textForm" required/>

        <label for="email" class="label">Mail</label>
        <input id="email" name="email" type="email" class="textForm" required/>

        <label for="password" class="label">Passwort</label>
        <input id="password" name="password" type="password" class="textForm" required/>


        <input id="send" name="send" value="Registrieren" type="submit" class="submitForm">

        <br><br>
        <a href="/user/login"><div class="u_titel link">Du hast schon ein Account? Hier einloggen!</div></a>
    </form>
</div>

