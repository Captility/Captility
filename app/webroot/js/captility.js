/**
 * @author Daniel Deppe
 */

//######################################################################################################################
//########################################### Global Variables #########################################################
//######################################################################################################################

$mobileMaxWidth = 992;


//DEBUGGIN ON/OFF
console.log = function () {
};

//######################################################################################################################
//############################################### UTILITIES ############################################################
//######################################################################################################################

function getParameterByName(name, href) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(href);
    if (results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}


/**
 * SlideRight Animation for eg. breadcrumbs
 * @param speed
 * @param callback
 * @returns {*}
 */
jQuery.fn.slideRight = function (speed, callback) {

    $(this).css({'width': '0'});

    var elem, height, width;
    return this.each(function (i, el) {
        el = jQuery(el), elem = el.clone().css({"width": "auto"}).appendTo(el.parent());
        width = elem.css("width"),
            elem.remove();

        el.animate({"width": width}, speed, callback);

    });
}

// ACCORDION

//Make Links clickable. Prevent Panel from collapse.
$(".panel-collapse  a").click(function (e) {
    e.stopPropagation();
});


//SWITCH ELEMENTS


function cssprop($e, id) {
    return parseInt($e.css(id), 10);
}

//######################################################################################################################
//############################################ RESIZE EVENT ############################################################
//######################################################################################################################

/*
 * jQuery resize event - v1.1 - 3/14/2010
 * http://benalman.com/projects/jquery-resize-plugin/
 *
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function ($, h, c) {
    var a = $([]), e = $.resize = $.extend($.resize, {}), i, k = "setTimeout", j = "resize", d = j + "-special-event", b = "delay", f = "throttleWindow";
    e[b] = 250;
    e[f] = true;
    $.event.special[j] = {setup: function () {
        if (!e[f] && this[k]) {
            return false
        }
        var l = $(this);
        a = a.add(l);
        $.data(this, d, {w: l.width(), h: l.height()});
        if (a.length === 1) {
            g()
        }
    }, teardown: function () {
        if (!e[f] && this[k]) {
            return false
        }
        var l = $(this);
        a = a.not(l);
        l.removeData(d);
        if (!a.length) {
            clearTimeout(i)
        }
    }, add: function (l) {
        if (!e[f] && this[k]) {
            return false
        }
        var n;

        function m(s, o, p) {
            var q = $(this), r = $.data(this, d);
            r.w = o !== c ? o : q.width();
            r.h = p !== c ? p : q.height();
            n.apply(this, arguments)
        }

        if ($.isFunction(l)) {
            n = l;
            return m
        } else {
            n = l.handler;
            l.handler = m
        }
    }};
    function g() {
        i = h[k](function () {
            a.each(function () {
                var n = $(this), m = n.width(), l = n.height(), o = $.data(this, d);
                if (m !== o.w || l !== o.h) {
                    n.trigger(j, [o.w = m, o.h = l])
                }
            });
            g()
        }, e[b])
    }
})(jQuery, this);

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
 * German translation for bootstrap-datepicker
 * Sam Zurcher <sam@orelias.ch>
 */

if ($.isFunction($.fn.datepicker)) {

    (function ($) {
        $.fn.datepicker.dates['de'] = {
            days: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"],
            daysMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"],
            daysShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"],
            months: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
            monthsShort: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
            today: "Heute",
            weekStart: 1,
            format: "D, dd.mm.yyyy"
        };
    }(jQuery));

}
// ######################################## INIT DATEPICKER ############################################################

