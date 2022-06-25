anychart.onDocumentReady(function () {

    // set the data
    var data = [

        { x: "Soda", value: 20 },
        { x: "Dairy Bevereage", value: 30 },
        { x: "Energy Drink", value: 10 },
        { x: "Syrup", value: 50 },
        { x: "Tea", value: 20 },

    ];

    // create a pie chart and set the data
    chart = anychart.pie(data);


    var palette = anychart.palettes.rangeColors();
    palette.items([{ color: '#ffab19' }, { color: '#ffce79' },
    { color: '#9656c3' }, { color: '#c887ff' },
    { color: '#822121' },]);
    // set chart palette
    chart.palette(palette);


    chart.labels().position("outside");
    chart.labels().format(function () {
        var percentOfTotal = (this.getData("value") * 100) / this.getStat("sum");

        return "<span style='color:#663399;font-size:20px'>" + this.x + ": " + percentOfTotal.toFixed(1) + "%";
    })
    chart.labels().useHtml(true);
    chart.labels().format()

    chart
        .legend(false)
        .radius(150)
        .startAngle(80)
        .innerRadius(65);

    chart.legend().itemsLayout("vertical");

    chart.container('statistics-pie');
    chart.draw();

    ////////////////
    chartmobile = anychart.pie(data);
    chartmobile.palette(palette);

    chartmobile.labels().useHtml(true);
    chartmobile.labels().format()

    chartmobile
        .legend(true)
        .radius(150)
        .startAngle(80)
        .innerRadius(65);

    chartmobile.container('statistics-pie-mobile');
    chartmobile.draw();

});