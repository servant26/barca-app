<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <ul>
        <li><a href="standings.php">Rank</a></li>
        <li><a href="score.php">Top Score</a></li>
        <li><a href="assist.php">Top Assist</a></li>
        <li><a href="player.php">Daftar Pemain</a></li>
        <li><a href="history.php">History Pertandingan</a></li>
    </ul>
</body>
</html>

<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://la-liga2.p.rapidapi.com/teams/66a51c20841d8a52475a92d7/matches",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: la-liga2.p.rapidapi.com",
        "x-rapidapi-key: 932967fc1amshf0d9c3267c69148p1a39d3jsn7d1154df36d2"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
    $today = time();

    // Filter matches where the date is in the past
    $pastMatches = array_filter($data, function($match) use ($today) {
        return strtotime($match['date']) < $today;
    });

    // Sort past matches by date in descending order (latest first)
    usort($pastMatches, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });

    // Start the HTML table
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Date</th>
            <th>Match Week</th>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>Score</th>
            <th>Winning Team</th>
            <th>Stadium</th>
          </tr>";

    // Loop through the sorted past matches and display only the 5 most recent
    foreach (array_slice($pastMatches, 0, 5) as $match) {
        $homeTeam = $match['homeTeam']['team']['name'] ?? 'N/A';
        $homeScore = $match['homeTeam']['score'] ?? 'N/A';
        $awayTeam = $match['awayTeam']['team']['name'] ?? 'N/A';
        $awayScore = $match['awayTeam']['score'] ?? 'N/A';
        $score = $homeScore . " - " . $awayScore;
        $date = date("Y-m-d H:i", strtotime($match['date'] ?? ''));
        $winningTeam = $match['winningTeam'] ?? 'N/A';
        $stadium = $match['stadium'] ?? 'N/A';
        $matchWeek = $match['matchWeek'] ?? 'N/A';

        echo "<tr>
                <td>" . htmlspecialchars($date) . "</td>
                <td>" . htmlspecialchars($matchWeek) . "</td>
                <td>" . htmlspecialchars($homeTeam) . "</td>
                <td>" . htmlspecialchars($awayTeam) . "</td>
                <td>" . htmlspecialchars($score) . "</td>
                <td>" . htmlspecialchars($winningTeam) . "</td>
                <td>" . htmlspecialchars($stadium) . "</td>
              </tr>";
    }

    // End the HTML table
    echo "</table>";
}
?>
