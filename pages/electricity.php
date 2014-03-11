<?php
$pagefile = 'pages/'.$params[0].'-'.$params[1].'.php';
if (file_exists($pagefile)) :
    include($pagefile);
else :
?>
<h2 class="page-title"><span class="icon icon-bulb icon--heading"></span>Electricity</h2>

<div class="grid"><div class="grid__item pad-one-half">

    <div class="module usage__graph">
        <header class="module__header -mustard"><h3 class="heading">This Month</h3></header>
        <div class="module__main">
            <section class="module__full svgGraph">
            <div class="container m--half">
                <svg class="chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
            </div>
            <ul class="key brand-face">
                <li class="graph--sofar"><span class="square"></span>This month: <span id="sum-this">£24.54</span></li>
                <li class="graph--previous"><span class="square"></span>Last month: <span id="sum-last">£24.54</span></li>
                <li class="graph--average"><span class="square"></span>Average: <span id="sum-ave">£24.54</span></li>
            </ul>
        </section><!-- .svgGraph -->
        </div><!-- .module_main -->
        <footer class="module__footer"><p style="margin-top:12px">The graph shows what you've used so far this month (in yellow) with last months usage (in white) behind.</p></footer>
    </div>

    <div class="module -new daily__graph coloured colours-maroon">
        <h3 class="heading">Today</h3>        
        <p>Today you've used <span class="today-usage em"> -- </span> of electricity and spent <span class="usage-price em">&pound;1.25</span>.</p>
        <a href="/electricity/day/today" class="button">More detail<span class="icon-arrow-right"></span></a>
    </div>

</div><div class="grid__item pad-one-half">    

    <div class="module coloured colours-mint daily__graph">
        <h2 class="heading">Daily totals</h2>    
        <h4 class="brand-face m--half">November</h4>    
        <div class="svgGraph">
            <div class="container">
                <svg class="chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
            </div>
        </div><!-- .svgGraph -->
        <a href="/notfound/" class="button">Full month<span class="icon-arrow-right"></span></a>
    </div>

</div><!-- .grid__item --></div><!-- .grid -->

<script type="text/javascript" src="/js//actuate/svgGraph.js"></script>
<script type="text/javascript" src="/js//actuate/price.js"></script>
<script type="text/javascript" src="/js//actuate/error.js"></script>
<script type="text/javascript" src="/js//actuate/monthUsageGraph.js"></script>
<script type="text/javascript" src="/js//actuate/dayBarChart.js"></script>
<script type="text/javascript">
    
    $(document).on('ready',function()
    {
        $.get('/api/electricity/month/this/', {}, function(data, textStatus, jqXHR)
        {
            var graph = new actuate.monthUsageGraph('.usage__graph .chart', 400, 200);
            graph.setType('electricity');
            graph.render(data);  

            var chart = new actuate.dayBarChart('.daily__graph .chart', 272, 300,data.this.reverse().slice(0,10));          
            chart.setType('electricity');
            chart.render();

            var usage = Math.round(100*data.this[0].num)/100;
            $('.today-usage').text(usage+' kWh');
            $('.usage-price').text(actuate.price.electric(usage));

            $('#sum-this').text(actuate.price.electric(data.sums.this));
            $('#sum-last').text(actuate.price.electric(data.sums.last));
            $('#sum-ave').text(actuate.price.electric(data.sums.average));

        },'json');

    });

</script>
<?php endif; ?>