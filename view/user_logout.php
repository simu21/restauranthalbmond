<?php if(isset($_SESSION['user_id'])): ?>

<div class="content">
    <form action="/user/doLogout" method="post">
        <h2 class="u_titel">Möchtest du dich wirklich ausloggen?</h2>
        <br/>

        <input id="send" name="send" value="Ausloggen" type="submit" class="submitForm">

    </form>

</div>

<?php else:
    header('Location: /user/login');
endif ?>
