var labels = [];

var optionsChart = {
    layout: {
        padding: {
            bottom: -1,
            left: -1
        }
    },
    legend: {
        display: false
    },
    scales: {
        yAxes: [{
            gridLines: {
                display: false,
                drawBorder: false,
            },
            ticks: {
                beginAtZero: true,
                display: false
            }
        }],
        xAxes: [{
            gridLines: {
                drawBorder: false,
                display: false,
            },
            ticks: {
                display: false
            }
        }]
    },
};

var id_users_chart = document.getElementById("users-chart");
if (id_users_chart != null) {
    var users_chart = id_users_chart.getContext('2d');
    var users_chart_bg_color = users_chart.createLinearGradient(0, 0, 0, 100);
    users_chart_bg_color.addColorStop(0, 'rgba(215, 54, 39, .35)');
    users_chart_bg_color.addColorStop(1, 'rgba(215, 54, 39, 0)');

    var userChart = new Chart(users_chart, {
        type: 'line',
        data: {
            datasets: [{
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: users_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(215,54,39,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(215,54,39,1)',
            }]
        },
        options: optionsChart
    });
}



var id_payments_chart = document.getElementById("payments-chart");
if (id_payments_chart != null) {
    var payments_chart = id_payments_chart.getContext('2d');
    var payments_chart_bg_color = payments_chart.createLinearGradient(0, 0, 0, 100);
    payments_chart_bg_color.addColorStop(0, 'rgba(215,54,39,.35)');
    payments_chart_bg_color.addColorStop(1, 'rgba(215,54,39,0)');

    var paymentsChart = new Chart(payments_chart, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: payments_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(215,54,39,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(215,54,39,1)',
            }]
        },
        options: optionsChart
    });
}

var id_refunds_chart = document.getElementById("refunds-chart");
if (id_refunds_chart != null) {
    var refunds_chart = id_refunds_chart.getContext('2d');
    var refunds_chart_bg_color = refunds_chart.createLinearGradient(0, 0, 0, 100);
    refunds_chart_bg_color.addColorStop(0, 'rgba(215,54,39,.35)');
    refunds_chart_bg_color.addColorStop(1, 'rgba(215,54,39,0)');

    var refundsChart = new Chart(refunds_chart, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: refunds_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(215,54,39,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(215,54,39,1)',
            }]
        },
        options: optionsChart
    });
}

var id_bracelets_chart = document.getElementById("bracelets-chart");
if (id_bracelets_chart != null) {
    var bracelets_chart = id_bracelets_chart.getContext('2d');
    var bracelets_chart_bg_color = bracelets_chart.createLinearGradient(0, 0, 0, 100);
    bracelets_chart_bg_color.addColorStop(0, 'rgba(215,54,39,.35)');
    bracelets_chart_bg_color.addColorStop(1, 'rgba(215,54,39,0)');

    var braceletsChart = new Chart(bracelets_chart, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: bracelets_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(215,54,39,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(215,54,39,1)',
            }]
        },
        options: optionsChart
    });
}