<h1 class="page-title"><span class="icon icon-warmth icon--heading"></span>Just right?</h1>

<div class="module coloured colours-blue">
    <h2 class="heading">New Target Temperatue</h2>
    <p class="m--none">Excellent, we have updated your target temperature to be:</p>
    <p class="huge" style="font-size:4em"><?php echo $_GET['temp'];?>°C</p>
</div><!-- .module -->

<div class="module coloured colours-mustard">
    <h2 class="heading">Savings</h2>
    <p class="m--half">Previous target temperature was <?php echo ($_GET['temp']+5);?>°C this change will save you</p>
    <p class="huge" style="font-size:3em">£3.00 a week.</p>
</div><!-- .module -->