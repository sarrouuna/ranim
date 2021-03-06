/*------------------------------------------------------------------
 [flotchart  Trigger Js]

 Project     :	Fickle Responsive Admin Template
 Version     :	1.0
 Author      : 	AimMateTeam
 URL         :   http://aimmate.com
 Support     :   aimmateteam@gmail.com
 Primary use :   use on flotchart
 -------------------------------------------------------------------*/

jQuery(document).ready(function($) {
    'use strict';

    flot_real_time_chart();
    update_flot_real_time_chart();

    flot_pie_chart();
    flot_pie_chart_changes();

    plotAccordingToChoicesDataSet(); //Series Toggle Widget chart Load
    plotAccordingToChoicesToggle(); //Series Toggle Widget chart toggle button Trigger
});


/**** Flot Real time chart Start ****/
var data = [],
    totalPoints = 500;
function getRandomData() {
    'use strict';

    if (data.length > 0)
        data = data.slice(1);

    // Do a random walk

    while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y = prev + Math.random() * 10 - 5;

        if (y < 0) {
            y = 0;
        } else if (y > 100) {
            y = 99;
        }

        data.push(y);
    }

    // Zip the generated y values with the x values

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
    }

    return res;
}
var plot;
function flot_real_time_chart(){
    'use strict';

    plot = $.plot("#realTimeChart", [ getRandomData() ], {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [
                        {
                            opacity: 0.2
                        },
                        {
                            opacity: 0.1
                        }
                    ]
                }
            },
            shadowSize: 2
        },
        colors: [$greenActive],
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        grid: {
            tickColor: "#f0f0f0",
            borderWidth: 0
        }
    });
}
function update_flot_real_time_chart() {
    'use strict';

    var updateInterval = 300;
    plot.setData([getRandomData()]);

    // Since the axes don't change, we don't need to call plot.setupGrid()

    plot.draw();
    setTimeout(update_flot_real_time_chart, updateInterval);
}
/**** Flot Real time chart End ****/

/**** Flot Pie chart Start ****/
//var $flotPieChart = $('#flotPieChart');
//var pieData = [],
//    series = Math.floor(Math.random() * 6) + 3;
//
//for (var i = 0; i < series; i++) {
//    pieData[i] = {
//        label: "Series" + (i + 1),
//        data: Math.floor(Math.random() * 100) + 1
//    }
//}
//function flot_pie_chart(){
//    'use strict';
//
//    $flotPieChart.unbind();
//
//        $("#title").text("Combined Slice");
//        $("#description").text("Multiple slices less than a given percentage (5% in this case) of the pie can be combined into a single, larger slice.");
//
//        $.plot($flotPieChart, pieData, {
//            series: {
//                pie: {
//                    show: true,
//                    combine: {
//                        color: "#999",
//                        threshold: 0.05
//                    }
//                }
//            },
//            legend: {
//                show: false
//            },
//            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
//        });
//}
function flot_pie_chart_changes(){

    $("#example-1").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Default pie chart");
        $("#description").text("The default pie chart with no options set.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true
                }
            },
            colors: [$lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-2").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Default without legend");
        $("#description").text("The default pie chart when the legend is disabled. Since the labels would normally be outside the container, the chart is resized to fit.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-3").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Custom Label Formatter");
        $("#description").text("Added a semi-transparent background to the labels and a custom labelFormatter function.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.8
                        }
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-4").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Label Radius");
        $("#description").text("Slightly more transparent label backgrounds and adjusted the radius values to place them within the pie.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5
                        }
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-5").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Label Styles #1");
        $("#description").text("Semi-transparent, black-colored label background.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5,
                            color: "#000"
                        }
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-6").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Label Styles #2");
        $("#description").text("Semi-transparent, black-colored label background placed at pie edge.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 3 / 4,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5,
                            color: "#000"
                        }
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-7").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Hidden Labels");
        $("#description").text("Labels can be hidden if the slice is less than a given percentage of the pie (10% in this case).");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-8").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Combined Slice");
        $("#description").text("Multiple slices less than a given percentage (5% in this case) of the pie can be combined into a single, larger slice.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: "#999",
                        threshold: 0.05
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-9").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Rectangular Pie");
        $("#description").text("The radius can also be set to a specific size (even larger than the container itself).");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 500,
                    label: {
                        show: true,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-10").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Tilted Pie");
        $("#description").text("The pie can be tilted at an angle.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    tilt: 0.5,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.8
                        }
                    },
                    combine: {
                        color: "#999",
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-11").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Donut Hole");
        $("#description").text("A donut hole can be added.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true
                }
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });
    });

    $("#example-12").click(function () {

        $flotPieChart.unbind();

        $("#title").text("Interactivity");
        $("#description").text("The pie can be made interactive with hover and click events.");

        $.plot($flotPieChart, pieData, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            colors: [$fillColor2, $lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive]
        });

        $flotPieChart.bind("plothover", function (event, pos, obj) {

            if (!obj) {
                return;
            }

            var percent = parseFloat(obj.series.percent).toFixed(2);
            $("#hover").html("<span style='font-weight:bold; color:" + obj.series.color + "'>" + obj.series.label + " (" + percent + "%)</span>");
        });

        $flotPieChart.bind("plotclick", function (event, pos, obj) {

            if (!obj) {
                return;
            }

            percent = parseFloat(obj.series.percent).toFixed(2);
            alert("" + obj.series.label + ": " + percent + "%");
        });
    });
}
function labelFormatter(label, series) {
    'use strict';

    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}
