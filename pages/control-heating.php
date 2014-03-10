<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/heatingboost/';
    $status = json_decode(file_get_contents($url));
    $switch_class = ($status->status == 'on') ? 'on' : '';
?>

<h2 class="page-title citu-grey">Control<span class="icon icon-power icon--heading"></span></h2>

<div class="module coloured colours-sea module--control">
    <p>Your heating boost is currently <strong class="status brand-face">ON</strong>.</p>
    <div class="control">
        <a href="#">
            <p class="label">Heating boost</p>
            <div class="switch">
                <span class="on">ON</span>
                <span class="off">OFF</span>
                <span class="cover <?php echo $switch_class; ?>"></span>
            </div><!-- .switch -->
        </a>
    </div><!-- .control light -->
</div><!-- .module -->

<div class="module coloured colours-turq">
    <h2 class="heading">Heating boost<span class="icon icon--right icon-water"></span></h2>
    <p>Your passive house should maintain it's temperature well efficiently. It also means you house will gradually heat up from things like boiling the kettle or doing some cooking. Even your own body heat will contribute to the household temperature. However, when you need to heat your house faster or if there isn't much going on, you can choose to turn on your heating boost to give things a little pep!</p>
</div>

<script type="text/javascript" src="/js/actuate/controlSwitchLogic.js"></script>
<script type="text/javascript">
    
    $(document).on("ready",function(e)
    {
        actuate.controlSwitchLogic('heatingboost',function(data)
        {
            // console.log('callback');         
            // console.log(data);        
        });
    });

</script>