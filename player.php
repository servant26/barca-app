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

$teamId = "66a51c20841d8a52475a92d7";
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://la-liga2.p.rapidapi.com/teams/$teamId/players",
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

    // Start the HTML table
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Name</th>
            <th>Country</th>
            <th>Position</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Height (m)</th>
            <th>Shirt Number</th>
            <th>Goals</th>
            <th>Assists</th>
            <th>Appearances</th>
            <th>Minutes Played</th>
            <th>Yellow Cards</th>
            <th>Red Cards</th>
          </tr>";

    // Loop through the data and create table rows
    foreach ($data as $player) {
        echo "<tr>
                <td>" . htmlspecialchars($player['name']) . "</td>
                <td>" . htmlspecialchars($player['country']) . "</td>
                <td>" . htmlspecialchars($player['position']) . "</td>
                <td>" . htmlspecialchars($player['age']) . "</td>
                <td>" . htmlspecialchars($player['dateOfBirth']) . "</td>
                <td>" . htmlspecialchars($player['height']) . "</td>
                <td>" . htmlspecialchars($player['shirtNumber']) . "</td>
                <td>" . htmlspecialchars($player['goals']) . "</td>
                <td>" . htmlspecialchars($player['assists']) . "</td>
                <td>" . htmlspecialchars($player['appearances']) . "</td>
                <td>" . htmlspecialchars($player['minutesPlayed']) . "</td>
                <td>" . htmlspecialchars($player['yellowCards']) . "</td>
                <td>" . htmlspecialchars($player['redCards']) . "</td>
              </tr>";
    }

    // End the HTML table
    echo "</table>";
}
?>