/**** Flot Pie chart End ****/


/**** Flot Toggle  chart Start ****/
var datasets;
var choiceContainer;
function plotAccordingToChoicesDataSet(){
    'use strict';

    datasets = {
        "usa": {
            label: "USA",
            data: [
                [1988, 483994],
                [1989, 479060],
                [1990, 457648],
                [1991, 401949],
                [1992, 424705],
                [1993, 402375],
                [1994, 377867],
                [1995, 357382],
                [1996, 337946],
                [1997, 336185],
                [1998, 328611],
                [1999, 329421],
                [2000, 342172],
                [2001, 344932],
                [2002, 387303],
                [2003, 440813],
                [2004, 480451],
                [2005, 504638],
                [2006, 528692]
            ]
        },
        "russia": {
            label: "Russia",
            data: [
                [1988, 218000],
                [1989, 203000],
                [1990, 171000],
                [1992, 42500],
                [1993, 37600],
                [1994, 36600],
                [1995, 21700],
                [1996, 19200],
                [1997, 21300],
                [1998, 13600],
                [1999, 14000],
                [2000, 19100],
                [2001, 21300],
                [2002, 23600],
                [2003, 25100],
                [2004, 26100],
                [2005, 31100],
                [2006, 340700]
            ]
        },
        "uk": {
            label: "UK",
            data: [
                [1988, 62982],
                [1989, 62027],
                [1990, 60696],
                [1991, 62348],
                [1992, 58560],
                [1993, 56393],
                [1994, 54579],
                [1995, 50818],
                [1996, 50554],
                [1997, 48276],
                [1998, 47691],
                [1999, 47529],
                [2000, 47778],
                [2001, 48760],
                [2002, 50949],
                [2003, 57452],
                [2004, 60234],
                [2005, 60076],
                [2006, 59213]
            ]
        },
        "germany": {
            label: "Germany",
            data: [
                [1988, 55627],
                [1989, 55475],
                [1990, 58464],
                [1991, 220134],
                [1992, 502436],
                [1993, 47139],
                [1994, 43962],
                [1995, 43238],
                [1996, 42395],
                [1997, 40854],
                [1998, 40993],
                [1999, 41822],
                [2000, 41147],
                [2001, 400474],
                [2002, 40604],
                [2003, 40044],
                [2004, 38816],
                [2005, 38060],
                [2006, 36984]
            ]
        },
        "sweden": {
            label: "Sweden",
            data: [
                [1988, 6402],
                [1989, 6474],
                [1990, 6605],
                [1991, 6209],
                [1992, 6035],
                [1993, 6020],
                [1994, 6000],
                [1995, 6018],
                [1996, 3958],
                [1997, 5780],
                [1998, 5954],
                [1999, 6178],
                [2000, 6411],
                [2001, 5993],
                [2002, 5833],
                [2003, 5791],
                [2004, 5450],
                [2005, 5521],
                [2006, 5271]
            ]
        }

    };
    var i = 0;
    $.each(datasets, function (key, val) {
        val.color = i;
        ++i;
    });

    // insert checkboxes
    choiceContainer = $("#choices");
    $.each(datasets, function (key, val) {
        //<input class="switchCheckBox" type="checkbox" checked data-size="mini">
        choiceContainer.append("<li><input class='switchCheckBox' data-size='mini' type='checkbox' name='" + key +
        "' checked='checked' id='id" + key + "'></input>" +
        "<label class='switch-label' for='id" + key + "'>"
        + val.label + "</label></li>");
    });
    plotAccordingToChoices();
}
function plotAccordingToChoices() {
    'use strict';

    var data = [];
    choiceContainer.find("input:checked").each(function () {
        var key = $(this).attr("name");
        if (key && datasets[key]) {
            data.push(datasets[key]);
        }
    });

    if (data.length > 0) {
        $.plot("#seriesToggle", data, {
            yaxis: {
                min: 0,
                color: '#E3DFD8'
            },
            xaxis: {
                tickDecimals: 0,
                color: '#E3DFD8'
            },
            grid: {
                borderColor: '#E3DFD8'
            },
            colors: [$lightBlueActive, $redActive, $blueActive, $brownActive, $greenActive, $yellowActive]
        });
    }
    $(".switchCheckBox").bootstrapSwitch();
}
function plotAccordingToChoicesToggle(){
    'use strict';

    $(".switchCheckBox").on('switchChange.bootstrapSwitch', function (event, state) {
        plotAccordingToChoices();
    });
}

/**** Flot Toggle  chart End ****/
