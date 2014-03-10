<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/heatingboost/';
    $boost = json_decode(file_get_contents($url));
    // $boost->other = ($boost->status == 'on') ? 'off' : 'on';

    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/targettemp/';
    $temp = json_decode(file_get_contents($url));
?>

<h1 class="page-title"><span class="icon icon-warmth icon--heading"></span>Ways to cool your home?</h1>

<div class="module coloured colours-sea">
    <h2 class="heading">Open windows</h2>
    <p class="m--half">This will allow some of the warmer air to escape. Don't leave them open too long though!</p>
    <dl class="split grid__item lap-one-half lk-black-bg-22" style="padding:0.5em">
       <dt class="split__title">Cost</dt>
       <dd>&pound;0.00</dd>
       <dt class="split__title">Time</dt>
       <dd>Quick</dd>
   </dl>
</div><!-- .module -->

<div class="module coloured colours-sea">
    <h2 class="heading">Close blinds</h2>
    <p class="m--half">The sun will naturally warm your house, so if it's sunny outside try blocking out the sun</p>
    <dl class="split grid__item lap-one-half lk-black-bg-22" style="padding:0.5em">
       <dt class="split__title">Cost</dt>
       <dd>&pound;0.00</dd>
       <dt class="split__title">Time</dt>
       <dd>Slow</dd>
   </dl>
</div><!-- .module -->

<div class="module coloured colours-sea">
    <h2 class="heading">Heating Boost</h2>
    <p>Your heating boost is currently <strong class="brand-face"><?php echo strtoupper($boost->status); ?></strong>.</p>
    <div class="grid"><div class="grid__item">

        <?php if ($boost->status == 'on'): ?>
        <a class="button" href="/control/heating/">Turn it off<span class="icon icon-arrow-right"></span></a>

        <dl class="split lk-black-bg-22" style="padding:0.5em">
           <dt class="split__title">Cost</dt>
           <dd>&pound;0.50 / min</dd>
           <dt class="split__title">Time</dt>
           <dd>15 mins</dd>
        </dl>        
        <?php endif; ?>

    </div></div><!-- .grid.grid__item -->
</div><!-- .module -->

<div class="module coloured colours-sea">
    <h2 class="heading">Target Temperature</h2>
    <p>Your target temperature is <strong class="brand-face"><?php echo $temp->target; ?>&deg;</strong>.</p>
    <div class="grid"><div class="grid__item">
        <a class="button" href="/control/target/">Change it<span class="icon icon-arrow-right"></span></a>    
    </div></div><!-- .grid.grid__item -->
</div><!-- .module -->