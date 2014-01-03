/**
 * @author Daniel Deppe
 */

//######################################################################################################################
//############################################### GENERAL ##############################################################
//######################################################################################################################
/**
 * Variables & Utilities;
 */
$mobileMaxWidth = 992;


//######################################################################################################################
//############################################ RESPONSIVENESS ##########################################################
//######################################################################################################################

/*var thisScreenWidth = 0, thisScreenHeight = 0;
 function viewScreenSize() {
 if (typeof (window.innerWidth) === 'number') {
 //Non-IE
 thisScreenWidth = window.innerWidth;
 thisScreenHeight = window.innerHeight;
 } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
 //IE 6+ in 'standards compliant mode'
 thisScreenWidth = document.documentElement.clientWidth;
 thisScreenHeight = document.documentElement.clientHeight;
 } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
 //IE 4 compatible
 thisScreenWidth = document.body.clientWidth;
 thisScreenHeight = document.body.clientHeight;
 screenWidth = thisScreenWidth;
 }
 // screenSize = div in page footer
 $("#screenSize").html(thisScreenWidth + "x" + thisScreenHeight);
 }*/


//######################################################################################################################
//############################################ SIDE CALENDAR ###########################################################
//######################################################################################################################
/**
 * Activate SideCalendar inline in Right Column.
 */
$(document).ready(function () {

        $('#SideCalendar, .datepicker').datepicker({
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
);


//######################################################################################################################
//############################################ FULL CALENDAR ###########################################################
//######################################################################################################################


/**
 * Activate FullCalendar
 */
$(document).ready(function () {


    // ######################################### INIT QTIPS2  ##########################################################

    //Tooltips qtip2
    var tooltip = $('<div/>').qtip({
        id: 'calendar',
        prerender: true,
        content: {
            text: ' ',
            title: {
                button: true
            }
        },
        position: {
            my: 'top center',
            at: ' center',
            target: 'mouse',
            viewport: $('#calendar'),
            adjust: {
                mouse: false,
                scroll: false
            }
        },
        show: false,
        hide: {
            event: 'unfocus click mouseleave'
        },
        style: 'qtip-bootstrap'
    }).qtip('api');


    // ##################################### Responsive Calendar  ######################################################
    // Check if full Calendar or small View is needed:

    //Header for Week/Start/ Production (Landing page)
    $mediaQueryHeader = {
        left: 'title',
        center: '',
        right: 'prev,today,next'
    };
    $mediaQueryView = 'agendaWeek';
    $hiddenDays = [ 0, 6 ];

    // Header for Calendar (big version)
    if ((window.location.href.indexOf("calendar") > -1) || (window.location.href.indexOf("full_calendar") > -1)) { // Todo Entferne FullCalendar
        $mediaQueryHeader.left = 'agendaDay,agendaWeek,month';
        $mediaQueryHeader.center = 'title';
        $mediaQueryHeader.right = 'prev,today,next';
        $mediaQueryView = 'month';
        $hiddenDays = [ 0 ];
    }

    //Initial Start View
    if ($(document).width() < $mobileMaxWidth) {
        $mediaQueryView = 'agendaDay';
    }

    // Later changes on resize
    $(window).bind('resize', function () {
        if ($(document).width() < $mobileMaxWidth) $('#calendar').fullCalendar('changeView', 'agendaDay');
        else $('#calendar').fullCalendar('changeView', 'agendaWeek');
    });

    // ######################################## INIT CALENDAR ##########################################################

    $('#calendar').fullCalendar({

        //View
        header: $mediaQueryHeader,
        defaultView: $mediaQueryView,
        weekMode: 'variable',
        allDaySlot: false, // Show allday-slot
        weekends: true, // Show Weekends
        firstDay: 1, //0 = So, 1 = Mo...
        hiddenDays: $hiddenDays, // No So
        aspectRatio: 1.375, //Dimension of Calendar

        //TimeFormat - German
        firstHour: 8,
        minTime: 6,
        maxTime: 22,
        axisFormat: 'HH:mm',
        formatDate: 'dd.MM.yyyy HH:mm:ss',
        titleFormat: {
            month: 'MMMM yyyy',                             // September 2009
            week: "dd.[ MMM.][yy]{ '&#8211;' dd. MMMM yyyy}", // Sep 7 - 13 2009
            day: 'dddd, dd.MM.yyyy'                  // Tuesday, Sep 8, 2009
        },
        columnFormat: {
            month: 'ddd',    // Mon
            week: "ddd - d.M.", // Mon 9/7
            day: 'dddd d.M.'  // Monday 9/7
        },
        timeFormat: "HH:mm{ – HH:mm}' Uhr'", // Determines the time-text that will be displayed on each event.


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

        //Events
        eventSources: [
            {
                url: "/captility/events/feed"
                //color: 'yellow',   // an option!
                //textColor: 'black' // an option!
            }
        ],

        //Interaction
        editable: true,
        selectable: true,

        eventClick: function (data, event, view) {
            var content = '<p><b>Start:</b> ' + data.start + '<br />' +
                (data.end && '<p><b>End:</b> ' + data.end + '</p>' || '') +
                '<a class="btn-m btn-sm btn-default pull-right" name="Bearbeiten" href="/captility/captures/edit/' + data.capture_id + '">Bearbeiten</a>' +
                '<a class="btn-m btn-sm btn-default pull-right" name="Anzeigen" href="/captility/captures/view/' + data.capture_id + '">Anzeigen</a>';

            tooltip.set({
                'content.text': content,
                'content.title': data.title,
                'style.classes': 'qtip-bootstrap ' + 'qtip-' + data.className
            })
                .reposition(event).show(event);
        },
        eventResizeStart: function () {
            tooltip.hide()
        },
        eventDragStart: function () {
            tooltip.hide()
        },
        viewDisplay: function () {
            tooltip.hide()
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

})
;

//######################################################################################################################
//############################################ FULL CALENDAR ###########################################################
//######################################################################################################################


var eventColorValues = {
    colors: [
        ['#202020', '#3a87ad', '#f70', '#009406', '#FFEB00', '#FD3E20',  '#5F43A8', '#009B9B', '#579B00', '#FF38D7', '#FDFDFD']
    ]
};

var eventColorNames = ['Black','Blue','Orange', 'Green' , 'Yellow','Red','Purple','Indigo', 'Mint', 'Pink','White']
/*var eventColorNames = ['Black','Blue','Orange', 'Green' , 'Yellow','Red','Purple','Indigo', 'Mint', 'Pink','White']*/

$(document).ready(function () {


    $('.colorpalette').colorPalette(eventColorValues)
        .on('selectColor', function (e) {
            $('.selected-color').val(e.color);
        });
});