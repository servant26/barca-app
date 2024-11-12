<?php
// Ambil data pertandingan dari API
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://la-liga2.p.rapidapi.com/teams/66a51c20841d8a52475a92d7/matches",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: la-liga2.p.rapidapi.com",
        "x-rapidapi-key: 3a4b29e5d0msh9e0add2880a560fp195117jsne80c7c340114"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
    exit;
}

$data = json_decode($response, true);

// Ambil tanggal hari ini
$tanggalHariIni = new DateTime();

// Cari pertandingan terakhir sebelum tanggal hari ini
$lastMatch = null;
foreach ($data as $match) {
    $matchDate = new DateTime($match['date']);
    if ($match['isFinished'] && $matchDate < $tanggalHariIni) {
        if ($lastMatch == null || $matchDate > new DateTime($lastMatch['date'])) {
            $lastMatch = $match;
        }
    }
}

// Tampilkan pertandingan terakhir jika ditemukan
if ($lastMatch) {
    $homeTeam = $lastMatch['homeTeam']['team'];
    $awayTeam = $lastMatch['awayTeam']['team'];
    $homeScore = $lastMatch['homeTeam']['score'] ?? 'N/A';
    $awayScore = $lastMatch['awayTeam']['score'] ?? 'N/A';
    $stadium = $lastMatch['stadium'];

    // Team statistics
    $homePoints = $homeTeam['points'] ?? 'N/A';
    $homeMatchesPlayed = $homeTeam['matchesPlayed'] ?? 'N/A';
    $homeWins = $homeTeam['wins'] ?? 'N/A';
    $homeDraws = $homeTeam['draws'] ?? 'N/A';
    $homeLosses = $homeTeam['losses'] ?? 'N/A';

    $awayPoints = $awayTeam['points'] ?? 'N/A';
    $awayMatchesPlayed = $awayTeam['matchesPlayed'] ?? 'N/A';
    $awayWins = $awayTeam['wins'] ?? 'N/A';
    $awayDraws = $awayTeam['draws'] ?? 'N/A';
    $awayLosses = $awayTeam['losses'] ?? 'N/A';
} else {
    echo "Tidak ada pertandingan yang ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barca App</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .stat-center {
            text-align: center;
        }
        .stat-left, .stat-right {
            text-align: center;
        }
        .nav-tabs {
            justify-content: space-evenly;
        }
        .team-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        .navbar {
            background: linear-gradient(135deg, #00234d, #005180); /* Warna biru tua dengan gradasi */
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body class="bg-dark text-white">
<!-- Awal Navbar -->
<nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid m-2 d-flex align-items-center">
        <div class="dropdown">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" class="navbar-logo" alt="Barca" style="width: 40px; height: 40px;">
                <span class="d-inline d-lg-none ms-2 text-white">FC Barcelona</span>
            </a>
        </div>
        <!-- Navbar Toggler for Hamburger Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="match.php">Match</a>
                </li>
                <!-- Dropdown for Statistics -->
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link no-underline dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Statistics
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="standings.php">Standings</a></li>
                        <li><a class="dropdown-item" href="topscore.php">Top Score</a></li>
                        <li><a class="dropdown-item" href="topassist.php">Top Assist</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="player.php">List Players</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->
<div class="container mt-4 mb-5 text-center">
    <h3>La Liga</h3>
    <p>Stadium: <?php echo ucwords($stadium); ?></p>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-4 d-flex flex-column align-items-center">
            <img src="https://path/to/home_team_logo.png" alt="Home Team" class="team-logo">
            <h4><?php echo ucwords($homeTeam['name']); ?></h4>
        </div>
        <div class="col-4 text-center">
            <h1><?php echo $homeScore; ?> - <?php echo $awayScore; ?></h1>
        </div>
        <div class="col-4 d-flex flex-column align-items-center">
            <img src="https://path/to/away_team_logo.png" alt="Away Team" class="team-logo">
            <h4><?php echo ucwords($awayTeam['name']); ?></h4>
        </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3 d-flex" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true">Statistics of both in Laliga</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="myTabContent">
        <!-- Statistics Tab -->
        <div class="tab-pane fade show active" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <div class="row">
                <div class="col-3 stat-left">
                    <p><?php echo $homePoints; ?></p>
                    <p><?php echo $homeMatchesPlayed; ?></p>
                    <p><?php echo $homeWins; ?></p>
                    <p><?php echo $homeDraws; ?></p>
                    <p><?php echo $homeLosses; ?></p>
                    <p><?php echo $homeTeam['goalsScored']; ?></p>
                    <p><?php echo $homeTeam['goalsConceded']; ?></p>
                    <p><?php echo $homeTeam['goalDifference']; ?></p>
                    <p><?php echo ucwords($homeTeam['coach']); ?></p>
                </div>
                <div class="col-6 stat-center">
                    <p>Points</p>
                    <p>Matches Played</p>
                    <p>Wins</p>
                    <p>Draws</p>
                    <p>Losses</p>
                    <p>Goals Scored</p>
                    <p>Goals Conceded</p>
                    <p>Goal Difference</p>
                    <p>Coach</p>
                </div>
                <div class="col-3 stat-right">
                    <p><?php echo $awayPoints; ?></p>
                    <p><?php echo $awayMatchesPlayed; ?></p>
                    <p><?php echo $awayWins; ?></p>
                    <p><?php echo $awayDraws; ?></p>
                    <p><?php echo $awayLosses; ?></p>
                    <p><?php echo $awayTeam['goalsScored']; ?></p>
                    <p><?php echo $awayTeam['goalsConceded']; ?></p>
                    <p><?php echo $awayTeam['goalDifference']; ?></p>
                    <p><?php echo ucwords($awayTeam['coach']); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
