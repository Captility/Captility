/**
 * User: Daniel
 */

/**
 * Activate SideCalendar inline in Right Column.
 */
$(document).ready(function(){

        $('#SideCalendar').datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            todayBtn: true,
            language: "de",
            orientation: "top auto",
            daysOfWeekDisabled: "0,6",
            calendarWeeks: true,
            todayHighlight: true
        })}
);