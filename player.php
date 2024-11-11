<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barca App</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-dark th, .table-dark td {
            border-color: #495057;
        }
        .table-header {
            background-color: #007bff;
            color: #ffffff;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .category-title {
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 1.5em;
            color: white;
            font-weight: bold;
        }
        .card-img-top {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease; /* Transisi zoom in */
        }
        .card {
            height: 250px; /* Atur tinggi card */
        }

        .card-img-top:hover {
            transform: scale(1.1); /* Zoom in saat hover */
        }
        /* Tambahkan ini di bawah style Anda yang ada */
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
                    <a class="nav-link active" href="#">List Players</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->


<div class="container mt-4">
    <div class="text-center">
        <h3 class="mb-4">Barca Players</h3>
    </div>

    <!-- Goalkeepers -->
    <div class="category-title">Goalkeepers</div>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/ter_stegen.png" class="card-img-top" alt="Goalkeeper">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/inaki.png" class="card-img-top" alt="Goalkeeper">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/szczesny.png" class="card-img-top" alt="Goalkeeper">
            </div>
        </div>
    </div>

    <!-- Defenders -->
    <div class="category-title">Defenders</div>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/cubarsi.png" class="card-img-top" alt="Defender">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/balde.png" class="card-img-top" alt="Defender">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/araujo.png" class="card-img-top" alt="Defender">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/inigo.png" class="card-img-top" alt="Defender">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/christensen.png" class="card-img-top" alt="Defender">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/kounde.png" class="card-img-top" alt="Defender">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/eric.png" class="card-img-top" alt="Defender">
            </div>
        </div>
    </div>

    <!-- Midfielders -->
    <div class="category-title">Midfielders</div>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/gavi.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/pedri.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/torre.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/fermin.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/casado.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/olmo.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/dejong.png" class="card-img-top" alt="Midfielder">
            </div>
        </div>
    </div>

    <!-- Forwards -->
    <div class="category-title">Forwards</div>
    <div class="row g-4 mb-5">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/ferran.png" class="card-img-top" alt="Forward">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/lewandowski.png" class="card-img-top" alt="Forward">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/ansufati.png" class="card-img-top" alt="Forward">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/raphinha.png" class="card-img-top" alt="Forward">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/pau_victor.png" class="card-img-top" alt="Forward">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/lamine_yamal.png" class="card-img-top" alt="Forward">
            </div>
        </div>
    </div>

    <!-- Coach -->
    <div class="category-title">Coach</div>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="pict/flick.png" class="card-img-top" alt="Goalkeeper">
            </div>
        </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
