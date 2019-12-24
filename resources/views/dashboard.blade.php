<!-- Styles -->
<!-- Resources -->
<!-- Chart code -->
<script>
    var e = {!!$namapeserta!!};
    var e2 = {!!$namapeserta!!};
    var e3 = {!!$namapesertaklaim!!};
    // var z = d[0].merk;
    // var q = ["X","Y"];
    var f = {!!$totalplafon!!};
    var f2 = {!!$totalpremi!!};
    // var z = d[0].merk;
    // var q = ["X","Y"];
    // var z = d[0].merk;
    // var q = ["X","Y"];
    var f3 = {!!$totalklaim!!};
    var g = ["#FF66FF", "#FF6600","#FF0000", "#FFFF00","#FFFFF0","#FF00FF","#FF0099"];
    var g2 = ["#FF66FF", "#FF6600"];
    var g4 = ["#FF66FF"];

//     function getRandomColor() {
//   var letters = '0123456789ABCDEF';
//   var color = '#';
//   for (var i = 0; i < 6; i++) {
//     color += letters[Math.floor(Math.random() * 16)];
//   }
//   return color;
// }      
// var g2 = []; 
// function setRandomColor() {
  
//   var  y = getRandomColor();
//   g2 = y;
// }
    // alert(e3.length);
    var chartdata = [];
    if(e.length > 0){
        for(var i=0; i<e.length; i++){
            chartdata.push({
            "country": e[i],
            "visits": f[i],
            "color": g[i]  
            })
        }
    }else{
            chartdata.push({
                "country": "Data Belum Ada",
                "visits": 0,  
            })
    }
    var chartdata2 = [];
    if(e2.length >0){
        for(var i=0; i<e2.length; i++){
            chartdata2.push({
            "country": e2[i],
            "visits": f2[i],
            "color": g[i]  
            })
        }
    }else{
            chartdata2.push({
                "country": "Data Belum Ada",
                "visits": 0, 
            })
    }
    var chartdata3 = [];
    if(e3.length >0 ){
        for(var i=0; i<e3.length; i++){
            chartdata3.push({
            "country": e3[i],
            "visits": f3[i],
            "color": g[i]  
            })
        }
    }else{
        chartdata3.push({
            "country": "Data Belum Ada",
            "visits": 0,
            })
    }
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": chartdata,
    "valueAxes": [{
        "position": "left",
        "title": "Jumlah Premi"
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "visits"
    }],
    "depth3D": 20,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": true,
        "cursorAlpha": 0,
        "zoomable": true
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 90
    },
    "export": {
    	"enabled": false
     }

});


var chart2 = AmCharts.makeChart("chartdiv2", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": chartdata2,
    "valueAxes": [{
        "position": "left",
        "title": "Jumlah Plafon"
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "visits"
    }],
    "depth3D": 20,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": true,
        "cursorAlpha": 0,
        "zoomable": true
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 90
    },
    "export": {
    	"enabled": false
     }

});

var chart3 = AmCharts.makeChart("chartdiv3", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": chartdata3,
    "valueAxes": [{
        "position": "left",
        "title": "Jumlah Klaim"
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "visits"
    }],
    "depth3D": 20,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": true,
        "cursorAlpha": 0,
        "zoomable": true
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 90
    },
    "export": {
    	"enabled": false
     }

});

// var arr = {!!$nilai_tahunperbulan!!};
  
var v ={!!$nilai_tahunperbulan!!};

Highcharts.stockChart('line_chart_range', {

    rangeSelector: {
        buttonTheme: { // styles for the buttons
            fill: 'none',
            stroke: 'none',
            'stroke-width': 0,
            r: 8,
            style: {
                color: '#039',
                fontWeight: 'bold'
            },
            states: {
                hover: {
                },
                select: {
                    fill: '#039',
                    style: {
                        color: 'white'
                    }
                }
                // disabled: { ... }
            }
        },
        inputBoxBorderColor: 'gray',
        inputBoxWidth: 120,
        inputBoxHeight: 18,
        inputStyle: {
            color: '#039',
            fontWeight: 'bold'
        },
        labelStyle: {
            color: 'silver',
            fontWeight: 'bold'
        },
        selected: 1
    },

    series: v
});
</script>


<div class="m-content">
                        <div class="row">
                            <div class="col-lg-4" >
                                <!--begin::Portlet-->
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text" align="center">
                                                    <!-- {{$nama}} -->
                                                    Total Premi Gross
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div id="chartdiv" style="height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" >
                                <!--begin::Portlet-->
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text" align="center">
                                                Total Plafon 
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div id="chartdiv2" style="height: 500px; "></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" >
                                <!--begin::Portlet-->
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text" align="center">
                                                    Total Pengajuan Klaim
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div id="chartdiv3" style="height: 500px; "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div id="line_chart_range" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
