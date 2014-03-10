<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/heatingboost/';
    $boost = json_decode(file_get_contents($url));
    $boost->other = ($boost->status == 'on') ? 'off' : 'on';

    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/targettemp/';
    $temp = json_decode(file_get_contents($url));
?>

<h1 class="page-title"><span class="icon icon-warmth icon--heading"></span>Ways to warm your home?</h1>

<div class="module coloured colours-maroon">
    <h2 class="heading">Wait and see</h2>
    <p class="m--half">Ordinary activity will gently warm your home by up to 2°C in 30 minutes.</p>
    <dl class="split grid__item lap-one-half lk-black-bg-22" style="padding:0.5em">
       <dt class="split__title">Cost</dt>
       <dd>&pound;0.00</dd>
       <dt class="split__title">Time</dt>
       <dd>Slow</dd>
   </dl>
</div><!-- .module -->

<div class="module coloured colours-maroon">
    <h2 class="heading">Make Some Tea</h2>
    <p class="m--half">Boiling a kettle or cooking some food will help to warm things up faster.</p>
    <dl class="split grid__item lap-one-half lk-black-bg-22" style="padding:0.5em">
       <dt class="split__title">Cost</dt>
       <dd>&pound;0.00</dd>
       <dt class="split__title">Time</dt>
       <dd>Quick</dd>
   </dl>
</div><!-- .module -->

<div class="module coloured colours-maroon">
    <h2 class="heading">Heating Boost</h2>
    <p>Your heating is currently <strong class="brand-face"><?php echo strtoupper($boost->status); ?></strong>.</p>
    <div class="grid"><div class="grid__item">
      <p>Using the heating boost will raise the temperature of your home more quickly but it costs!</p>
      <a class="button" href="/control/heating/">Turn it <?php echo $boost->other; ?><span class="icon icon-arrow-right"></span></a>
      <dl class="split lk-black-bg-22" style="padding:0.5em">
         <dt class="split__title">Cost</dt>
         <dd>&pound;0.50 / min</dd>
         <dt class="split__title">Time</dt>
         <dd>15 mins</dd>
      </dl>        
    </div></div><!-- .grid.grid__item -->
</div><!-- .module -->

<div class="module coloured colours-maroon">
    <h2 class="heading">Target Temperature</h2>
    <p>Your target temperature is <strong class="brand-face"><?php echo $temp->target; ?>&deg;</strong>.</p>
    <div class="grid"><div class="grid__item">
        <a class="button" href="/control/target/">Change it<span class="icon icon-arrow-right"></span></a>       
    </div></div><!-- .grid.grid__item -->
</div><!-- .module -->