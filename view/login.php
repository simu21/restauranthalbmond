<form action="/user/doCreate" method="post">
    <label for="firstName">Vorname</label>
    <input id="firstName" name="firstName" type="text" placeholder="Vorname" onkeypress="validationEmail(this)" class="textForm">

    <label for="lastName">Nachname</label>
    <input id="lastName" name="lastName" type="text" placeholder="Nachname" class="textForm">

    <label for="email">Mail</label>
    <input id="email" name="email" type="text" placeholder="Mail" class="textForm">

    <label for="password">Passwort</label>
    <input id="password" name="password" type="password" placeholder="Passwort" class="textForm">

    <label for="send">&nbsp;</label>
    <input id="send" name="send" type="submit" class="submitForm">

</form>
