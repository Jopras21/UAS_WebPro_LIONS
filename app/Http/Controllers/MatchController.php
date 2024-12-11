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
                    'date' => 'OKT 20',
                    'time' => '20:00',
                    'league' => 'Liga Mahasiswa',
                    'home_team' => 'Universitas Multimedia Nusantara',
                    'home_team_logo' => '/path/to/UMN-logo.png',
                    'home_score' => 85,
                    'away_team' => 'Universitas Negri Jakarta',
                    'away_team_logo' => '/path/to/UNJ-logo.png',
                    'away_score' => 62,
                ],
                (object)[
                    'date' => 'OKT 25',
                    'time' => '19:00',
                    'league' => 'Liga Mahasiswa',
                    'home_team' => 'Institut Teknologi Bandung',
                    'home_team_logo' => '/path/to/ITB-logo.png',
                    'home_score' => 72,
                    'away_team' => 'Universitas Gadjah Mada',
                    'away_team_logo' => '/path/to/UGM-logo.png',
                    'away_score' => 68,
                ],
            ],
        ]);

        return view('match-results', ['matches' => $matches]);
    }
}
