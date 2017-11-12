$(function() {
    $.ajax({

        url: 'http://localhost/ecat/charts/preleft.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Frequency of Pre Visual Acuity of Eye Patients (Left Eye)",
                "bgcolor": "FFFFFF",
				"theme": "zune",
				"showvalues": "1",
				"showpercentvalues": "1",
				"showborder": "0",
				"showplotborder": "0",
				"showlegend": "1",
				"legendborder": "0",
				"legendposition": "bottom",
				"enablesmartlabels": "1",
				"use3dlighting": "0",
				"showshadow": "0",
				"legendbgcolor": "#CCCCCC",
				"legendbgalpha": "20",
				"legendborderalpha": "0",
				"legendshadow": "0",
				"legendnumcolumns": "3"
            };

            apiChart = new FusionCharts({
                type: 'pie2d',
                renderAt: document.getElementById("leftpre"),
                width: '400',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
	
});
$(function() {
    $.ajax({
        url: 'http://localhost/ecat/charts/preright.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Frequency of Pre Visual Acuity of Eye Patients (Right Eye)",
                "bgcolor": "FFFFFF",
				"theme": "zune",
				"showvalues": "1",
				"showpercentvalues": "1",
				"showborder": "0",
				"showplotborder": "0",
				"showlegend": "1",
				"legendborder": "0",
				"legendposition": "bottom",
				"enablesmartlabels": "1",
				"use3dlighting": "0",
				"showshadow": "0",
				"legendbgcolor": "#CCCCCC",
				"legendbgalpha": "20",
				"legendborderalpha": "0",
				"legendshadow": "0",
				"legendnumcolumns": "3"
            };

            apiChart = new FusionCharts({
                type: 'pie2d',
                renderAt: document.getElementById("rightpre"),
                width: '400',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
	
});
$(function() {
    $.ajax({

        url: 'http://localhost/ecat/charts/postleft.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Frequency of Post Visual Acuity of Eye Patients (Left Eye)",
                "bgcolor": "FFFFFF",
				"theme": "zune",
				"showvalues": "1",
				"showpercentvalues": "1",
				"showborder": "0",
				"showplotborder": "0",
				"showlegend": "1",
				"legendborder": "0",
				"legendposition": "bottom",
				"enablesmartlabels": "1",
				"use3dlighting": "0",
				"showshadow": "0",
				"legendbgcolor": "#CCCCCC",
				"legendbgalpha": "20",
				"legendborderalpha": "0",
				"legendshadow": "0",
				"legendnumcolumns": "3"
            };

            apiChart = new FusionCharts({
                type: 'pie2d',
                renderAt: document.getElementById("leftpost"),
                width: '400',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
	
});
$(function() {
    $.ajax({
        url: 'http://localhost/ecat/charts/postright.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Frequency of Post Visual Acuity of Eye Patients (Right Eye)",
				"bgcolor": "FFFFFF",
				"theme": "zune",
				"showvalues": "1",
				"showpercentvalues": "1",
				"showborder": "0",
				"showplotborder": "0",
				"showlegend": "1",
				"legendborder": "0",
				"legendposition": "bottom",
				"enablesmartlabels": "1",
				"use3dlighting": "0",
				"showshadow": "0",
				"legendbgcolor": "#CCCCCC",
				"legendbgalpha": "20",
				"legendborderalpha": "0",
				"legendshadow": "0",
				"legendnumcolumns": "3"
            };

            apiChart = new FusionCharts({
                type: 'pie2d',
                renderAt: document.getElementById("rightpost"),
                width: '400',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
	
});