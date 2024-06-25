"use strict";

$("document").ready(function() {
  $('#myEvent').fullCalendar({
    height: 'auto',
    margin: 'auto',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    editable: true,
    events: {
      url: '/ambil/jadwal',
      type: 'GET',
      error: function() {
        alert('There was an error while fetching events!');
      }
    }
  });
});