// Check Module
if ($.isFunction($.fn.datepicker) && $.isFunction($.fn.fullCalendar)) {
    /**
     * Activate SideCalendar inline in Right Column.
     */
    $(document).ready(function () {

            $('#SideCalendar').datepicker({
                format: "dd/mm/yyyy",
                weekStart: 1,
                todayBtn: true,
                language: "de",
                orientation: "top center",
                daysOfWeekDisabled: "0,6",
                calendarWeeks: true,
                todayHighlight: true,
                selectWeek: true,
                autoclose: true,
                todayBtn: true // Today selects current day instead of just showing (true)

            }, function () {


            });


            $('body').on('focus', ".pickDate", function () {
                $(this).datepicker({

                    weekStart: 1,
                    language: "de",
                    todayHighlight: true,
                    autoclose: true,
                    orientation: "top center",
                    todayBtn: "linked"

                });
            });


            // init moment.js
            moment().format();
            // DateTime Picker INIT
            $('.pickDateTime').each(function () {

                // http://momentjs.com/docs/#/displaying/format/
                $(this).val(moment($(this).val(), "DD.MM.YYYY hh:mm", 'de').format("dd, DD.MM.YYYY HH:mm [Uhr]", 'de'));

                if (!moment($(this).val(), "dd, DD.MM.YYYY HH:mm [Uhr]", true).isValid()) {

                    $(this).val(null);
                }
            });


            // Time Picker INIT
            $('.pickTime').each(function () {

                // http://momentjs.com/docs/#/displaying/format/
                $(this).val(moment($(this).val(), "hh:mm", 'de').format("HH:mm [Uhr]", 'de'));

                if (!moment($(this).val(), "HH:mm [Uhr]", true).isValid()) {

                    $(this).val(null);
                }

            });

            $('body').on('focus', ".pickTime", function () {

                $(this).datetimepicker({

                    language: 'de',
                    format: "HH:mm [Uhr]",
                    minuteStepping: 15,
                    useSeconds: false,
                    pickDate: false

                });
            });

            // START END
            $(".pickStart").on("change.dp", function (e) {
                $('.pickEnd').data("DateTimePicker").setStartDate(e.date);
            });
            $(".pickEnd").on("change.dp", function (e) {
                $('.pickStart').data("DateTimePicker").setEndDate(e.date);
            });


            // Combine Datepicker and FullCalendar (inkl. Today-Button
            $('#SideCalendar').datepicker()
                // when Datepicker is clicked...
                .on('changeDate', function (e) {

                    //if FullCalendar present
                    if ($('#calendar').length) {
                        // ... jump in FullCalendar

                        //console.log('Datepicker: ' + e.date);
                        $('#calendar').fullCalendar('gotoDate', new Date(e.date));
                    }
                    // else: Load Calendar View
                    else {

                        window.location.href = $appRoot + "/calendars/?date=" + e.date;

                    }


                }
            );


            /*$('.datepicker-days tbody tr').on('mouseleave', function(){

             $(this).removeClass('weekHighlight');
             });*/

        }
    );
}

//######################################################################################################################
//############################################ FULL CALENDAR ###########################################################
//######################################################################################################################

/**
 * Activate FullCalendar
 */
