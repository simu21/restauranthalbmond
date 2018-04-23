<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-grid.css" rel="stylesheet">
    <link href="/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="/css/bootstrap-reboot.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="body">
<nav style="z-index: 10;" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Gastro-Culture.ch</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/uberuns">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user">Users</a>
            </li>
            <?php
            if(isset($_SESSION['userid']) && isset($_SESSION['username'])){
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/recipe/add'>add recipe</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/user/profile'>my profile</a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
        <?php
        if(!$_SESSION['loginerror'] && !$_SESSION['loginsuccess']){
            if(!isset($_SESSION['id'])){
                $_SESSION['loginmiss'] = true;
                $_SESSION['message'] = 'sie sind nicht eingeloggt';
            } else {
                $_SESSION['loginmiss'] = false;
            }
            $_SESSION['loginsuccess'] = false;
            $_SESSION['loginerror'] = false;
        }
        if($_SESSION['loginerror']){
            $_SESSION['loginsuccess'] = false;
            $_SESSION['loginmiss'] = false;
        }
        if($_SESSION['loginsuccess']){
            $_SESSION['loginmiss'] = false;
            $_SESSION['loginerror'] = false;
        }
        echo "<div class='meldung_header'>";
        if($_SESSION['loginerror']){
            echo "<div class='alert alert-danger'>".$_SESSION['message']."</div>";
        }
        if($_SESSION['loginsuccess']){
            echo "<div class='alert alert-success'>".$_SESSION['message']."</div>";
        }
        if($_SESSION['loginmiss']){
            echo "<div class='alert alert-warning'>".$_SESSION['message']."</div>";
        }
        echo "</div>";
        if(isset($_SESSION['userid']) && isset($_SESSION['username'])){
            echo "<div class='user_logo'><a class='logout_a' href='/user/profile'></a></div>";
            echo "<form action='/user/logout' class='logout_form' type='submit'><input type='submit' class='login_button_header' value='logout'></form>";
        } else {
            echo "<div class=\"nav_login\">";
            echo "<div class='user_logo_register'><a href='/user/register'></a></div>";
            echo "<form class='login_form' method='post' action='/user/doLogin'>";
            echo "<input onblur='this.placeholder = \"username\"' onfocus='this.placeholder= \" \"' class='nav_login_inputs' placeholder='username' type='text' name='username'>";
            echo "<input onblur='this.placeholder = \"password\"' onfocus='this.placeholder= \" \"' class='nav_login_inputs' placeholder='password' type='password' name='password'>";
            echo "<input type='submit' class='login_button_header' value='login'>";
            echo "</form>";
        }
        ?>
    </div>
</nav>
