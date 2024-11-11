<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://la-liga2.p.rapidapi.com/players/topAssisters",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
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
} else {
	$data = json_decode($response, true); // Decode JSON response to array
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barca App - Top Assists</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .stat-center {
            text-align: center;
            font-weight: bold;
        }
        .stat-left, .stat-right {
            text-align: center;
        }
        .nav-tabs {
            justify-content: space-evenly;
        }
        .table-hover tbody tr:hover {
            background-color: #495057;
        }
        .table-header {
            background-color: #007bff;
            color: #ffffff;
        }
        .table-responsive {
            margin-top: 20px;
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
                    <a class="nav-link" href="match.php">Match</a>
                </li>
                <!-- Dropdown untuk Statistics -->
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link no-underline active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <h2 class="text-center">Top Assists</h2>
    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead class="table-header">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Team</th>
                    <th scope="col">Assists</th>
                    <th scope="col">Appearances</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $player) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars(ucfirst($player['name'])); ?></td>
                            <td><?php echo htmlspecialchars(ucfirst($player['team']['name'])); ?></td>
                            <td><?php echo htmlspecialchars($player['assists']); ?></td>
                            <td><?php echo htmlspecialchars($player['appearances']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
