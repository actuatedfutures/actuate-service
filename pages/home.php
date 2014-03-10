<div class="module coloured colours-sea home__weather">
        <div class="icon"><img src="img/cloudybright.svg" width="100%" /></div>
        <p class="m--half b--white">
            <span class="third-face"><?php echo date('jS F Y', time()); ?></span><br />
            Hello <?php echo $_SESSION['user']['firstname']; ?>, it looks like it's going to be cloudy bright with rain later. Might be a good day for some gardening.</p>        
</div>

<div class="module coloured colours-maroon home__weather">
        <h2 class="heading">Temperature</h2>    
        <div class="separate grid--full">            
            <div class="one-of grid__item">
                <p class="label brand-face">Inside</p>
                <p class="figure" id="temp-inside">-&deg;C</p>
                <a href="/warmth/" class="button">Control<span class="icon-arrow-right"></span></a>
            </div><!-- 
         --><div class="grid__item">
                <p class="label brand-face">Outside</p>
                <p class="figure" id="temp-outside">-&deg;C</p>
                <a href="/weather/" class="button">More detail<span class="icon-arrow-right"></span></a>
            </div>
        </div><!-- .temperatures -->
</div>

<div class="module coloured colours-turq home__weather">
<a href="/billing/" class="button">Last bill: 15 days ago<span class="icon-arrow-right"></span></a>
</div>

<div class="module coloured colours-sea sofar">
    <h2 class="heading">So Far This Month</h2>    
    <div class="">
        <div class="">
            <div class="total separate grid--full">
                <div class="grid__item">                    
                    <p class="label brand-face">Combined Total:</p>
                    <p class="figure extra">£35.42</p>  
                </div>
            </div>
            <hr class="rule" />
            <div class="separate grid--full">
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
    </div>
</div>

<?php 
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/housealarm/';
    $status = json_decode(file_get_contents($url));
    $label = ($status->status == 'on') ? 'ARMED' : "DISARMED" ;
?>

<div class="module coloured colours-mustard module__status">
    <p class="m--half"><span class="icon-home"></span> Your house is: </p>
    <p class="house_status hi"><span class="slabtext"><?php echo $label; ?></span></p>
    <a class="button" href="/security/">Security<span class="icon-arrow-right"></span></a>
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
