<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function showMatches()
    {
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

        return view('match-results', ['matches' => $matches]);

        return view('pages.home', [
            'matches' => $matches, // Mengirimkan data matches ke view home.blade.php
            'title' => 'Home'
        ]);
    }
}
