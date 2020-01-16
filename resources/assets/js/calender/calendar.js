	"use strict";
	$(document).ready(function() {
		let datas = [];
	    $('#external-events .fc-event').each(function() {

	        // store data so the calendar knows to render an event upon drop
	        $(this).data('event', {
	            title: $.trim($(this).text()), // use the element's text as the event title
	            stick: true // maintain when user navigates (see docs on the renderEvent method)
	        });

	        // make the event draggable using jQuery UI
	        $(this).draggable({
	            zIndex: 999,
	            revert: true, // will cause the event to go back to its
	            revertDuration: 0 //  original position after the drag
	        });

	    });



	  let calender =   $('#calendar').fullCalendar({
	        header: {
	            left: 'prev,next today',
	            center: 'title',
	            right: 'month,agendaWeek,agendaDay,listMonth'
	        },
	        defaultDate: '2016-09-12',
	        navLinks: true, // can click day/week names to navigate views
	        businessHours: true, // display business hours
	        editable: true,
	        droppable: true, // this allows things to be dropped onto the calendar
	        drop: function() {

	            // is the "remove after drop" checkbox checked?
	            if ($('#checkbox2').is(':checked')) {
	                // if so, remove the element from the "Draggable Events" list
	                $(this).remove();
	            }
	        },
			selectable : true,
			selectHelper : true,
			select : function (start,end,allDay) {

                 let title = prompt("Enter Event Title");
                 if(title){
                     start  = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                     end  = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                     $.ajax({
                         url : 'test-api',
                         type : 'get',
                         dataType : 'json',
                         data : {title:title,start:start,end:end},
                         success:function (res) {
							 datas =res.data;
                             console.log(datas);

                             //   calender.fullCalendar('refetchEvents');
                         }
                     });
				 }

            },
	        events: datas
	    });
	});
