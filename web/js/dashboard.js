function previousPeriod(step=1) {
    let rangeperiod = $('#reportrange').data('daterangepicker');
    let start = rangeperiod.startDate;
    let end = rangeperiod.endDate;

    if (moment(start).isSame(end, 'day')) {
        start.subtract(step, 'days');
        end.subtract(step, 'days');
    } else if (end.diff(start, 'days') == 6 && moment(start).isSame(start.day(1)) && moment(end).isSame(end.day(0))) {
        start.subtract(1, 'week');
        end.subtract(1, 'week');
    } else if (moment(start).isSame(start.clone().startOf('month')) && moment(end).isSame(start.clone().endOf('month'))) {
        start.subtract(1, 'month');
        end = start.clone().endOf('month');
    } else if (moment(start).isSame(start.clone().startOf('year')) && moment(end).isSame(start.clone().endOf('year'))) {
        start.subtract(1, 'year');
        end = start.clone().endOf('year');
    } else {
        let diff = end.diff(start, 'days') + 1;
        start.subtract(diff, 'days');
        end.subtract(diff, 'days');
    }

    return cb(start, end);
}

function nextPeriod(step=1) {
    let rangeperiod = $('#reportrange').data('daterangepicker');
    let start = rangeperiod.startDate;
    let end = rangeperiod.endDate;

    // if is day
    if (moment(start).isSame(end, 'day')) {
        start.add(step, 'days');
        end.add(step, 'days');
    } else if (end.diff(start, 'days') == 6 && moment(start).isSame(start.day(1)) && moment(end).isSame(end.day(0))) {
        start.add(1, 'week');
        end.add(1, 'week');
    } else if (moment(start).isSame(start.clone().startOf('month')) && moment(end).isSame(start.clone().endOf('month'))) {
        start.add(1, 'month');
        end = start.clone().endOf('month');
    } else if (moment(start).isSame(start.clone().startOf('year')) && moment(end).isSame(start.clone().endOf('year'))) {
        start.add(1, 'year');
        end = start.clone().endOf('year');
    } else {
        let diff = end.diff(start, 'days') + 1;
        start.add(diff, 'days');
        end.add(diff, 'days');
    }

    return cb(start, end);
}

function cb(start, end, refresh = true) {
    if(refresh==null){
        refresh=true
    }
    $('#reportrange').data('daterangepicker').setStartDate(start.format('DD-MM-YYYY'));
    $('#reportrange').data('daterangepicker').setEndDate(end.format('DD-MM-YYYY'));

    $('#refresh').data('params', { period_start: start.format('YYYY-MM-DD'), period_end: end.format('YYYY-MM-DD') });

    $("#refresh").data('params').period_start;
    $("#refresh").data('params').period_end;

    if(start.format('YYYY') != moment().format('YYYY')){
        $('#reportrange span').html(start.format('D MMM YYYY'));
    } else if (start.format('D MMM') == end.format('D MMM')) {
        $('#reportrange span').html(start.format('D MMM'));
    } else {
        $('#reportrange span').html(start.format('D MMM') + ' - ' + end.format('D MMM'));
    }

    if (refresh) {
        $("#refresh").data('params').period_start;
        $("#refresh").data('params').period_end;
        $("#refresh").click();
    }
}

$(document).ready(function () {
    $.pjax.defaults.scrollTo = false;
    document.addEventListener("keydown", keyDownCommand, false);
    document.addEventListener("keyup", keyUpCommand, false);
    var counterKey=0
    function keyDownCommand(e) {
        counterKey++;
        //console.log(e,counterKey)
        
    }
    function keyUpCommand(e) {
       
        //console.log(counterKey)
        var keyCode = e.keyCode;
        if(keyCode==39) {
            nextPeriod(counterKey);
        } else if(keyCode==37){
            previousPeriod(counterKey);
        } 
        counterKey=0
    }
    setInterval(() => $("#refresh").click(), 30000);
    setInterval(() => {
        let lastUpdate = $('.last-update').data('title');
        $('.last-update').html(Math.floor(Date.now() / 1000) - lastUpdate);
    }, 1000);

    var start = moment(dateStart);
    var end = moment(dateEnd);

    $('#reportrange').daterangepicker({
        ranges: {
            [today]: [moment(), moment()],
            [yesterday]: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            // [thisweek]: [moment().startOf('week'), moment().endOf('week')],
            // [previousweek]: [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')],
            // [thismonth]: [moment().startOf('month'), moment().endOf('month')],
            // [previousmonth]: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        showDropdowns: true,
        applyButtonClasses: 'btn-outline-success',
        buttonClasses: "btn btn-sm",
        locale: {
            format: "DD-MM-YYYY",
            separator: " - ",
            applyLabel: applyLabel,
            cancelLabel: cancelLabel,
            fromLabel: fromLabel,
            toLabel: toLabel,
            customRangeLabel: customRangeLabel,
            weekLabel: weekLabel,
            daysOfWeek: moment.weekdaysShort(),
            monthNames: moment.months(),
            firstDay: 1
        },
        start: start,
        end: end
    }, cb);

    cb(start, end,false);

    $(document).on('pjax:end', function () {
        var start = moment(dateStart);
        var end = moment(dateEnd);

        $('#reportrange').daterangepicker({
            ranges: {
                [today]: [moment(), moment()],
                [yesterday]: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                // [thisweek]: [moment().startOf('week'), moment().endOf('week')],
                // [previousweek]: [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')],
                // [thismonth]: [moment().startOf('month'), moment().endOf('month')],
                // [previousmonth]: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            showDropdowns: true,
            applyButtonClasses: 'btn-outline-success',
            buttonClasses: "btn btn-sm",
            locale: {
                format: "DD-MM-YYYY",
                separator: " - ",
                applyLabel: applyLabel,
                cancelLabel: cancelLabel,
                fromLabel: fromLabel,
                toLabel: toLabel,
                customRangeLabel: customRangeLabel,
                weekLabel: weekLabel,
                daysOfWeek: moment.weekdaysShort(),
                monthNames: moment.months(),
                firstDay: 1
            },
            start: start,
            end: end
        }, cb);

        cb(start, end,false);
    });
});
