<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/housealarm/';
    $status = json_decode(file_get_contents($url));
    $switch_class = ($status->status == 'on') ? 'on' : '';
?>

<h2 class="page-title citu-grey">Control<span class="icon icon-power icon--heading"></span></h2>

<div class="module coloured colours-sea module--control">
    <p>Your alarm is currently <strong class="status brand-face">DISARMED</strong>.</p>
    <div class="control">
        <a href="#">
            <p class="label">House alarm</p>
            <div class="switch">
                <span class="on">ARMED</span>
                <span class="off">DISARMED</span>
                <span class="cover <?php echo $switch_class; ?>"></span>
            </div><!-- .switch -->
        </a>
        <div class="cover" id="cover"></div>
    </div><!-- .control light -->
    <div class="sorry">
        <p class="note">For security reasons once the house alarm is armed it is not possible to disarm it from this service. You can only disarm your alarm from within your home.</p>
        <a class="button" href="/help/alarm/disarm">Why?<span class="icon icon-sad"></span></a>
    </div>
</div><!-- .module -->

<div class="module coloured colours-turq">
    <h2 class="heading">House Alarm<span class="icon icon--right icon-eye"></span></h2>
    <p>The control panel for your house alarm control panel can be found next to the mirror in the hall just above the place where you hang your coats. You can disarm your alarm from this panel by entering the correct pin code. For any help using your alarm or to report any problems with it please call 01234 567 890.</p>
</div>

<script type="text/javascript" src="/js/actuate/controlSwitchLogic.js"></script>
<script type="text/javascript">
    
    $(document).on("ready",function(e)
    {
        var control = $('.control');
        var sorry   = $('.sorry');

        sorry.hide();
        $('#cover').hide();
        <?php if ($status->status == 'off'): ?>
            
        <?php endif; ?>

        actuate.controlSwitchLogic('housealarm',function(data)
        {   
            console.log('doneit!');        
            console.log(data.status);        
            if (data.status == 'on')
            {
                $('.sorry').show();
                $('#cover').show();
                $('.status').text('ARMED');
            } else {
                $('.sorry').hide();
                $('#cover').hide();
                $('.status').text('DISARMED');
            }
        });
    });

</script>