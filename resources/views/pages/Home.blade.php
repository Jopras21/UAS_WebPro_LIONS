<!-- resources/views/pages/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-[#051022] to-[#3a4e93]">
    <nav class="bg-gradient-to-r from-[#051022] to-[#3a4e93] px-4 py-3">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="MyWebsite Logo" class="h-[95px] w-auto">
            </a>
            <div>
                <a href="/calendars" class="text-gray-50 hover:text-blue-500 px-4 py-2">Calendar</a>
                <a href="/gallery" class="text-gray-50 hover:text-blue-500 px-4 py-2">Gallery</a>
                <a href="/login" class="text-gray-50 hover:text-blue-500 px-4 py-2">Login</a>
                <a href="/register" class="text-gray-50 hover:text-blue-500 px-4 py-2">Register</a>
                <a href="/contact" class="text-gray-50 hover:text-blue-500 px-4 py-2">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Matches Section -->
    <div class="matches mt-8">
            <h2 class="text-2xl font-bold text-gray-50">Latest Matches</h2>
            @foreach($matches as $month => $matchList)
                <h3 class="mt-4 text-xl font-semibold text-gray-50">{{ $month }}</h3>
                <div class="match-list grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($matchList as $match)
                        <div class="match bg-[#293F71] p-6 rounded shadow-lg">
                            <div class="match-info">
                                <span class="date text-sm text-gray-300 block">{{ $match->date }} at {{ $match->time }}</span>
                                <span class="league text-sm text-gray-300 block mt-1">{{ $match->league }}</span>
                            </div>
                            <div class="teams flex justify-between items-center mt-4">
                                <div class="team home-team flex items-center">
                                    <img src="{{ asset($match->home_team_logo) }}" alt="{{ $match->home_team }} Logo" class="w-10 h-10 mr-3"/>
                                    <span class="text-white">{{ $match->home_team }} - {{ $match->home_score }}</span>
                                </div>
                                <div class="team away-team flex items-center">
                                    <span class="text-white">{{ $match->away_team }} - {{ $match->away_score }} </span>
                                    <img src="{{ asset($match->away_team_logo) }}" alt="{{ $match->away_team }} Logo" class="w-10 h-10 mr-3"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <!-- Tombol View More -->
            <a href="{{ route('matches.show') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                View More Matches
            </a>
        </div>

        <!-- Upcoming Events Section -->
        <div class="events mt-8">
            <h2 class="text-2xl font-bold text-gray-50">Upcoming Events</h2>

            <div class="events-list grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="event bg-[#293F71] p-6 rounded shadow-lg">
                        <div class="event-info">
                            <h3 class="text-xl font-semibold text-white">{{ $event['title'] }}</h3>
                            <p class="text-sm text-gray-300 mt-2">{{ $event['start'] }} - {{ $event['end'] }}</p>
                            <p class="text-gray-300 mt-4">{{ $event['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View More Button for Events -->
            <a href="/calendars" class="btn-view-more mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                View More Events
            </a>
        </div>
</body>
</html>