$(document).ready(function () {

    if ($.isFunction($.fn.datepicker) && $.isFunction($.fn.fullCalendar)) {



        // ######################################### INIT QTIPS2  ##########################################################

        //Check module:
        if ($.isFunction($.fn.qtip)) {

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
                    event: 'unfocus',
                    effect: function () {
                        $(this).animate({ opacity: 0 }, { duration: 300 });
                    }
                },
                style: 'qtip-bootstrap'
            }).qtip('api');
        }

        // ##################################### CALENDAR SETTINGS  ########################################################

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

        /*// Later changes on resize
         $(window).resize( function () {
         if ($(document).width() < $mobileMaxWidth) $('#calendar').fullCalendar('changeView', 'agendaDay');
         else $('#calendar').fullCalendar('changeView', 'agendaWeek');
         });*/

        //Event Sources
        var captilityEventSources = {

            overview: {
                url: $appRoot + 'events/feed',
                type: 'GET',
                cache: false
                /*,error: function () {
                 alert('Generelle Events konnten nicht geladen werden.');
                 }*/
            },
            myweek: {
                url: $appRoot + 'events/feed/my',
                type: 'GET',
                cache: false
                /*,error: function () {
                 alert('Eigene Events konnten nicht geladen werden.');
                 }*/
            }
        };

        // ##################################### Combine Calendar with Tabs ################################################

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('#calendar').fullCalendar('render');
            $('#calendar').fullCalendar('render');
        });


        // Swich Event-Sources
        $('#GeneralViewFc').click(function () {

            //$('.datepicker').datepicker('update', new Date($('#SideCalendar').datepicker('getDate')));

            if (!$(this).parent().hasClass("active")) {

                $('#calendar').fullCalendar('removeEventSource', captilityEventSources.myweek)
                    .fullCalendar('removeEventSource', captilityEventSources.overview)
                    .fullCalendar('addEventSource', captilityEventSources.overview);

            }

        });

        $('#MyWeekViewFc').click(function () {

            //$('.datepicker').datepicker('update', new Date($('#SideCalendar').datepicker('getDate')));

            if (!$(this).parent().hasClass("active")) {
                $('#calendar').fullCalendar('removeEventSource', captilityEventSources.overview)
                    .fullCalendar('removeEventSource', captilityEventSources.myweek)
                    .fullCalendar('addEventSource', captilityEventSources.myweek);
            }

        });

        // ######################################## INIT CALENDAR ##########################################################

        var calendar = $('#calendar').fullCalendar({

            //View
            header: $mediaQueryHeader,
            defaultView: $mediaQueryView,
            weekMode: 'variable',
            allDaySlot: false, // Show allday-slot
            weekends: true, // Show Weekends
            firstDay: 1, //0 = So, 1 = Mo...
            hiddenDays: $hiddenDays, // No So
            aspectRatio: 1.215, //1.375, //Dimension of Calendar

            //TimeFormat - German
            firstHour: 7,
            minTime: 6,
            maxTime: 22,
            axisFormat: 'HH:mm',
            formatDate: 'dd.MM.yyyy HH:mm:ss',
            titleFormat: {
                month: 'MMMM yyyy',     // September 2009
                week: "dd.[ MMMM][ yyyy]{ '&#8211;' dd. MMMM yyyy}", // Sep 7 - 13 2009
                day: 'dddd, dd.MM.yyyy'// Tuesday, Sep 8, 2009
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
            eventSources: [captilityEventSources.overview],

            //Interaction
            editable: false,
            selectable: true,


            // #############################################################################################################
            // ######################################## Sync Datepicker ####################################################
            // #############################################################################################################
            viewRender: function (view, element) {

                //console.log('FullCalendar: ' + view.start);
                $('#SideCalendar').datepicker('update', new Date(view.start));
            },

            eventClick: function (data, event, view) {

                var content = '' +

                    '<table cellpadding="0" cellspacing="0" class="table table-striped calendarInfoTable">' +
                    '<tbody>' +

                    '<tr><td><span class="glyphicon glyphicon-calendar"></span></td><td>' + '' + data.datec + ' </td>' +
                    '<td>&nbsp;<span class="glyphicon glyphicon-time gl-ml"></span>' + data.time;

                if (data.location != null) {
                    content += '<td>&nbsp;<span class="glyphicon glyphicon-map-marker gl-ml"></span>' + data.location + '</td>';
                }
                content + '</td></tr>';


                if (data.Lecture.lecture_id != null) {
                    content += '<tr><td><span class="glyphicon glyphicon-th-list"></span></td><td colspan="3"><a href="lectures/view/' + data.Lecture.lecture_id + '">' +
                        '' + data.Lecture.number + ' ' + data.Lecture.name + '</a>' +
                        (data.Lecture.link && '<a href="' + data.Lecture.link + '"> <span class="glyphicon glyphicon-link gl-ms"></span></a>') + '</td></tr>';
                }


                if (data.Host.host_id != null) {
                    content += '<tr><td><span class="glyphicon cp-icon-lecturer"></span></td><td colspan="3">' +
                        '<a href="hosts/view/' + data.Host.host_id + '">' + data.Host.name + '</a>' +
                        (data.Host.email && '<a href="mailto:' + data.Host.email + '"> <span class="glyphicon glyphicon-envelope gl-ms"></span></a>') +
                        (data.Host.contact_email && '<a href="mailto:' + data.Host.contact_email + '"><span class="glyphicon glyphicon-envelope gl-ms"></span></a>') + '</td></tr>';
                }

                if (data.EventType.name != null) {
                    content += '<tr><td><span class="glyphicon glyphicon-facetime-video"></span></td><td colspan="3">' + '' + data.EventType.name + '' + '</td></tr>';
                }


                content += '</tbody>' +
                    '</table><hr class="calendarInfoHr"/>';


                if (data.status_class != null) {
                    content += '<span class="btn-m btn-sm label label-' + data.status_class + '">' + data.status + '</span>';
                }

                content += '<a class="btn-m btn-sm btn-default pull-right" name="Bearbeiten" href="' + $appRoot + 'events/edit/' + data.id + '"><span class="glyphicon glyphicon-alone el-icon-pencil"></span>&nbsp;' +

                    '<a class="btn-m btn-sm btn-default pull-right" name="Anzeigen" href="' + $appRoot + 'events/view/' + data.id + '"><span class="glyphicon glyphicon-alone glyphicon-search"></span>&nbsp;';


                //console.log(data);
                tooltip.set({
                    'content.text': content,
                    'content.title': '<span class="glyphicon el-icon-play-circle"></span>' + data.title,
                    'style.classes': 'qtip-bootstrap ' + 'qtip-' + data.className
                }).reposition(event).show(event);
            },

            // ######################################## Event Interaction ##################################################
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
                var url = $appRoot + "events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
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
                var url = $appRoot + "events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00";
                $.post(url, function (data) {
                });
            }

            /*selectHelper: true,
             , select: function(start, end, allDay) {
             var title = prompt('Event Title:');
             if (title) {
             calendar.fullCalendar('renderEvent',
             {
             title: title,
             start: start,
             end: end,
             allDay: allDay,
             className: 'eventColorBlack'
             },
             true // make the event "stick"
             );
             }
             calendar.fullCalendar('unselect');
             }*/

        });
        // ######################################## Load StartView #########################################################

        // Start view from selected date if set as GET param
        if ($('#calendar').length) {


            var param = getParameterByName('date', window.location.href);
            if (param) {

                $('#calendar').fullCalendar('changeView', 'agendaDay');
                $('#calendar').fullCalendar('gotoDate', new Date(param));
                //console.log('Query: ' + getParameterByName('date', window.location.href));
            }

        }
        ;

    }
});

