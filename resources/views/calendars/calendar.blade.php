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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .fc-toolbar {
            background-color: #3c5097; /* Toolbar background color */
            color: white; /* Toolbar text color */
            border-radius: 8px;
            padding: 10px;
        }

        .fc-button {
            background-color: #1e1a1f; /* Button background color */
            color: white; /* Button text color */
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }

        .fc-button:hover {
            background-color: #293f71; /* Button hover color */
        }

        .fc-daygrid-event {
            background-color: #3c5097; /* Event background color */
            color: white; /* Event text color */
            border-radius: 5px;
            padding: 5px;
            margin: 2px 0;
        }

        .fc-daygrid-event:hover {
            background-color: #293f71; /* Event hover color */
        }

        .fc-daygrid-day-number {
            color: #3c5097; /* Day number color */
        }

        .fc-daygrid-day {
            border: 1px solid #e4e4e3; /* Day border color */
        }
    </style>
</head>

<body>
    <div id="calendar"></div>

    <script>
        var events = JSON.parse('{!! json_encode($events) !!}');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

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
