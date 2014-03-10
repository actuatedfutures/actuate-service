<div class="module home__weather">
    <header class="module__header -blue"><h2 class="heading"><?php echo date('jS F Y', time()); ?></h2></header>
    <div class="module__main">
        <div class="icon"><img src="img/cloudybright.svg" width="100%" /></div>
        <p class="m--half b--white">
            Hello <?php echo $_SESSION['user']['firstname']; ?>, it looks like it's going to be cloudy bright with rain later. Might be a good day for some gardening.
        </p>        
    </div>
    <footer class="module__footer"></footer>
</div>

<div class="module">
    <header class="module__header -maroon">
        <h2 class="heading">Temperature</h2>
    </header>
    <div class="module__main">
        <div class="separate">            
            <div class="pair">
                <p class="label brand-face">Inside</p>
                <p class="figure" id="temp-inside">-&deg;C</p>
                <a href="/warmth/" class="button">Control<span class="icon-arrow-right"></span></a>
            </div><!-- 
         --><div class="pair">
                <p class="label brand-face">Outside</p>
                <p class="figure" id="temp-outside">-&deg;C</p>
                <a href="/weather/" class="button">More detail<span class="icon-arrow-right"></span></a>
            </div>
        </div><!-- .temperatures -->
    </div>
    <footer class="module__footer"></footer>
</div>

<div class="module home__weather">
    <div class="module__header -blue"><h2 class="heading">Last bill</h2></div>
    <div class="module__main">
        <a href="/billing/" class="button">£62.60 : 15 days ago<span class="icon-arrow-right"></span></a>
    </div>
    <footer class="module__footer"></footer>
</div>

<div class="module sofar">
    <div class="module__header -blue"><h2 class="heading">So Far This Month</h2></div>
    <div class="module__main">
        <div class="">
            <div class="total separate grid">
                <div class="grid__item">                    
                    <p class="label brand-face">Combined Total:</p>
                    <p class="figure extra">£35.42</p>  
                </div>
            </div>
            <hr class="rule" />
            <div class="separate grid">
                <div class="one-of grid__item lap-one-half">                        
                        <p class="label brand-face">Water</p>
                        <p class="figure">£14.98</p>
                        <a href="/water/" class="button">More detail <span class="icon-arrow-right"></span></a>
                </div><!-- .water --><!--
             --><div class="grid__item lap-one-half">                        
                        <p class="label brand-face">Electricity</p>
                        <p class="figure">£20.53</p>
                        <a href="/electricity/" class="button">More detail <span class="icon-arrow-right"></span></a>
                </div><!-- .electricity -->
            </div>
        </div>
    </div><!-- .module__main -->
    <footer class="module__footer"></footer>
</div>

<?php 
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/housealarm/';
    $status = json_decode(file_get_contents($url));
    $label = ($status->status == 'on') ? 'ARMED' : "DISARMED" ;
?>

<div class="module module__status">
    <header class="module__header -mustard">
        <p class="icon icon-home"></p>
        <h2 class="heading m--none">Security</h2>
    </header>
    <div class="module__main">
        <p class="m--none">Your house is:</p>
        <p class="house_status hi"><span class="slabtext"><?php echo $label; ?></span></p>        
    </div>
    <footer class="module__footer">
        <a class="button" href="/security/">Security<span class="icon-arrow-right"></span></a>
    </footer>
</div>

<script type="text/javascript">

    $(document).on('ready',function()
    {
        $('.house_status').slabText();
        $('.total .extra').slabText();
    }); 

    // $('#temp-inside').html('<div class="icon--rotate"><span class="icon-cog"></span></div>');
    $.get('/api/warmth/temperature/inside', {}, function(data, textStatus, jqXHR)
    {
        $('#temp-inside').html(Math.floor(data.now)+'&deg;C');                        
    },'json');

    $.get('/api/warmth/temperature/outside', {}, function(data, textStatus, jqXHR)
    {
        $('#temp-outside').html(Math.floor(data.now)+'&deg;C');
    },'json');  
</script>
