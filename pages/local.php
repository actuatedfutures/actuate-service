<h1 class="page-title"><span class="icon icon-location"></span>Local</h1>

<div class="module module__map">
    <div class="container" id="map-container">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1189.7297225659456!2d-1.472868408699418!3d53.3887207421968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2suk!4v1385991355976" width="100%" height="100%" frameborder="0" style="border:0"></iframe> -->
    </div>
    <a href="#" id="showBusStops" class="button">Show local bus stops<span class="icon icon-arrow-up"></span></a>
</div>

<div class="module coloured colours-mustard">
    <h2 class="heading">Facebook/Twitter</h2>
    <div class="media">
       <img src="http://placekitten.com/50/50" alt="" class="media__img">
       <p class="media__body"><b>bobbyfischer43</b><br />Old Kent Road is rammed this morning a lorry overturned on Coverhill Road and there's milk everywhere!!</p>
    </div>
    <div class="media">
       <img src="http://placekitten.com/51/51" alt="" class="media__img">
       <p class="media__body"><b>bspassky37</b><br />Gah! missed the train again. The 43 bus never gets you there on time </p>
    </div>
</div>

<div class="grid">
    <div class="grid__item pad-one-half">
        <div class="module coloured colours-sea">
            <h3 class="heading">Buses</h3>    
            <div class="busstop_data"></div>
        </div>
    </div><!--
 --><div class="grid__item pad-one-half">
        <div class="module coloured colours-maroon">
            <h3 class="heading">Trains</h3>    
            <div class="station_data"></div>
        </div>
    </div>
</div>

<div class="module coloured colours-turq">
    <h2 class="heading">Community</h2>
    <p class="m--half">Take a look at our message boards to see how other Little Kelham residents are helping each other to live smarter</p>
    <a href="/weather/" class="button">Lifts wanted / offered<span class="icon-arrow-right"></span></a>
    <a href="/weather/" class="button">Parking wanted / offered<span class="icon-arrow-right"></span></a>
    <a href="/weather/" class="button">Regular journeys<span class="icon-arrow-right"></span></a>
</div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="/js//actuate/busData.js"></script>
<script src="/js//actuate/trainData.js"></script>
<script type="text/javascript">

    $(document).on('ready',function()
    {
        var bus = new actuate.busData();
        bus.init();
        bus.showBusStopList();

        $('#showBusStops').on("click",function(e)
        {
            e.preventDefault();
            bus.showBusStopsOnMap();
        });

        var train = new actuate.trainData();
        train.init();
        train.showTrains();
    }); 


</script>