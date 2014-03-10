<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/waterheating/';
    $status = json_decode(file_get_contents($url));
    $switch_class = ($status->status == 'on') ? 'on' : '';
?>

<h2 class="page-title citu-grey">Control<span class="icon icon-power icon--heading"></span></h2>

<div class="module coloured colours-sea module--control">
    <p>Your water heating is currently <strong class="status brand-face">ON</strong></p>
    <div class="control">
        <a href="#">
            <p class="label">Water heating</p>
            <div class="switch">
                <span class="on">on</span>
                <span class="off">off</span>
                <span class="cover <?php echo $switch_class; ?>"></span>
            </div><!-- .switch -->
        </a>
    </div><!-- .control light -->
</div><!-- .module -->

<div class="module coloured colours-turq">
    <h2 class="heading">Water heating<span class="icon icon--right icon-water"></span></h2>
    <p>Your water tank is heated every day and should provide enough water for all your needs. However, should you run out you can always heat the tank again but turning on your water heating for an hour.</p>
</div>

<script type="text/javascript" src="/js/actuate/controlSwitchLogic.js"></script>
<script type="text/javascript">
    
    $(document).on("ready",function(e)
    {
        actuate.controlSwitchLogic('waterheating',function(data)
        {
            // console.log('callback');         
            // console.log(data);        
        });
    });

</script>