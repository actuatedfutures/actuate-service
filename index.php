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
    include ('pages/inc/top.html');

    if (!isset($_SESSION['user'])) // if the user isn't properly logged in.
    {
        include ('pages/login.php');

    } else {
        
        include('pages/inc/header.html');
        include('pages/inc/menu_controls.html');
        include('pages/inc/menu_pages.html');
        include($pagefile);
    }
    include('pages/inc/bottom.html'); 

} else { // otherwise issue a good ol' 404 me hearties!

    header("HTTP/1.0 404 Not Found");
}

?>
