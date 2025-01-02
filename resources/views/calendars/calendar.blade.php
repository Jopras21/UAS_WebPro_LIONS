@extends('layouts.app')

@section('title', 'Calendar')

@section('content')
    <div class="my-4">
        @if(auth()->check()) 
            <a href="{{ route('calendars.create', ['id' => auth()->user()->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mr-2">
                Add
            </a>  
            <a href="{{ route('calendars.edit', ['id' => auth()->user()->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                Edit
            </a>
        @endif
    </div>
    <div class="flex justify-center items-center min-h-screen">
        <div id="calendar" class="w-[1500px] max-w-7xl text-gray-50"></div>
    </div>

    <div class="event-tooltip" id="event-tooltip"></div>

    <!-- Notification Modal -->
    <div id="event-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-gray-900 text-white rounded-lg shadow-lg p-6 max-w-sm w-full transition-transform transform scale-95 hover:scale-100">
            <h2 class="text-2xl font-bold mb-2" id="modal-title"></h2>
            <p class="mb-2 text-sm text-gray-400" id="modal-start"></p>
            <p class="mb-2 text-sm text-gray-400" id="modal-end"></p>
            <p class="mb-4 text-sm text-gray-300" id="modal-description"></p>
            <button id="close-modal" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-200">Close</button>
        </div>
    </div>

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
                    // Populate modal with event details
                    document.getElementById('modal-title').innerText = info.event.title;
                    document.getElementById('modal-start').innerText = 'Starts: ' + info.event.start.toLocaleString();
                    document.getElementById('modal-end').innerText = 'Ends: ' + info.event.end.toLocaleString();
                    document.getElementById('modal-description').innerText = 'Description: ' + (info.event.extendedProps.description || '');

                    // Show the modal
                    document.getElementById('event-modal').classList.remove('hidden');
                }
            });

            calendar.render();

            // Close modal functionality
            document.getElementById('close-modal').addEventListener('click', function() {
                document.getElementById('event-modal').classList.add('hidden');
            });
        });
    </script>
@endsection
