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
                    'away_team' => 'Universitas Negeri Jakarta',
                    'away_team_logo' => asset('images/unjlogo.jpeg'),
                    'away_score' => 62,
                ],
                (object)[
                    'date' => 'OKT 20',
                    'time' => '16:00',
                    'league' => 'Liga Mahasiswa',
                    'home_team' => 'Universitas Multimedia Nusantara',
                    'home_team_logo' => asset('images/logo.png'),
                    'home_score' => 77,
                    'away_team' => 'Universitas 17 Agustus 45',
                    'away_team_logo' => asset('images/uta45logo.jpeg'),
                    'away_score' => 72,
                ],
            ],
            'AGUSTUS 2024' => [
                (object)[
                    'date' => 'AUG 20',
                    'time' => '16:00',
                    'league' => 'Sparring',
                    'home_team' => 'Universitas Multimedia Nusantara',
                    'home_team_logo' => asset('images/logo.png'),
                    'home_score' => 63,
                    'away_team' => 'Immortal Basketball Club',
                    'away_team_logo' => asset('images/immologo.png'),
                    'away_score' => 51,
                ],
            ],
        ]);

        return view('match-results', [
            'matches' => $matches
        ]);
    }
}
