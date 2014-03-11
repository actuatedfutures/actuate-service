<h1 class="page-title"><span class="icon icon-eye icon--heading"></span>Security</h1>

<?php /*
<div class="module coloured colours-mint">
    <h3 class="heading">Security status</h3>
    <div class="status__box movement">
        <div class="icon"></div>
        <dl class="split">
            <dt class="split__title">Last movement</dt>
            <dd class="status"><span class="hi">08:45pm</span></dd>
        </dl>
    </div><!-- .status__box -->
</div>
*/ ?>

<?php 
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/housealarm/';
    $status = json_decode(file_get_contents($url));
    $label = ($status->status == 'on') ? 'ARM' : "DISARM" ;
    $action = ($status->status == 'on') ? 'DISARM' : "ARM" ;
?>

<div class="grid grid--security">
<div class="grid__item">

    <div class="module">
        <header class="module__header -turq">
            <p class="icon icon-alarm"></p>
            <h3 class="heading">Alarm</h3>
        </header>
        <div class="module__main">
            <div class="status__box alarm">
                <dl class="split">
                    <dt class="split__title">Alarm status</dt>
                    <dd class="status"><span class="hi"><?php echo $label; ?>ED</span></dd>
                </dl>
            </div><!-- .status__box -->
        </div><!-- .module_main -->
        <footer class="module__footer">
            <a href="/control/alarm/" class="button"><?php echo $action; ?> the alarm<span class="icon icon-arrow-right"></span></a>
        </footer>
    </div>

</div><div class="grid__item">

    <div class="module">
        <header class="module__header -blue">
            <p class="icon icon-occupancy"></p>
            <h3 class="heading">Occupancy</h3>
        </header>
        <div class="module__main">
            <div class="status__box occupancy">
                <dl class="split">
                    <dt class="split__title"> Last movement </dt>
                    <dd class="status"><span class="hi">7:35am</span></dd>
                </dl>
            </div><!-- .status__box -->
        </div><!-- .module_main -->
    </div>

</div><div class="grid__item">

    <div class="module">
        <header class="module__header -sea">
            <p class="icon icon-door--closed"></p>
            <h2 class="heading">Doors &amp; Windows</h2>
        </header>
        <div class="module__main">
            <div class="status__box door--open">
                <dl class="split">
                    <dt class="split__title"> Front door</dt>
                    <dd class="status"><span class="hi">CLOSED</span></dd>
                </dl>
                <dl class="split">
                    <dt class="split__title"> Back door</dt>
                    <dd class="status"><span class="hi">OPEN</span></dd>
                </dl>
                <dl class="split">
                    <dt class="split__title">Upstairs windows</dt>
                    <dd class="status"><span class="hi">OPEN</span></dd>
                </dl>
                <dl class="split">
                    <dt class="split__title">Down stairs windows</dt>
                    <dd class="status"><span class="hi">OPEN</span></dd>
                </dl>
            </div><!-- .status__box -->
        </div><!-- .module_main -->
    </div><!-- .module -->  

</div><!-- .grid__item -->
</div><!-- .grid -->

<script type="text/javascript">
    $(document).on('ready',function()
    {
        $.get('/api/security/windows/', {}, function(data, textStatus, jqXHR)
        {
            if (data.status == 'CLOSED')
            {
                $('.windows .split__title').text('All your windows are:');
                $('.windows .hi').text('CLOSED');
            }
            else if (data.status == 'OPEN')
            {
                $('.windows .split__title').text('A window is:');
                $('.windows .hi').text('OPEN');
            }
        },'json');
        
        $.get('/api/security/doors/', {}, function(data, textStatus, jqXHR)
        {
            if (data.status == 'CLOSED')
            {
                $('.doors .split__title').text('This door is:');
                $('.doors .hi').text('CLOSED');
            }
            else if (data.status == 'OPEN')
            {
                $('.doors .split__title').text('This door is:');
                $('.doors .hi').text('OPEN');
            }
        },'json');
    });       
</script>