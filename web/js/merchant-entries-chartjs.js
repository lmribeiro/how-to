"use strict";
var rtime;
var delta = 500;
var timeout = false;
var pie = null;

function drawSparkLine($elem, data) {
    console.log($elem);
    var ctx = $elem.get(0);
    var pieChartContainer = document.getElementById("pieChart-container");

    var max = data.yAxes.reduce(function(a, b) {
        return Math.max(a, b);
    });

    var stepLimit = 120;

    var ctxCanvas = ctx.getContext("2d");

    var myChart = new Chart(ctxCanvas, {
        type: "line",
        data: {
            labels: data.xAxes,
            datasets: [{
                label: "Statistics",
                data: data.yAxes,

                borderWidth: 2,
                backgroundColor: "#6777ef",
                borderColor: "#6777ef",
                borderWidth: 2.5,
                pointBackgroundColor: "#ffffff",
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: "#f2f2f2"
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: max / 3
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: true
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
            animation: {
                duration: 2000,

                onComplete: function(animation, test) {
                    console.log(animation, test);
                    if (animation.numSteps > stepLimit || animation.numSteps == 0) {
                        var h = $(ctx)
                            .parent()
                            .height();

                        $("#pieChart-container")
                            .css("opacity", "0")
                            .css("min-height", h)
                            .css("min-width", h * 1.6);

                        rtime = new Date();
                        if (timeout === false) {
                            timeout = true;
                            setTimeout(resizeend, delta);
                        }
                    }
                }
            }
        }
    });
}

function resizeend() {
    if (new Date() - rtime < delta) {
        setTimeout(resizeend, delta);
    } else {
        timeout = false;
        if (pie) drawPie(pie.el, pie.response);
        else {
            getDataPie($("#pieChart"), pie => drawPie(pie.el, pie.response));
        }
    }
}

var drawPie = function($elem, data) {
    $("#pieChart-container").css("opacity", "1");
    $("#" + $elem.attr("id")).remove(); // this is my <canvas> element
    $("#pieChart-container").append(
        '<canvas id="' + $elem.attr("id") + '"><canvas>'
    );
    $elem = $("#" + $elem.attr("id"));
    var canvas = $elem.get(0);
    var ctxCanvas = canvas.getContext("2d");
    console.log("data:", data);
    var myChart = new Chart(ctxCanvas, {
        type: "pie",
        data: {
            datasets: [{
                data: data.yAxes,
                backgroundColor: ["#191d21", "#63ed7a", "#ffa426"]
            }],
            labels: data.xAxes
        },
        options: {
            responsive: true,
            legend: false
        }
    });
};

function getHours() {
    const defaultValue = {
        start: "-5",
        limit: "24"
    };
    var read = {};
    for (const key in defaultValue) {
        const value = defaultValue[key];
        let storageValue = localStorage.getItem("sparkline-hour-" + key);
        if (!storageValue) {
            localStorage.setItem("sparkline-hour-" + key, value);
            storageValue = value;
        }
        read[key] = storageValue;
    }
    return read;
}

function setHours(v) {
    for (const key in v) {
        const value = v[key];
        localStorage.setItem("sparkline-hour-" + key, value);
    }
}

var getDataSpark = function($elem) {
    var hours = getHours();
    // console.log("dates", hours.start);
    var day = $elem.data("day");
    var mStart = moment(day + " 00:00").add(hours.start, "hour");
    var start = mStart.format("YYYY-MM-DD HH:mm");
    var end = mStart.add(hours.limit, "hour").format("YYYY-MM-DD HH:mm");

    // console.log("dates", start, end);
    $.ajax({
        type: "get",
        url: $elem.data("url"),
        data: {
            id: $elem.data("id"),
            start: start,
            end: end
        },
        success: function(response) {
            drawSparkLine(
                $elem,
                resp(response, v => v.slice(11, 13) + "h")
            );
        }
    });
};

var resp = function(response, x = v => v, y = v => v) {
    const xAxes = [];
    const yAxes = [];
    for (const key in response) {
        const value = response[key];
        xAxes.push(x(key));
        yAxes.push(y(value));
    }
    const r = { xAxes, yAxes };
    console.log("resp:", r);
    return r;
};

var getDataPie = function($elem, callback = r => r) {
    // console.log("dates", start, end);
    $.ajax({
        type: "get",
        url: $elem.data("url"),
        data: {
            id: $elem.data("id")
        },
        success: function(response) {
            pie = {
                el: $elem,
                response: resp(
                    response,
                    x => x,
                    y => parseInt(y)
                )
            };
            callback(pie);
        }
    });
};

$(document).ready(function() {
    // console.log("ready");
    getDataSpark($("#myChart"));
    getDataPie($("#pieChart"));
    setInterval(() => $("#refresh").click(), 30000);
    setInterval(() => {
        let lastUpdate = $(".last-update").data("title");
        $(".last-update").html(Math.floor(Date.now() / 1000) - lastUpdate);
    }, 1000);
});