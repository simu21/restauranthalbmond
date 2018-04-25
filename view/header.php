<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/style.css" >
    <script src="/js/validation.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Arimo|Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title><?= $title?> | Restauranthalbmond</title>
</head>
<body>

<header>
    <div class="logo"></div>

    <div class="navigation">
        <ul class="te">

            <?php
            if(isset($_SESSION['user_id'])){
                echo "<li><a href=\"/user/logout\">Logout</a></li>";
                if(isset($user)){
                    if($user->admin == 1){
                        echo "<li><a href=\"/gerichtart/meineGerichtarten\">Meine Gerichte</a></li>";
                        echo "<li><a href=\"/user/alleUser\">Alle User</a></li>";
                        echo "<li><a href=\"/gerichtart/createGerichtart\">Gerichtart hinzufügen</a></li>";
                    }
                    else{
                        echo "<li><a href=\"/user/\">Gerichte</a></li>";
                        echo "<li><a href=\"/reservation\">Reservieren</a></li>";
                        echo "<li><a href=\"/reservation/meineReservationen\">Meine Reservationen</a></li>";
                    }
                }
            }
            else{
                if(!isset($_SESSION['user_id'])) {
                echo  "<li><a href='/'>Home</a></li>";
                echo "<li><a href=\"/user/login\">login</a></li>";
                echo "<li><a href=\"/user/\">Gerichte</a></li>";
                echo "<li><a href=\"/reservation/create\">Reservieren</a></li>";
                 }
                else{
                    echo "<li><a href=\"/user/\">Gerichte</a></li>";
                }


            }?>


        </ul>
    </div>
</header>

</body>
</html>


