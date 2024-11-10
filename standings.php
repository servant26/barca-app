<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://la-liga2.p.rapidapi.com/teams/standings",
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
    // Decode the JSON response
    $data = json_decode($response, true);

    // Start the HTML table
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Rank</th>
            <th>Team Name</th>
            <th>Points</th>
            <th>Matches Played</th>
            <th>Wins</th>
            <th>Draws</th>
            <th>Losses</th>
            <th>Goals Scored</th>
            <th>Goals Conceded</th>
            <th>Goal Difference</th>
            <th>Coach</th>
          </tr>";

    // Loop through the data and create table rows
    foreach ($data as $index => $team) {
        echo "<tr>
                <td>" . ($index + 1) . "</td>
                <td>" . htmlspecialchars($team['name']) . "</td>
                <td>" . htmlspecialchars($team['points']) . "</td>
                <td>" . htmlspecialchars($team['matchesPlayed']) . "</td>
                <td>" . htmlspecialchars($team['wins']) . "</td>
                <td>" . htmlspecialchars($team['draws']) . "</td>
                <td>" . htmlspecialchars($team['losses']) . "</td>
                <td>" . htmlspecialchars($team['goalsScored']) . "</td>
                <td>" . htmlspecialchars($team['goalsConceded']) . "</td>
                <td>" . htmlspecialchars($team['goalDifference']) . "</td>
                <td>" . htmlspecialchars($team['coach']) . "</td>
              </tr>";
    }

    // End the HTML table
    echo "</table>";
}
?>
