<?php

session_start();
if(!isset($_SESSION['loginerror']) && !isset($_SESSION['loginmiss']) && !isset($_SESSION['loginsuccess'])){
    $_SESSION['loginerror'] = false;
    $_SESSION['loginsucces'] = false;
    $_SESSION['loginmiss'] = true;
}

/*
 * Die index.php Datei ist der Einstiegspunkt des MVC. Hier werden zuerst alle
 * vom Framework benötigten Klassen geladen und danach wird die Anfrage dem
 * Dispatcher weitergegeben.
 *
 * Wie in der .htaccess Datei beschrieben, werden alle Anfragen, welche nicht
 * auf eine bestehende Datei zeigen hierhin umgeleitet.
 */

require_once '../lib/Dispatcher.php';
require_once '../lib/formbuilder/FormBuilder.php';
require_once '../lib/View.php';

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
