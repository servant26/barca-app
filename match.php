<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barca App</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .match-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            transition: transform 0.3s;
            cursor: pointer;
            margin: 15px 15px 15px 15px;
        }
        .match-card:hover {
            transform: scale(1.05);
        }
        .team-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        .score {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .date {
            font-size: 0.9rem;
            color: #666;
            text-align: center;
            margin-bottom: 10px;
        }
        .stadium {
            font-size: 0.9rem;
            color: #888;
            margin-top: 5px;
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
<nav class="navbar sticky-top navbar-expand-lg navbar-dark">
    <div class="container-fluid m-2 d-flex align-items-center">
        <div class="dropdown">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" class="navbar-logo" alt="Barca" style="width: 40px; height: 40px;">
                <span class="d-inline d-lg-none ms-2 text-white">FC Barcelona</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link active" href="#">Match</a>
                </li>
                <!-- Dropdown untuk Statistics -->
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link no-underline" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="container mt-4">
        <?php
            // PHP code to fetch data from API and display matches
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
            curl_close($curl);

            $data = json_decode($response, true);
            $today = time();

            // Filter and sort matches
            $pastMatches = array_filter($data, fn($match) => strtotime($match['date']) < $today);
            $futureMatches = array_filter($data, fn($match) => strtotime($match['date']) > $today);
            usort($pastMatches, fn($a, $b) => strtotime($b['date']) - strtotime($a['date']));
            usort($futureMatches, fn($a, $b) => strtotime($a['date']) - strtotime($b['date']));

            echo "<h4 class='text-center mb-4'>Next Match</h4>";
            if (!empty($futureMatches)) {
                $upcomingMatch = $futureMatches[0];
                echo "<div class='match-card mb-5'>
                        <div class='team'>
                            <p>" . ucwords($upcomingMatch['homeTeam']['team']['name']) . "</p>
                        </div>
                        <div class='score-container text-center'>
                            <div class='stadium'>" . ucwords($upcomingMatch['stadium']) . "</div>
                            <div class='date'>" . date("Y-m-d H:i", strtotime($upcomingMatch['date'])) . "</div>
                        </div>
                        <div class='team text-right'>
                            <p>" . ucwords($upcomingMatch['awayTeam']['team']['name']) . "</p>
                        </div>
                      </div>";
            }

            echo "<h4 class='text-center mb-4'>Last 5 Matches</h4>";
            foreach (array_slice($pastMatches, 0, 5) as $match) {
                $homeLogo = "";
                $awayLogo = "";
                echo "<div class='match-card'>
                        <div class='team'>
                            <p>" . ucwords($match['homeTeam']['team']['name']) . "</p>
                        </div>
                        <div class='score-container text-center'>
                            <div class='stadium'>" . ucwords($match['stadium']) . "</div>
                            <div class='score'>{$match['homeTeam']['score']} - {$match['awayTeam']['score']}</div>
                            <div class='date'>" . date("Y-m-d H:i", strtotime($match['date'])) . "</div>
                        </div>
                        <div class='team text-right'>
                            <p>" . ucwords($match['awayTeam']['team']['name']) . "</p>
                        </div>
                      </div>";
            }
        ?>
    </div>

<br><br>
<nav class="navbar navbar-dark bg-dark fixed-bottom d-block d-lg-none">
    <div class="container-fluid justify-content-around">
        <a href="index.php" class="nav-link">
            <img src="pict/home.png" alt="Home" style="width: 24px; height: 24px;" class="icon">
        </a>
        <a href="match.php" class="nav-link">
            <img src="pict/match.png" alt="Match" style="width: 24px; height: 24px;" class="icon">
        </a>

        <!-- Dropdown menu for Stats, with "dropup" class to toggle upwards -->
        <div class="nav-item dropdown dropup">
            <a class="nav-link dropdown-toggle" href="#" id="statsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="pict/stats.png" alt="Stats" style="width: 24px; height: 24px;" class="icon">
            </a>
            <ul class="dropdown-menu" aria-labelledby="statsDropdown">
                <li><a class="dropdown-item" href="standings.php">Standings</a></li>
                <li><a class="dropdown-item" href="top_score.php">Top Score</a></li>
                <li><a class="dropdown-item" href="top_assist.php">Top Assist</a></li>
            </ul>
        </div>

        <a href="player.php" class="nav-link active">
            <img src="pict/player.png" alt="Player" style="width: 24px; height: 24px;" class="icon">
        </a>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
