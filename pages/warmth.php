<?php
$pagefile = 'pages/'.$params[0].'-'.$params[1].'.php';
if (file_exists($pagefile)) :
    include($pagefile);
else:
?>
<h1 class="page-title"><span class="icon icon-warmth icon--heading"></span>Warmth</h1>

<div class="grid">
<div class="grid__item pad-one-half">
    
    <div class="module coloured colours-maroon">
        <h2 class="heading">Temperature</h2>
        <div class="separate grid--full">
            <div class="one-of grid__item lap-one-third">
                <p class="label brand-face">Inside</p>
                <p class="figure" id="temp-inside">-&deg;C</p>
            </div><!-- 
         --><div class="grid__item lap-one-third">
                <p class="label brand-face">Outside</p>
                <p class="figure" id="temp-outside">-&deg;C</p>
            </div><!-- 
         --><div class="grid__item lap-one-third">
                <p class="label brand-face">Target</p>
                <p class="figure" id="temp-target">-&deg;C</p>
            </div>
        </div><!-- .temperatures -->
    </div><!-- .module -->

</div><div class="grid__item pad-one-half">

    <div class="module coloured colours-mustard">        
        <p>You house is currently:</p>
        <p class="hi" id="boost"><span class="slabtext">–</span></p>
        <a href="/help/warmth/status" class="button">What does this mean<span class="icon-arrow-right"></span></a>
    </div><!-- .module -->    

</div><!-- .grid__item -->
</div><!-- .grid -->

<div class="module coloured colours-mint">        
    <p>How does your home feel right now?</p>
    <div class="linkgroup goldilocks">
        <a class="warm" href="/warmth/toohot/">Too warm</a>
        <a class="right" href="/warmth/justright/?temp=21">Just right</a>
        <a class="cold" href="/warmth/toocold/">Too cold</a>
    </div>
</div><!-- .module -->

<script type="text/javascript">
    $(document).on('ready',function()
    {                       

        var InsideTemp = new Backbone.Model;
        InsideTemp.urlRoot = '/api/warmth/temperature/inside';
        InsideTemp.fetch({success:function(a,b,c)
        { 
            a.set({'temperature':b.now});
        }}); 

        var OutsideTemp = new Backbone.Model;
        OutsideTemp.urlRoot = '/api/warmth/temperature/outside';
        OutsideTemp.fetch({success:function(a,b,c)
        { 
            a.set({'temperature':b.now});
        }}); 

        var TargetTemp = new Backbone.Model;
        TargetTemp.urlRoot = '/api/control/targettemp/';
        TargetTemp.fetch({success:function(a,b,c)
        { 
            a.set({'temperature':b.target});
        }}); 

        InsideTempView = new TempView({model:InsideTemp, el:$('#temp-inside')});
        OutsideTempView = new TempView({model:OutsideTemp, el:$('#temp-outside')});
        TargetTempView = new TempView({model:TargetTemp, el:$('#temp-target')});

        var WarmingStatus = new Backbone.Model;
        WarmingStatus.urlRoot = '/api/warmth/status';
        WarmingStatus.fetch();

        WarmingStatusView = new StatusView({model:WarmingStatus, el:$('#boost')});

    });   
</script>
<?php endif;?>