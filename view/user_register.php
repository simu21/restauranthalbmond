<?php
$form = new Form('/user/doRegister', 'post');
?>
<script>
    alert('Füllen Sie bitte alle Füller aus um sich (erneut) zu registrieren!');
</script>
    <a>username:</a>
    <input title="Füllen Sie das Feld aus" pattern="(([a-Z]).{1,20})" onblur="this.placeholder = 'username'" onfocus="this.placeholder= ''" class="nav_login_inputs" placeholder="username" type="text" name="username"/>
    <a>firstname:</a>
    <input title="Füllen Sie das Feld aus" pattern="(([a-Z]).{1,20})" onblur="this.placeholder = 'firstname'" onfocus="this.placeholder= ''" class="nav_login_inputs" placeholder="firstname" type="text" name="firstname"/>
    <a>lastname:</a>
    <input title="Füllen Sie das Feld aus" pattern="(([a-Z]).{1,20})" onblur="this.placeholder = 'lastname'" onfocus="this.placeholder= ''" class="nav_login_inputs" placeholder="lastname" type="text" name="lastname"/>
    <a>email:</a>
    <input onblur="this.placeholder = 'user@example.com'" onfocus="this.placeholder= ''"  class="nav_login_inputs" placeholder="user@example.com" type="email" name="email"/>
    <a>password:</a>
    <input title="Das Passswort muss 1 klein-/ und 1 Grossbuchstaben beinhalten, dazu 8 zeichen lang sein und 1 Sonderzeichen beinhalten" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%-_?]).{8,20})" onblur="this.placeholder = 'password'" onfocus="this.placeholder= ''" class="nav_login_inputs" placeholder="password" type="password" name="password"/>
    <button class="submit_button_register" type="submit">register</button>
<?php
echo $form->end();
?>

