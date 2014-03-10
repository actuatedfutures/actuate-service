<?php

// helper functions and stuff.
include('php/config.php');
include('php/functions.php');

// get the session started.
session_start();

if (isset($_GET['url']))    // if the URL is actually set (see .htaccess).
{
    $params = explode('/',$_GET['url']);
} else {
    $params = array('home');
}

// work out what page we're trying to display.
$pagefile = 'pages/'.$params[0].'.php';

// check a file exists for that page.
if (file_exists($pagefile))
{
    include ('inc/top.html');
    include('inc/header.html');
    include('inc/menu_controls.html');
    include('inc/menu_pages.html');
    if (!isset($_SESSION['user'])) // if the user isn't properly logged in.
    {
        include ('pages/login.php');

    } else {
        
        include($pagefile);
    }
    include('inc/bottom.html'); 

} else { // otherwise issue a good ol' 404 me hearties!

    header("HTTP/1.0 404 Not Found");
}

?>
