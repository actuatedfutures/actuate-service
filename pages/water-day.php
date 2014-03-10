<?php

if (!isset($params[2]) || $params[2] == 'today'){
    $date = date('d-m-Y',time());
    $title = 'Today';
} else {
    $date = $params[2];
    $t = strtotime($date);
    $title = 'for '.date('jS F',$t);
}

?>

<h2 class="page-title"><span class="icon icon-water icon--heading"></span>Water <?php echo $title; ?></h2>

<div class="module coloured colours-maroon usage__graph__today">
    <h2 class="heading">So Far Today</h2>    
    <p class="m--half">You've used <span class="hi today">14</span> today. Below this is broken into 15min chunks</p>
    <div class="svgGraph dayGraph">
        <div class="container">
            <svg class="chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
        </div>
    </div><!-- .svgGraph -->
</div>

<div class="module coloured colours-sea">
    <h2 class="heading">Please Compare</h2>    
    <p class="m--half">Now let's see how that compares to what you used yesterday and what you use on average</p>
    <div class="svgGraph todayCompare">
        <div class="container">
            <svg class="chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet">
                <defs>
                    <pattern id="waves" x="0" y="-0.05" width="1" height="1" patternContentUnits="objectBoundingBox" patternTransform="scale(0.20,1.1)">
                        <!-- <path class="lk-maroon" d="M10 10c-5.523 0-10-4.477-10-10v20h20v-20c0 5.523-4.477 10-10 10z"/> -->
                        <path class="lk-blue" d="M0.5 0.5c-0.28 0-0.5-0.22-0.5-0.5v1h1v-1c0 0.28-0.22 0.5-0.5 0.5z"/>
                    </pattern>
                </defs>
                <!-- <rect fill="url(#waves)" stroke="black" x="0" y="0" width="320" height="200"/> -->
            </svg>
        </div>
    </div><!-- .svgGraph -->
</div>

<?php /*
<div class="module coloured colours-sea">
    <h2 class="heading--noline">Break it down</h2>    
    <div class="svgGraph breakDown" style="width:50%;margin:0 auto;">
        <div class="container">
            <svg class="chart" xmlns="http://www.w3.org/2000/svg" width="100%" preserveAspectRatio="xMidYMin meet"></svg>
        </div>
    </div><!-- .svgGraph -->
</div>
*/ ?>

<script type="text/javascript" src="/js//actuate/svgGraph.js"></script>
<script type="text/javascript" src="/js//actuate/todayCompareGraph.js"></script>
<script type="text/javascript" src="/js//actuate/dayByHoursGraph.js"></script>
<script type="text/javascript" src="/js//actuate/usagePie.js"></script>
<script type="text/javascript">

    $(document).on('ready',function()
    {
        var todayTotal = 0;

        $.get('/api/electricity/day/<?php echo $date; ?>/', {}, function(data, textStatus, jqXHR)
        {
            todayTotal = data.total;
            $('.usage__graph__today .hi').text(Math.round(1000*todayTotal)/1000+' litres');

            var diff = data.series[0].num;
            
            var newd = [];
            newd[0] = {};
            newd[0].num = data.series[0].num;
            newd[0].time = data.series[0].time;

            for (var i = 0; i < data.series.length; i++) {
                if (i > 0)
                {
                    data.series[i].num += diff;                                    
                    newd[i] = {};
                    newd[i].num = Math.max(0,data.series[i].num - data.series[i-1].num);
                    newd[i].time = data.series[i].time;
                }
            };

            // log('newd',newd);     

            // show the graph. /js//actuate/dayByHoursGraph.js
            var graph = new actuate.dayByHoursGraph('.dayGraph .chart',320,120);
            graph.render(newd);
            // now do that next one.
            doDayComparison();

        },'json');

        function doDayComparison()
        {
            $.get('/api/electricity/day/average/<?php echo $date; ?>/', {}, function(data, textStatus, jqXHR)
            {
                // prepare the data a little.                
                var newd = [];
                newd[0] = {label:'Today',num:Math.round(100*todayTotal)}
                newd[1] = {label:'Yesterday',num:Math.round(100*data.yesterday)}
                newd[2] = {label:'Average',num:Math.round(100*data.average)}
                // show the graph. /js//actuate/dayComparegraph.js
                var compareGraph = new actuate.dayCompareGraph('.todayCompare .chart',320,200);
                compareGraph.setType('water');
                compareGraph.render(newd);
                
            },'json');
        }

        // var piedata = [
        //      {label:'shower',num:12}
        //     ,{label:'washing machine',num:34}
        //     ,{label:'toilet',num:23}
        //     ,{label:'cuppa tea',num:76}
        //     ,{label:'watering garden',num:54}
        //     ,{label:'dish washer',num:45}
        //     ,{label:'dish washer',num:45}
        //     ];

        // var pie = new actuate.usagePie('.breakDown .chart',320,320);
        // pie.render(piedata);
    }); 

</script>