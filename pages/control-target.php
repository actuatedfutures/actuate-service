<?php 
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/api/control/targettemp/';
    $temp = json_decode(file_get_contents($url));    
?>
<h2 class="page-title citu-grey">Control<span class="icon icon-power icon--heading"></span></h2>

<div class="module coloured colours-purple module--control">
    <h2 class="heading">Target Temperature</h2>
    <div class="controls--temp">
        <div class="display" id="temp-display"><?php echo $temp->target; ?>&deg;</div><!--
        --><div class="controls--updown">
            <a href="#" class="button" id="up"><span class="icon-arrow-up"></span>increase</a>
            <a href="#" class="button" id="down">decrease<span class="icon-arrow-down"></span></a>
        </div><!-- .control light -->        
    </div>
    <a href="#" class="button -disabled" id="confirm">please confirm<span class="icon-checkmark"></span></a>
</div><!-- .module -->

<div class="module coloured colours-turq">
    <h2 class="heading">Target Temperature<span class="icon icon--right icon-warmth"></span></h2>
    <p>The target temperature is what your house will try and reach and maintain naturally. This means that the passive haus system within your house will either maintain or increase the houses warmth or gradually let the house cool.</p>
</div>

<script type="text/javascript" src="/js/actuate/controlSwitchLogic.js"></script>
<script type="text/javascript">
    
    $(document).on("ready",function(e)
    {
        var target  = <?php echo $temp->target; ?>;
        var api     = '/api/control/targettemp';
        var confirm = $('#confirm');
        var display = $('#temp-display');

        // $.getJSON(api,function(data,status,x)
        // {        
        //     updateTarget(data.target);
        // });

        var updateTarget = function(n)
        {
            console.log(n);        
            target = parseInt(n);
            display.html(n+'&deg;');            
        }

        $('#up').on("click",function(e)
        {
            e.preventDefault();
            updateTarget(target+1);   
            confirm.removeClass('-disabled');
            display.addClass('-changed');
        });

        $('#down').on("click",function(e)
        {
            e.preventDefault();
            updateTarget(target-1);
            confirm.removeClass('-disabled');
            display.addClass('-changed');
        });

        confirm.on("click",function(e)
        {
            e.preventDefault();
            var postdata = {
                time: new Date(),
                target: target
            };
            $.post(api, postdata, function(data, status, xhr)
            {
                if (status == 'success')
                {
                    updateTarget(data.target);
                    confirm.addClass('-disabled');
                    display.removeClass('-changed');
                } else {
                    alert('Sorry there was a problem. Please try again later.');
                }      
            },'json');
        });
    });

</script>