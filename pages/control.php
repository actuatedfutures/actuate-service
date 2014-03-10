<?php
$pagefile = 'pages/'.$params[0].'-'.$params[1].'.php';
if (file_exists($pagefile)) include($pagefile);
else {
    echo '<h2 class="page-title">Not found</h2>';
    echo '<p>'.$pagefile.'</p>';
}
?>