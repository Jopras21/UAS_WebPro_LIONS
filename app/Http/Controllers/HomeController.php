<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class HomeController extends Controller
{
    public function index()
    {
        // Mendapatkan data pertandingan
        $matches = collect([
            'OKTOBER 2024' => [
                (object)[
                    'date' => 'OKT 13',
                    'time' => '14:45',
                    'league' => 'Liga Mahasiswa',
                    'home_team' => 'Universitas Multimedia Nusantara',
                    'home_team_logo' => asset('images/logo.png'),
                    'home_score' => 85,
                    'away_team' => 'Universitas Negri Jakarta',
                    'away_team_logo' => asset('images/unjlogo.jpeg'),
                    'away_score' => 62,
                ],
            ],
        ]);

        // Fetch the first 5 events for the homepage from the Calendar model
        $events = Calendar::latest()->take(5)->get()->map(function ($event) {
            return [
                'start' => $event->start,
                'end' => $event->end,
                'title' => $event->title,
                'description' => $event->description,
            ];
        });

        // Mengirimkan data pertandingan ke view
        return view('pages.home', [
            'title' => 'Home',
            'matches' => $matches,
            'events' => $events,
        ]);
    }
}
