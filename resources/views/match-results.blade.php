@extends('layouts.app')

@section('title', 'Match')

@section('content')
<div class="container">
    @foreach ($matches as $month => $monthMatches)
        <div class="month-section">
            <div class="month-header">
                {{ $month }}
            </div>
            
            @foreach ($monthMatches as $match)
                <div class="match-row">
                    <div class="match-date">
                        <div class="date">{{ $match->date }}</div>
                        <div class="time">Tip Off at {{ $match->time }}</div>
                    </div>
                    
                    <div class="league-name">
                        {{ $match->league }}
                    </div>
                    
                    <div class="team home-team">
                        <img src="{{ $match->home_team_logo }}" alt="{{ $match->home_team }}" class="team-logo">
                        <span class="team-name">{{ $match->home_team }}</span>
                    </div>
                    
                    <div class="score">
                        {{ $match->home_score }} - {{ $match->away_score }}
                    </div>
                    
                    <div class="team away-team">
                        <span class="team-name">{{ $match->away_team }}</span>
                        <img src="{{ $match->away_team_logo }}" alt="{{ $match->away_team }}" class="team-logo">
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        background-color: #e4e4e3;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .month-section {
        margin-bottom: 2rem;
    }

    .month-header {
        background-color: #293f71;
        color: #e4e4e3;
        padding: 1rem 2rem;
        font-size: 1.2rem;
        font-weight: bold;
        clip-path: polygon(0 0, 100% 0, 95% 100%, 0 100%);
    }

    .match-row {
        display: grid;
        grid-template-columns: 150px 200px 1fr auto 1fr;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #293f71;
    }

    .match-date {
        padding-right: 1rem;
    }

    .date {
        font-weight: bold;
        font-size: 1.1rem;
        color: #293f71;
    }

    .time {
        color: #666;
        font-size: 0.9rem;
    }

    .league-name {
        color: #666;
    }

    .team {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .away-team {
        justify-content: flex-end;
    }

    .team-logo {
        width: 40px;
        height: 40px;
        object-fit: contain;
    }

    .team-name {
        font-weight: 500;
        color: #293f71;
    }

    .score {
        font-weight: bold;
        font-size: 1.2rem;
        padding: 0 2rem;
        color: #3c5097;
    }

    @media (max-width: 768px) {
        .match-row {
            grid-template-columns: 1fr;
            gap: 1rem;
            text-align: center;
        }
        
        .team {
            justify-content: center;
        }
        
        .away-team {
            flex-direction: row-reverse;
        }
    }
</style>
@endsection
