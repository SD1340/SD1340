$(document).ready(function() {

	$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var calendar = $('#calendar').fullCalendar({
			editable: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},

//			 eventSources: [
//
//		                     {
//		                         url: '/php/events.php',
//		                         type: 'POST',
//		                         data: {},
//		                         dataType: 'json',
//		                         error: function (data) {
//		                             alert('There was an error while fetching events!');
//		                             console.log(data.title);
//		                         }
//		                     }
//		    ],
			
			events: '/php/events.php',

			// Convert the allDay from string to boolean
			eventRender: function(event, element, view) {
				if (event.allDay === 'true') {
					event.allDay = true;
				} else {
					event.allDay = false;
				}
			},
			
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				var url = prompt('Type Event url, if exits:');
				if (title) {
					var start = $.fullCalendar.moment().format(start, "yyyy-MM-dd HH:mm:ss");
					var end = $.fullCalendar.moment().format(end, "yyyy-MM-dd HH:mm:ss");
					$.ajax({
						url: '/php/add_events.php',
						data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
						type: "POST"
					});
					calendar.fullCalendar('renderEvent',
							{
						title: title,
						start: start,
						end: end,
						allDay: allDay
							},
							true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},

			editable: true,
			eventDrop: function(event, delta) {
				var start = $.fullCalendar.moment().format(event.start, "yyyy-MM-dd HH:mm:ss");
				var end = $.fullCalendar.moment().format(event.end, "yyyy-MM-dd HH:mm:ss");
				$.ajax({
					url: '/php/update_events.php',
					data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
					type: "POST"
				});
			},
			
			eventResize: function(event) {
				var start = $.fullCalendar.moment().format(event.start, "yyyy-MM-dd HH:mm:ss");
				var end = $.fullCalendar.moment().format(event.end, "yyyy-MM-dd HH:mm:ss");
				$.ajax({
					url: '/php/update_events.php',
					data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
					type: "POST"
				});

			},
			
			eventClick: function(event) {
				var decision = confirm("Do you really want to do that?"); 
				if (decision) {
					$.ajax({
						type: "POST",
						url: "your url/delete_events.php",
		
						data: "&id=" + event.id
					});
					$('#calendar2').fullCalendar('removeEvents', event.id);

				} else {
				}
			}

		});

	});


});