

var options =  {
	animationEnabled: true,
    theme: "light2",
    title: {
        text: "Temperatura w przeciągu 5 dni"
    },
    axisX: {
        valueFormatString: "#.#",
    },
    axisY: {
        title: "TEMPERATURA",
        titleFontSize: 24,
        includeZero: false
    },
    data: [{
        type: "spline", 
        yValueFormatString: "###.###",
        xValueFormatString: "#",
        dataPoints: dataPoints
    }]
};

$("#chartContainer").CanvasJSChart(options);