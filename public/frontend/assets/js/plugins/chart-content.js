window.onload = function () {
    var getData = $('#chartContainer').data('value');
    var getSeatData = $('#seatChartContainer').data('value');
    var getGenderData = $('#genderChartContainer').data('value');
    var getAgeData = $('#ageChart').data('value');
    var pdata = getData;
    var seatdata = getSeatData;
    var genderdata = getGenderData;
    var agedata = getAgeData;

    var options = {
        title: {
            text: ""
        },
        animationEnabled: true,
        data: [{
            type: "doughnut",
            startAngle: 230,
            toolTipContent: "<b>{label}</b>: {y}%",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints:pdata
        }]
    };



    var seoptions = {
        title: {
            text: ""
        },
        animationEnabled: true,
        data: [{
            type: "column",
            startAngle: 20,
            indexLabelFontSize: 16,
            dataPoints: seatdata
        }]
    };
    var genderoptions = {
        title: {
            text: ""
        },
        animationEnabled: true,
        data: [{
            type: "column",
            indexLabelFontSize: 16,
            dataPoints: genderdata
        }]
    };
    var ageoptions = {
        title: {
            text: ""
        },
        animationEnabled: true,
        data: [{
            type: "column",
            indexLabelFontSize: 16,
            dataPoints: agedata
        }]
    };


    $("#chartContainer").CanvasJSChart(options);
    $("#seatChartContainer").CanvasJSChart(seoptions);
    $("#genderChartContainer").CanvasJSChart(genderoptions);
    $("#ageChart").CanvasJSChart(ageoptions);
}
