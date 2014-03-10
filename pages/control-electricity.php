<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/nonessential/';
    $status = json_decode(file_get_contents($url));
    $switch_class = ($status->status == 'on') ? 'on' : '';
?>

<h2 class="page-title citu-grey">Control<span class="icon icon-power icon--heading"></span></h2>

<div class="module coloured colours-maroon module--control">
    <p>Your non-essential curcuit is currently <strong class="status brand-face">ON</strong>.</p>
    <div class="control">
        <a href="#">
            <p class="label">Non-essential curcuit</p>
            <div class="switch">
                <span class="on">on</span>
                <span class="off">off</span>
                <span class="cover <?php echo $switch_class; ?>"></span>
            </div><!-- .switch -->
        </a>
    </div><!-- .control light -->
</div><!-- .module -->

<div class="module coloured colours-turq">
    <h2 class="heading">Non-essential circuit<span class="icon icon--right icon-bulb"></span></h2>
    <p>Your non-essential curcuit controls all the plugs in your house marked with a green flamingo. These plugs can be controlled all at once which means you never need to worry about leaving appliances on, or wasting power by leaving the TV on standby.</p>
</div>

<script type="text/javascript" src="/js/actuate/controlSwitchLogic.js"></script>
<script type="text/javascript">    

    $(document).on("ready",function(e)
    {
        actuate.controlSwitchLogic('nonessential',function(data)
        {
            // console.log('callback');         
            // console.log(data);        
        });
    });

</script>