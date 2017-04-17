var chart = AmCharts.makeChart( "pie_chart", {
  "type": "pie",
  "theme": "light",
  "colors": [
		"#00cc00",
		"#cc0000"
	],
  "dataProvider": [ {
    "income": "Income",
    "expense": 500
  }, {
    "income": "Expense",
    "expense": 1000
  } ],
  "valueField": "expense",
  "titleField": "income",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "pie_chart2", {
  "type": "serial",
  "theme": "light",
  "colors": [
		"#3366cc",
		"#dc3912",
		"#ff9900"
	],
  "legend": {
        "horizontalGap": 0,
        "maxColumns": 1,
        "position": "right",
		"useGraphSettings": true,
		"markerSize": 10
    },
  "marginRight": 10,
  "dataProvider": [{
    "service": "Advertising, marketing and Promotion",
    "june": 160,
	"july": 160,
	"august": 200,
  }],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": ""
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillAlphas": 1,
    "lineAlpha": 1,
	"id": "AmGraph-1",
	"title": "June",
    "type": "column",
    "valueField": "june"
  }, {
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillAlphas": 1,
    "lineAlpha": 1,
	"id": "AmGraph-2",
	"title": "July",
	"type": "column",
	"valueField": "july"
  }, {
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillAlphas": 1,
    "lineAlpha": 1,
	"id": "AmGraph-3",
	"title": "August",
	"type": "column",
	"valueField": "august"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "service",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 0
  },
  "export": {
    "enabled": true
  }

});