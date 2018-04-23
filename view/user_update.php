<?php
$form = new Form('/user/doUpdate', 'post');
?>
<script>
    alert('Füllen Sie bitte alle Füller aus!');
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
    <input class="update_profile_btn" type="submit" name="submit" value="update">
<?php
echo $form->end();
?>
<script>
    jQuery(function() {
        $('form').submit(function(event) {

            var r = confirm("Do you really wanna UPDATE your profile?");
            console.log(r);
            if (!r) {
                event.preventDefault();
            }
        });
    });
</script>

