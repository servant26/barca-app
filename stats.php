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
    </style>
</head>
<body class="bg-dark text-white">
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid m-2 d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png" class="navbar-logo" alt="Barca" style="width: 40px; height: 40px;">
                <span class="d-inline d-lg-none ms-2 text-white">FC Barcelona</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="history.php">Match</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="#">Statistic</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="player.php">List Players</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <!-- Header -->
        <div class="text-center">
            <h3 class="mb-4">La Liga Stats</h3>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true">Standings</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="team-tab" data-bs-toggle="tab" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Top Score</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rating-tab" data-bs-toggle="tab" data-bs-target="#rating" type="button" role="tab" aria-controls="rating" aria-selected="false">Top Assist</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Standings Tab -->
            <div class="tab-pane fade show active" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                <div class="table-responsive">
                    <!-- Mengimpor file PHP standings.php -->
                    <?php include 'standings.php'; ?>
                </div>
            </div>

            <!-- Top Score Tab -->
            <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                <div class="table-responsive">
                    <!-- Mengimpor file PHP score.php -->
                    <?php include 'score.php'; ?>
                </div>
            </div>

            <!-- Top Assist Tab -->
            <div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab">
                <div class="table-responsive">
                    <!-- Mengimpor file PHP assist.php -->
                    <?php include 'assist.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
