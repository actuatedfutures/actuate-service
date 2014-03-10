<?php 
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/'.$_GET['url'];
    $help = file_get_contents($url);
?>

<h2 class="page-title"><span class="icon icon-smiley"></span>Help</h2>

<div class="module coloured colours-beige markdown">
    <?php echo $help; ?>
</div>

<div class="module coloured colours-beige">
    <h2 class="heading">Topics</h2>
    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p> 
    <ul class="block-list link-group">
        <li><a href="block-list__link">How to use the?</a></li>
        <li><a href="block-list__link">What do the graphs?</a></li>
        <li><a href="block-list__link">How can I?</a></li>
        <li><a href="block-list__link">When is the?</a></li>
        <li><a href="block-list__link">Where do I?</a></li>
        <li><a href="block-list__link">Can I even?</a></li>
    </ul>
</div>

<div class="module coloured colours-beige">
    <h2 class="heading">Hints &amp; Tips</h2>
    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
</div>