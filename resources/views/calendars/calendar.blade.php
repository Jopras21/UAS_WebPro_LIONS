@extends('layouts.app')

@section('content')
    <div class="flex my-4 w-full mx-28">
        @if(auth()->check()) 
        <a href="{{ route('calendars.create', ['id' => auth()->user()->id]) }}" class="bg-[#293f71] text-white px-4 py-2 rounded hover:bg-[#293f71] mr-2">
                Add
            </a>  
            <a href="{{ route('calendars.show') }}" class="bg-[#293f71] text-white px-4 py-2 rounded hover:bg-[#293f71] ml-2">
                Edit
            </a>
        @endif
    </div>
    <div class="flex justify-center items-center min-h-screen">
        <div id="calendar" class="w-[1500px] max-w-7xl text-gray-50"></div> <!-- Tailwind class untuk margin kiri dan ukuran -->
    </div>

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
    
@endsection