//######################################################################################################################
//############################################ COLOR PICKER  ###########################################################
//######################################################################################################################


var eventColorValues = {
    colors: [
        ['#202020', '#3a87ad', '#f70', '#009406', '#FFEB00', '#FD3E20', '#5F43A8', '#009B9B', '#579B00', '#FF38D7', '#FDFDFD']
    ]
};

var eventColorNames = ['Black', 'Blue', 'Orange', 'Green' , 'Yellow', 'Red', 'Purple', 'Indigo', 'Mint', 'Pink', 'White']
/*var eventColorNames = ['Black','Blue','Orange', 'Green' , 'Yellow','Red','Purple','Indigo', 'Mint', 'Pink','White']*/

$(document).ready(function () {


    $('.colorpalette').colorPalette(eventColorValues)
        .on('selectColor', function (e) {
            $('.selected-color').val(e.color);
        });


//######################################################################################################################
//############################################# SELECT PICKER  #########################################################
//######################################################################################################################


    if ($.isFunction($.fn.selectpicker)) {

        $('select:not(.form-control-date)').addClass('show-tick').selectpicker({
            selectedTextFormat: 'values',
            noneSelectedText: '<span class="glyphicon el-icon-error"></span>',
            noneResultsText: '<span class="glyphicon el-icon-remove-sign"></span>',
            dropupAuto: false,
            liveSearch: true


        });


        $('select.form-control-date').selectpicker({
            selectedTextFormat: 'values',
            noneSelectedText: '<span class="glyphicon el-icon-error"></span>',
            noneResultsText: '<span class="glyphicon el-icon-remove-sign"></span>',
            dropupAuto: false,
            width: 'auto'
        });

    }

//######################################################################################################################
//########################################### KEY CALENDAR CONTROL  ####################################################
//######################################################################################################################

    $(document).keydown(function (e) {

        //prevent stealing input
        if ($(event.target).is('input, textarea, select')) {
            return true;
        }


        // If Key Left / W
        if (e.keyCode == 37 || e.keyCode == 65) {

            //Move forward in current view
            $('.fc-button-prev').click();

            return true;
        }

        // If Key Right / D
        if (e.keyCode == 39 || e.keyCode == 68) {

            $('.fc-button-next').click();

            return true;
        }

        // If Space / W / S
        if (e.keyCode == 32 || e.keyCode == 83 || e.keyCode == 87) {

            $('.fc-button-today').click();

            return true;
        }


    });


//######################################################################################################################
//############################################# SCHEDULE TABS ##########################################################
//######################################################################################################################

// ADD SCHEDULE BUTTONS
    (function ($) {
        $.fn.updateScheduleRemoveState = function () {

            var $buttons = $('#ScheduleContainer button.form-schedule-remove');

            if ($buttons.length > 1) {

                $buttons.prop('disabled', false);
            } else {

                $buttons.prop('disabled', true);
            }

            //console.log($buttons.length);

            return $buttons.length;
        };
    })(jQuery);


//####################################### SWICH TABS AND HASHES  #########################################################


// TOGGLE ACTIVE TABS OF FORM
    if ($.isFunction($.fn.selectpicker)) {

        $('#ScheduleContainer').on('shown.bs.tab', 'a.form-toggle', function (e) {

            var $target = $($(this).attr('href'));

            $target.parent().find('input, select').prop('disabled', true).selectpicker('refresh');
            ;
            $target.find('input, select').prop('disabled', false).selectpicker('refresh');
        });
    }
    ;


    // ADD A NEW SCHEDULE TO CAPTURE FORM
    jQuery.fn.addSchedule = function () {

        var id = $(this).updateScheduleRemoveState();

        console.log('New ID: ' + id);

        var props = ['name', 'for', 'id', 'href'];

        $schedule = $(this).parents('.panel').clone();

        // CHANGE INPUTS
        $schedule.find('label, textarea, input, a, .tab-pane, select').each(function () {

            // CALC PROPS
            for (var i = 0; i < props.length; ++i) {

                if ($(this).prop(props[i]) !== undefined) {

                    var newProp = $(this).prop(props[i]).replace(/(\d+)/g, id);

                    // cut hashes from href
                    if (props[i] == 'href') newProp = newProp.substr(newProp.indexOf("#"));

                    $(this).prop(props[i], newProp);
                }
            }
        });

        //APPEND
        $('#ScheduleContainer').append($schedule);


        // UPDATE
        $schedule.find('.bootstrap-select').remove();


        // TODO: Remove / Nothing Selected Bugfix:
        $('select:not(.form-control-date)').addClass('show-tick').selectpicker({
            selectedTextFormat: 'values',
            noneSelectedText: '<span class="glyphicon el-icon-error"></span>',
            noneResultsText: '<span class="glyphicon el-icon-remove-sign"></span>',
            dropupAuto: false,
            liveSearch: true
        });
        $schedule.find('input, select').selectpicker('refresh');

        $schedule.slideDown();

        $(this).updateScheduleRemoveState()


        return $(this)
    }

    //Check module: Datepicker
    if ($.isFunction($.fn.datepicker)) {

        // ADD SCHEDULES TO FORM
        $('#ScheduleContainer').on('click', 'button.form-schedule-add', function () {

            $(this).addSchedule();

        });
    }


// REMOVE SCHEDULES FROM FORM
    $('#ScheduleContainer').on('click', 'button.form-schedule-remove', function () {

        if ($('#ScheduleContainer button.form-schedule-remove').length > 1) {

            $(this).parents('.panel').first().slideUp(800, function () {
                $(this).remove();
                $(this).updateScheduleRemoveState();
            })


        }
    });


//######################################################################################################################
//############################################# HASHED TABS ############################################################
//######################################################################################################################

    $(function () {
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').first().tab('show');

        $('.nav-tabs a').click(function (e) {
            //$(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });
    });


//######################################################################################################################
//############################################# ANIMATIONS  ############################################################
//######################################################################################################################

    $.fn.pulse = function (options) {

        var options = $.extend({
            times: 3,
            duration: 'slow'
        }, options);

        for (var i = 0; i < options.times; i++) {
            //$(this).delay(50).fadeOut(options.duration).delay(50).fadeIn(options.duration);
            $(this).animate({opacity: 0.65}, options.duration).animate({opacity: 1}, options.duration).delay(50);
        }

        return $(this);
    };

    /**
     * Remove Success Alerts.
     */
    /*$('.alert').pulse({times: 2, duration: 500}, function () {

     $(this).delay(100).queue(function (next) {

     alert('trigger');
     $('.alert-success, .alert-info').animate({"opacity": '0'}, 'slow').slideUp('slow');
     next();
     });

     });*/

    var alertPulse = {times: 3, duration: 600};
    $(".alert, .message").css({'opacity': 0}).animate({opacity: 1}, alertPulse.duration)/*.pulse(alertPulse)*/.delay(3500);
    $(this).queue(function () {
        $('.alert-success, .alert-info').animate({"opacity": '0'}, 'slow').slideUp(1000);
        $(this).dequeue();
    });


    /**
     * Sliding Panels.
     */
//$('.panel-body').hide().slideDown(1000);

    /**
     * Sliding Schedule Panels.
     */

    $('#ScheduleContainer').on('click', 'button.form-schedule-add', function () {

        var newSchedule = $('#ScheduleContainer .panel-body').last();

        newSchedule.hide();

        $('html, body').animate({
            scrollTop: (newSchedule.parent().offset().top)
        }, 800, function () {

            newSchedule.slideDown(800);
        });

    });


    /**
     * Scroll To Top Button.
     */
    $(window).scroll(function () {
        if ($(this).scrollTop() < 300) {

            $('.scrollTop').fadeOut(400);
        } else {

            $('.scrollTop').fadeIn(800);
        }
    });
    $('.scrollTop').on('click', function () {

        $('html, body').animate({scrollTop: 0}, 400);

        return false;
    });


    /**
     * Lightbox.
     */
    $('img.landing-page-thumbnail').click(function () {

        var self = this;
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        if (title) {
            $('.modal-title').html(title);
            $('#LandingPageModal').find('.modal-dialog').css({'max-width': /*self.naturalWidth*/ 600 + 52});
        } else {
            $('.modal-title').html('Captility unterstützt alle Geräte!');
            $('#LandingPageModal').find('.modal-dialog').css({'max-width': self.naturalWidth + 52});
        }

        $($(this).parents('div').html()).appendTo('.modal-body');

        $('#LandingPageModal').modal({show: true});

    });

    /**
     * Lazy Load.
     */
//Lazy load unveil images if plugin loaded
    if ($.isFunction($.fn.unveil)) {

        $("img").unveil();
    }

    /**
     * Breadcrumbs Animation
     */

// Last 2 or all
    /*$('.captility-breadcrumb li').last().prev().andSelf().hide().css({"margin-left": "-500px"});

     $('.captility-breadcrumb li').last().prev().andSelf().each(function (index) {
     $(this).css({"z-index": 255 - index}).delay(450 * index).show().animate({"margin-left": "0"}, 400);
     });*/


//Last Only
    $('.captility-breadcrumb li').each(function (index) {
        $(this).css({"z-index": 255 - index});
    });

    $('.captility-breadcrumb li').last().hide().css({"margin-left": "-400px"}).show().animate({"margin-left": "0"}, 600);


    // TITLE QTIPS
    $('a[title]').qtip({
        style: 'qtip-bootstrap'});

// QR-CODE:

    if ($.isFunction($.fn.qrcode)) {


        $('a.qr-code').qtip({
                id: 'qr-code',
                prerender: true,
                content: {
                    text: '<div class="qr-code-container"></div>',
                    title: '<a href="' + window.location.href + '">' +
                        '<span class="glyphicon glyphicon-link"></span>'
                        + window.location.href.substring(0, 30) + '...</a>',
                    button: 'Close'
                },
                show: {
                    event: 'click'
                },
                style: 'qtip-bootstrap',

                position: {
                    my: 'top right',
                    at: ' top right'
                },
                events: {

                    show: function (event, api) {

                        var url = window.location.href;

                        $(this).find('.qr-code-container').empty().qrcode({width: 250, height: 250, text: url});

                        //console.log(url);
                    }
                },
                hide: {
                    event: 'unfocus mouseleave',
                    effect: function () {
                        $(this).animate({ opacity: 0 }, { duration: 300 });
                    }
                }

            }
        )
    }
    ;


//######################################################################################################################
//############################################# WORKFLOW TASKS  ########################################################
//######################################################################################################################

// SWAP NEIGHTBOUR TASKS, THE UPPER ONE COMES FIRST!
    function swapTasks($taskUpper, $taskLower, callback) {


        var $set3 = $taskLower.last().nextAll();

        var mb_prev = cssprop($taskUpper.first().prev(), "margin-bottom");
        if (isNaN(mb_prev)) mb_prev = 0;
        var mt_next = cssprop($taskLower.last().next(), "margin-top");
        if (isNaN(mt_next)) mt_next = 0;

        var mt_1 = cssprop($taskUpper.first(), "margin-top");
        var mb_1 = cssprop($taskUpper.last(), "margin-bottom");
        var mt_2 = cssprop($taskLower.first(), "margin-top");
        var mb_2 = cssprop($taskLower.last(), "margin-bottom");

        var h1 = $taskUpper.last().offset().top + $taskUpper.last().outerHeight() - $taskUpper.first().offset().top;
        var h2 = $taskLower.last().offset().top + $taskLower.last().outerHeight() - $taskLower.first().offset().top;

        move1 = h2 + Math.max(mb_2, mt_1) + Math.max(mb_prev, mt_2) - Math.max(mb_prev, mt_1);
        move2 = -h1 - Math.max(mb_1, mt_2) - Math.max(mb_prev, mt_1) + Math.max(mb_prev, mt_2);
        move3 = move1 + $taskUpper.first().offset().top + h1 - $taskLower.first().offset().top - h2 +
            Math.max(mb_1, mt_next) - Math.max(mb_2, mt_next);

        // let's move stuff
        $taskUpper.css('position', 'relative');
        $taskLower.css('position', 'relative');
        $taskUpper.animate({'top': move1}, {duration: 800});
        $taskLower.animate({'top': move2}, {duration: 800, complete: function () {
            // rearrange the DOM and restore positioning when we're done moving
            $taskUpper.insertAfter($taskLower.last())
            $taskUpper.removeAttr('style');
            $taskLower.removeAttr('style');

            $taskUpper.updateTaskStep();
        }
        });

    }


// SWITCH TO EDIT MODE
    jQuery.fn.switchTaskToEditMode = function () {

        $(this).find('.task-view').hide();
        $(this).find('.task-edit').show().find('input, textarea').each(function () {

            $(this).prop('disabled', false);
        });

        return $(this)
    }


// SWITCH TASK TO VIEW MODE
    jQuery.fn.switchTaskToViewMode = function () {


        $(this).find('.task-edit').slideUp().find('input, textarea').each(function () {

            //$(this).prop('disabled', true); NO - WOULDNT SEND DATA!!!
        });

        $(this).find('.task-view').fadeIn();

        return $(this)
    }

// Catch Enter Key in Tasks to prevent FORM POST
    jQuery.fn.enableEnterListener = function () {

        var self = this;

        //Bind Keypress event on Field
        $(this).find('.task-name-field :input').keydown(function (e) {

            var code = e.keyCode || e.which;

            // if enter
            if (code == 13) {

                // save task and dont post form
                $(self).find('.task-save').click();
                return false;
            }

        });
    }

    $('.task').enableEnterListener();

// count tasks from parent
    jQuery.fn.countTasksFrom = function (parent) {

        return $(parent).find('li:not(.task-template, .workflow-task-add)').length;
    }


// UPDATE TASK ID
    jQuery.fn.updateTaskId = function (id) {


        $(this).find('label, textarea, input').each(function () {


            var props = ['name', 'for', 'id'];

            for (var i = 0; i < props.length; ++i) {

                if ($(this).prop(props[i]) !== undefined) {

                    var newProp = $(this).prop(props[i]).replace('$placeholder$', id);
                    $(this).prop(props[i], newProp);
                }
            }

        });

        return $(this)
    }


// UPDATE STEP ID FROM SORTING
    jQuery.fn.updateTaskStep = function () {


        /*var task = $(this);

         var taskStepField = task.find('.task-step-field').find('input');

         taskStepField

         console.log(taskStepField.get(0));*/

        var taskList = $('.workflow-task-list li.task').each(function (i, el) {

            var taskStepField = $(this).find('.task-step-field').find('input');

            taskStepField.val(i);

        });

        return $(this);
    }

// MAKE TASKS SORTABLE AND SET STEP
    function sortableTasks() {


        if ($.isFunction($.fn.sortable)) {

            //SORTABLE TASKS
            var taskList = $('.workflow-task-list');

            taskList.sortable(

                {
                    forcePlaceholderSize: true,
                    items: ':not(.sort-disabled)'

                }).bind('sortupdate', function (e, ui) {

                    ui.item.updateTaskStep();
                });
        }

    }

// Ignite!
    sortableTasks();


    var classes = ['primary', 'warning', 'danger', 'info'];

// BUTTON: ADD NEW TASK IN EDIT MODE FROM TEMPLATE .task-template
    $('.workflow-task-list').on('click', '.workflow-task-add', function () {

        //Find Template
        var taskTemplate = ($(this).parent().find('li.task-template'));

        // IF TEMPLATE Exists..
        if (taskTemplate.length > 0) {

            // Generate new Task Container from template (remove template class)
            var newTask = taskTemplate.clone().removeClass('task-template').hide().addClass('task');

            //Badge Color
            newTask.find('.timeline-badge').addClass(classes[newTask.countTasksFrom(taskTemplate.parent()) % 4])

            // .. show editable edit options only
            newTask.switchTaskToEditMode();
            // .. and set correct ID in fields, for Post data
            newTask.updateTaskId(newTask.countTasksFrom(taskTemplate.parent()));

            taskTemplate.before(newTask); // append before template / add button

            newTask.slideDown('800')

            sortableTasks();
            newTask.updateTaskStep();
            newTask.enableEnterListener();

        }
    });

// BUTTON: SAVE TASK / GO TO VIEW MODE
    $('ul.workflow-task-list').on('click', '.task-save', function () {

        var task = $(this).parents('li.task');


        // Get Representations
        var taskName = task.find('h4.task-name');
        var taskDescription = task.find('.task-description');

        var taskNameField = task.find('.task-name-field').find('input');
        var taskDescriptionField = task.find('.task-description-field').find('textarea');


        if (taskNameField.val() === "") {

            taskNameField.closest('.form-group').addClass('has-error');

        } else {

            // SET VALUES
            taskName.html(taskNameField.val()).append('<hr/>');
            taskDescription.html(taskDescriptionField.val());

            task.switchTaskToViewMode();
        }

    });


// BUTTON: REMOVE TASK, IF TASK ALREADY EXISTENT: AJAX DELETE
    $('ul.workflow-task-list').on('click', '.task-delete', function () {

        var task = $(this).parents('li.task');
        var taskId = task.find('.task-id-field').find('input').val();

        if (typeof taskId !== 'undefined') {

            if (confirm('Sind Sie sicher, dass die die Aufgabe entgültig löschen möchten ?')) {  // TODO SPRACHE

                $.post($appRoot + '/tasks/delete/' + taskId, function (data) {

                    //alert('Killed Task');

                    task.slideUp('800', function () {

                        task.remove();
                    });

                });
            }

        } else {

            task.slideUp('800', function () {

                task.remove();
            });
        }


    });


// CONFIG BUTTON: GOTO EDIT MODE
    $('ul.workflow-task-list').on('click', '.task-config', function () {

        var task = $(this).parents('li.task');

        task.switchTaskToEditMode();
    });

// BUTTON: SWAP DONW
    $('ul.workflow-task-list').on('click', '.task-down', function () {

        var task = $(this).parents('li.task');

        var nextTask = task.next('li.task:not(.task-template, .workflow-task-add)');

        if (nextTask.length) {

            swapTasks(task, nextTask, task.updateTaskStep());
        }
    });

// BUTTON: SWAP UP
    $('ul.workflow-task-list').on('click', '.task-up', function () {

        var task = $(this).parents('li.task');

        var prevTask = task.prev('li.task:not(.task-template, .workflow-task-add)');

        if (prevTask.length) {

            swapTasks(prevTask, task);
        }
    });


//######################################################################################################################
//################################################# TICKETS   ##########################################################
//######################################################################################################################


    /**
     * Ticket View Button
     */
    $('body').on('show.bs.tab', '#TicketsView[data-toggle="tab"]', function () {

        $(this).getTickets(false, false);
    });

    /**
     * My-Tickets View Button
     */
    $('body').on('show.bs.tab', '#MyTicketsView[data-toggle="tab"]', function () {

        $(this).getTickets(true, false);
    });

    /**
     * My-Tickets View Button
     */
    $('body').on('show.bs.tab', '#StatusList[data-toggle="tab"]', function () {

        $(this).getStatusList();
    });


    /**
     * Append new Tickets.
     */
    jQuery.fn.appendNewTickets = function ($data, callback) {

        $(this).show();
        $data.hide();

        $(this).html($data);

        console.log($data);

        $data.each(function (index) {
            console.log($(this));
            $(this).delay(200 * index).slideDown('200');
        });
    }

    /**
     * Get ajax Tickets
     */
    jQuery.fn.getTickets = function (my, sideTicket) {

        var url = $appRoot + 'tickets/feed';
        url += (typeof(my) === 'undefined') ? '/false' : '/' + my;
        url += (typeof(sideTicket) === 'undefined') ? '/false' : '/' + sideTicket;

        var $target = (my) ? $('.myTicketContainer') : $('.ticketContainer');
        $target = (sideTicket) ? $('.sideTicketContainer') : $target;

        $target.hide();

        var jqxhr = $.post(url,function (data) {

            $target.appendNewTickets($(data));

        }).fail(function () {

                /* alert("Aktuelle Tickets konnten nicht abgefragt werden.");

                 // Reload (logout)
                 window.location.replace(window.location.pathname);*/
            })
    }

    //Init-Load SideTickets
    if ($('.sideTicketContainer').length) {
        $(this).getTickets(true, true);
    }
    ;


    /**
     * Get ajax Tickets
     */
    jQuery.fn.getStatusList = function (my, sideTicket) {

        var url = $appRoot + 'events/statusFeed';

        var $target = $('.statusListContainer');

        $target.hide();

        var jqxhr = $.post(url,function (data) {

            $target.html(data).slideDown(800);

        }).fail(function () {

                /*alert("Statusliste konnte nicht abgefragt werden.");

                 // Reload (logout)
                 window.location.replace(window.location.pathname);*/
            })
    }

    //Init-Load SideTickets
    if ($('.sideTicketContainer').length) {
        $(this).getTickets(true, true);
    }
    ;

    /**
     * Ticket Action Buttons
     */
    $('body').on('click', 'a.postLink', function () {

        var $self = $(this);

        var url = $(this).data("href"); //gets data-href


        var jqxhr = $.post(url,function () {

            $self.parents('.ticket, .sideTicket').slideUp(600, function () {

                $self.remove();

                // UPDATE ALL
                $self.getTickets(true, false);
                $self.getTickets(false, false);
                $self.getTickets(true, true);
            });

        }).fail(function () {

                alert("Das Ticket konnte nicht aktualisiert werden.");

                // Reload (logout)
                window.location.replace(window.location.pathname);
            })
    });


//######################################################################################################################
//################################################# SIDEBAR RESIZING ###################################################
//######################################################################################################################

    $('.container-lower').resize(function (e) {

        $self = $(this);
        $tickets = $('.sideTickets .panel-body');
        $calendar = $('.sideCalendar');

        $contentPaneHeight = $self.height() - $calendar.height();

        if ($tickets.length) {

            $tickets.stop().animate({ 'max-height': (-$tickets.offset().top + $self.height() ) }, 200);
        }


    });

    $('.container-lower').resize();

}); // DOC READY END
