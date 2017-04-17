var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "colors": [
		"#00cc00",
		"#cc0000"
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
    "month": "June",
    "income": 160,
	"expense": 200,
  }, {
    "month": "July",
    "income": 120,
	"expense": 160,
  }, {
    "month": "August",
    "income": 50,
	"expense": 160,
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
	"title": "Income",
    "type": "column",
    "valueField": "income"
  }, {
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillAlphas": 1,
    "lineAlpha": 1,
	"id": "AmGraph-2",
	"title": "Expense",
	"type": "column",
	"valueField": "expense"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 0
  },
  "export": {
    "enabled": true
  }

});

var chart = AmCharts.makeChart("chartdiv2", {
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
    "service": "Accounting / Legal",
    "june": 160,
	"july": 160,
	"august": 200,
  }, {
    "service": "Electrical Services",
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