<?php
$pagefile = 'pages/'.$params[0].'-'.$params[1].'.php';
if (file_exists($pagefile)) :
    include($pagefile);
else:
?>
<?php /* <h1 class="page-title"><span class="icon icon-warmth icon--heading"></span>Warmth</h1> */ ?>

<div class="grid--full">
<div class="grid__item">
    
    <div class="module">
        <header class="module__header"><h2 class="heading -turq">Temperature</h2></header>
        <div class="module__main">
            <div class="separate -three">
                <div class="pair">
                    <p class="figure" id="temp-inside">-&deg;C</p>
                    <p class="label brand-face">Inside</p>                    
                </div><!-- 
             --><div class="pair">
                    <p class="figure" id="temp-outside">-&deg;C</p>
                    <p class="label brand-face">Outside</p>                    
                </div><!-- 
             --><div class="pair">
                    <p class="figure" id="temp-target">-&deg;C</p>
                    <p class="label brand-face">Target</p>                    
                </div>
            </div><!-- .temperatures -->
        </div>
        <div class="module__main extra">
            <p class="m--half">How does your home feel right now?</p>
            <ul class="nav options">
                <li><a class="warm" href="/warmth/toohot/">Too warm</a></li>
                <li><a class="right" href="/warmth/justright/?temp=21">Just right</a></li>
                <li><a class="cold" href="/warmth/toocold/">Too cold</a></li>
            </ul>
        </div><!-- .question -->
        <footer class="module__footer"></footer>
    </div><!-- .module -->

</div><div class="grid__item">

    <div class="module">        
        <header class="module__header -sea"><h2 class="heading">Heating status</h2></header>
        <div class="module__main">
            <p>You house is currently <span class="hi" id="boost"></span> which means that it will naturally maintain it's current heat without you needing to do anything.</p>
        </div><!-- .module_main -->
        <footer class="module__footer"><a href="/help/warmth/status" class="button">Find out more<span class="icon icon-arrow-right"></span></a></footer>
    </div><!-- .module -->    

</div><div class="grid__item">

    <div class="module">        
        <header class="module__header -blue"><h3 class="heading">Recent Temperatures</h3></header>        
        <section class="module__full svgGraph">
            <div class="container m--half">
                <svg class="recent_temp chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
            </div>            
        </section><!-- .svgGraph -->
        <footer class="module__footer">
            <div><ul class="key brand-face">
                    <li class="inside_temp"><span class="square"></span>Inside Temperature</li>
                    <li class="outside_temp"><span class="square"></span>Outside Temperature</li>
                </ul>
                <p>You passive house will maintain the heat very efficiently but natural changes in the weather and your activity within the house will cause slight changes in the temperatures you experience.</p>
            </div>
        </footer>
    </div><!-- .module -->    

</div><!-- .grid__item -->
</div><!-- .grid -->

<div class="module coloured colours-mint">        
    
</div><!-- .module -->

<script type="text/javascript" src="/js/actuate/svgGraph.js"></script>
<script type="text/javascript" src="/js/actuate/price.js"></script>
<script type="text/javascript" src="/js/actuate/error.js"></script>
<script type="text/javascript" src="/js/actuate/TemperatureGraph.js"></script>
<script type="text/javascript">
    $(document).on("ready",function(e)
    {
        var RecentTemp = new Backbone.Model;
        RecentTemp.urlRoot = '/api/warmth/recent';
        RecentTemp.fetch({success:function(a,b,c)
        { 
            // no need ... the data is now in the model.
        }}); 

        var recenttempview = new RecentTempView({model:RecentTemp, el:$('.recent_temp')});        
    });
</script>

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

        TargetTempView = TempView.extend({
            render: function() {
                var e = Math.floor(this.model.get("target"));
                this.$el.html(e + "&deg;C")
            }
        });

        insidetempview = new TempView({model:InsideTemp, el:$('#temp-inside')});
        outsidetempview = new TempView({model:OutsideTemp, el:$('#temp-outside')});
        targettempview = new TargetTempView({model:actuate.controls.targettemp, el:$('#temp-target')});

        var WarmingStatus = new Backbone.Model;
        WarmingStatus.urlRoot = '/api/warmth/status';
        WarmingStatus.fetch();

        WarmingStatusView = new StatusView({model:WarmingStatus, el:$('#boost')});

    });   
</script>
<?php endif;?>