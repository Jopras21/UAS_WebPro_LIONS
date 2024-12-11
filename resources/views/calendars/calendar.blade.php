<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e4e4e3; /* Light background */
            color: #1e1a1f; /* Dark text color */
            margin: 0;
            padding: 20px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff; /* White background for the calendar */
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .fc-toolbar {
            background-color: #2c3e50; /* Darker toolbar background color */
            color: white; /* Toolbar text color */
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .fc-button {
            background-color: #1e1a1f; /* Button background color */
            color: white; /* Button text color */
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 0 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .fc-button:hover {
            background-color: #293f71; /* Button hover color */
            transform: scale(1.05); /* Scale effect on hover */
        }

        .fc-daygrid-event {
            background-color: #3c5097; /* Event background color */
            color: white; /* Event text color */
            border-radius: 5px;
            padding: 5px;
            margin: 2px 0;
            transition: background-color 0.3s, transform 0.2s;
        }

        .fc-daygrid-event:hover {
            background-color: #293f71; /* Event hover color */
            transform: scale(1.05); /* Scale effect on hover */
        }

        .fc-daygrid-day-number {
            color: #3c5097; /* Day number color */
            font-weight: bold; /* Bold day number */
        }

        .fc-daygrid-day {
            border: 1px solid #e4e4e3; /* Day border color */
            transition: background-color 0.3s;
        }

        .fc-daygrid-day:hover {
            background-color: #f0f4ff; /* Light background on hover */
        }

        /* Custom styles for the calendar header */
        .fc-toolbar-title {
            font-size: 1.5em; /* Larger title font size */
            font-weight: bold; /* Bold title */
            color: #ffffff; /* Title color */
        }

        /* Custom styles for the event tooltip */
        .event-tooltip {
            background-color: #2c3e50; /* Tooltip background color */
            color: white; /* Tooltip text color */
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: absolute;
            z-index: 1000;
            display: none; /* Hidden by default */
        }
    </style>
</head>

<body>
    <div id="calendar"></div>
    <div class="event-tooltip" id="event-tooltip"></div>

    <script>
        var events = JSON.parse('{!! json_encode($events) !!}');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var tooltip = document.getElementById('event-tooltip');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: events.map(event => ({
                    title: event.title,
                    start: event.start,
                    end: event.end,
                    extendedProps: {
                        description: event.description,
                    }
                })),
                displayEventTime: false,
                eventMouseEnter: function(info) {
                    tooltip.innerHTML = `
                        <strong>${info.event.title}</strong><br>
                        Starts: ${info.event.start}<br>
                        Ends: ${info.event.end}<br>
                        Description: ${info.event.extendedProps.description || ''}
                    `;
                    tooltip.style.display = 'block';
                    tooltip.style.left = info.jsEvent.pageX + 'px';
                    tooltip.style.top = info.jsEvent.pageY + 'px';
                },
                eventMouseLeave: function() {
                    tooltip.style.display = 'none';
                },
                eventClick: function(info) {
                    alert(
                        'Event: ' + info.event.title +
                        '\nStarts: ' + info.event.start +
                        '\nEnds: ' + info.event.end +
                        '\nDescription: ' + (info.event.extendedProps.description || '')
                    );
                }
            });

            calendar.render();
        });
    </script>
</body>

</html>
