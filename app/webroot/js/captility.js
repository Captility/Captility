/**
 * @author Daniel Deppe
 */

//######################################################################################################################
//############################################### GENERAL ##############################################################
//######################################################################################################################
/**
 * Utilities
 */


//######################################################################################################################
//############################################ SIDE CALENDAR ###########################################################
//######################################################################################################################
/**
 * Activate SideCalendar inline in Right Column.
 */
$(document).ready(function () {

        if ($('#SideCalendar').length) {
            $('#SideCalendar').datepicker({
                format: "dd/mm/yyyy",
                weekStart: 1,
                todayBtn: true,
                language: "de",
                orientation: "top auto",
                daysOfWeekDisabled: "0,6",
                calendarWeeks: true,
                todayHighlight: true
            })
        }
    }
);


//######################################################################################################################
//############################################ FULL CALENDAR ###########################################################
//######################################################################################################################
/**
 * Activate FullCalendar
 */
$(document).ready(function () {

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({

        //View
        header: {
            left: 'title',
            center: '',
            right: 'today agendaDay,agendaWeek,month prev,next'
        },
        defaultView: 'agendaWeek',
        weekMode: 'variable',
        allDaySlot: false, // Show allday-slot
        weekends: false, // Show Weekends
        aspectRatio: 1.475, //Dimension of Calendar
        editable: true,
        selectable: true,


        //TimeFormat - German
        firstHour: 8,
        minTime: 6,
        maxTime: 22,
        axisFormat: 'HH:mm',
        formatDate: 'dd.MM.yyyy HH:mm:ss',
        titleFormat: {
            month: 'MMMM yyyy',                             // September 2009
            week: "d.[MM.][yyyy]{ '&#8212;' d. MMMM yyyy}", // Sep 7 - 13 2009
            day: 'dddd, dd.MM.yyyy'                  // Tuesday, Sep 8, 2009
        },
        columnFormat: {
            month: 'ddd',    // Mon
            week: 'dddd - d.M.', // Mon 9/7
            day: 'dddd d.M.'  // Monday 9/7
        },
        timeFormat: "HH:mm{ — HH:mm}' Uhr'", // Determines the time-text that will be displayed on each event.


        //German
        monthNames: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli',
            'August', 'September', 'Oktober', 'November', 'Dezember'],
        monthNamesShort: ['Jan', 'Feb', 'Mrz', 'Apr', 'Mai', 'Jun', 'Jul',
            'Aug', 'Sept', 'Okt', 'Nov', 'Dez'],
        dayNames: ["Sonntag", "Montag", "Dienstag", "Mittwoch",
            "Donnerstag", "Freitag", "Samstag"],
        dayNamesShort: ["So", "Mo", "Di", "Mi",
            "Do", "Fr", "Sa"],
        allDayText: 'Ganztägig',
        buttonText: {
            today: 'Heute',
            month: 'Monat',
            week: 'Woche',
            day: 'Tag'
        },


        mouseover: function (event, jsEvent, view) {


            $(this).css('background-color', 'red');

        },

        //Events
        events: "/captility/events/feed",
        eventRender: function (event, element) {
            /*element.qtip({
                content: event.details,
                position: {
                    target: 'mouse',
                    adjust: {
                        x: 10,
                        y: -5
                    }
                },
                style: {
                    name: 'light',
                    tip: 'leftTop'
                }
            });*/
        },
        eventDragStart: function (event) {
            /*$(this).qtip("destroy");*/
        },
        eventDrop: function (event) {
            var startdate = new Date(event.start);
            var startyear = startdate.getFullYear();
            var startday = startdate.getDate();
            var startmonth = startdate.getMonth() + 1;
            var starthour = startdate.getHours();
            var startminute = startdate.getMinutes();
            var enddate = new Date(event.end);
            var endyear = enddate.getFullYear();
            var endday = enddate.getDate();
            var endmonth = enddate.getMonth() + 1;
            var endhour = enddate.getHours();
            var endminute = enddate.getMinutes();
            if (event.allDay == true) {
                var allday = 1;
            } else {
                var allday = 0;
            }
            var url = "/captility/events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
            $.post(url, function (data) {
            });
        },
        eventResizeStart: function (event) {
            /*$(this).qtip("destroy");*/
        },
        eventResize: function (event) {
            var startdate = new Date(event.start);
            var startyear = startdate.getFullYear();
            var startday = startdate.getDate();
            var startmonth = startdate.getMonth() + 1;
            var starthour = startdate.getHours();
            var startminute = startdate.getMinutes();
            var enddate = new Date(event.end);
            var endyear = enddate.getFullYear();
            var endday = enddate.getDate();
            var endmonth = enddate.getMonth() + 1;
            var endhour = enddate.getHours();
            var endminute = enddate.getMinutes();
            var url = "/captility/events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00";
            $.post(url, function (data) {
            });
        }
    })

});