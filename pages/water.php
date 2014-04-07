<?php
$pagefile = 'pages/'.$params[0].'-'.$params[1].'.php';
if (file_exists($pagefile)) :
    include($pagefile);
else :
?>
<h2 class="page-title"><span class="icon icon-power icon--heading"></span>Water</h2>

<div class="grid"><div class="grid__item pad-one-half">

    <div class="module usage__graph">
        <header class="module__header -blue m--none"><h3 class="heading">This Month</h3></header>  
        <div class="svgGraph">
            <div class="container m--half">
                <svg class="monthy_usage chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
            </div>            
        </div><!-- .svgGraph -->
        <div class="module__main">
            <ul class="key brand-face">
                <li class="graph--sofar"><span class="square"></span>This month: <span id="sum-this">£24.54</span></li>
                <li class="graph--previous"><span class="square"></span>Last month: <span id="sum-last">£24.54</span></li>
                <li class="graph--average"><span class="square"></span>Average: <span id="sum-ave">£24.54</span></li>
            </ul>
        </div><!-- .module_main -->
        <footer class="module__footer">
            <p>That means that this month you've used enough water to make approximately 1000 cups of tea!</p> 
        </footer>
    </div>

    <div class="module daily__graph">
        <header class="module__header -sea"><h2 class="heading">Today</h2></header>    
        <div class="module__main">
            <p>Today you've used <span class="today-usage hi">litres</span> of water and spent <span class="usage-price hi">&pound;1.25</span>.</p>
        </div><!-- .module_main -->
        <footer class="module__footer">
            <a href="/water/day/today" class="button">More detail<span class="icon icon-arrow-right"></span></a>
        </footer>
    </div>

</div><div class="grid__item pad-one-half">    

    <div class="module daily__graph">
        <header class="module__header -sea"><h2 class="heading">Daily totals</h2></header>
        <div class="module__main">
            <h4 class="brand-face m--half">November</h4>    
            <div class="svgGraph">
                <div class="container">
                    <svg class="chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
                </div>
            </div><!-- .svgGraph -->
        </div><!-- .module_main -->
        <footer class="module__footer"><a href="/notfound/" class="button">Full month<span class="icon icon-arrow-right"></span></a></footer>
    </div>

</div><!-- .grid__item --></div><!-- .grid -->

<script type="text/javascript" src="/js/actuate/svgGraph.js"></script>
<script type="text/javascript" src="/js/actuate/price.js"></script>
<script type="text/javascript" src="/js/actuate/error.js"></script>
<script type="text/javascript" src="/js/actuate/monthUsageGraph.js"></script>
<script type="text/javascript" src="/js/actuate/dayBarChart.js"></script>
<script type="text/javascript">
    
    $(document).on('ready',function()
    {
        $.get('/api/electricity/month/this/', {}, function(data, textStatus, jqXHR)
        {
            var graph = new actuate.monthUsageGraph('.usage__graph .chart', 400, 200);
            graph.setType('water');
            graph.render(data);  

            var chart = new actuate.dayBarChart('.daily__graph .chart', 272, 300, data.this.reverse().slice(0,10));          
            chart.setType('water');
            chart.render();     

            var usage = Math.round(1000*data.this[0].num)/1000;
            $('.today-usage').text(usage+' litres');
            $('.usage-price').text(actuate.price.water(usage));    

            $('#sum-this').text(actuate.price.water(data.sums.this));
            $('#sum-last').text(actuate.price.water(data.sums.last));
            $('#sum-ave').text(actuate.price.water(data.sums.average));

        },'json');

    });

</script>
<?php endif; ?>