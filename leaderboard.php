<?php
include 'header.php';
include 'subnavbar.php';
include 'effect.php';

require 'database/connect.php';


$query = "SELECT playername, stars, flag, goals, assist, matches_played FROM users ORDER BY stars DESC LIMIT 50";
$result = $mysqli->query($query);

if (!$result) {
    die("Query error: " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
      
        * {
            margin: 0;
            padding: 0;
            font-family: Helvetica, Arial, sans-serif;
        }
        body {
            background: #232323;
        }
        input[type=text], textarea, input[type=email], input[type=password], input[type=tel], input[type=url], input[type=search], input[type=date] {
            padding: 10px;
            width: 100%;
            font-size: 14px;
            font-family: inherit;
            line-height: 24px;
            color: #555;
            background-color: #f1f1f1;
            border: none;
            transition: all 0.2s ease;
            -webkit-transition: all 0.2s ease;
        }
        input[type=text], textarea, input[type=email], input[type=password], input[type=tel], input[type=url], input[type=search], input[type=date], .material.woocommerce-page[data-form-style="default"] input#coupon_code {
            background-color: rgba(0,0,0,0.1);
            border-radius: 4px;
            border: 2px solid rgba(0,0,0,0);
        }
    
        #leaderboard {
            padding: 50px;
        }
        .ladder-nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            background: #5055CB;
            padding: 10px 25px;
            border-radius: 10px;
            border: 1px solid #686EF9;
        }
        .ladder-title {
            flex: 2;
        }
        .ladder-search {
            flex: 1;
            padding-right: 25px;
        }
        .ladder-title h1 {
            font-size: 20px;
            color: white !important;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }
        .ladder-search input {
            color: white;
        }
        .ladder-search input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #888DFF;
        }
        .ladder-search input::-moz-placeholder { /* Firefox 19+ */
            color: #888DFF;
        }
        .ladder-search input:-ms-input-placeholder { /* IE 10+ */
            color: #888DFF;
        }
        .ladder-search input:-moz-placeholder { /* Firefox 18- */
            color: #888DFF;
        }
    
        .leaderboard-results {
            text-align: left;
            border-collapse: collapse;
            width: 100%;
            background-color: #092635;
        }
        .leaderboard-results thead th {
            padding: 15px 25px;
            color: black;
            font-size: 14px;
            font-weight: bold;
            background-color: white;
            text-transform: uppercase;
        }
        .leaderboard-results tbody td {
            padding: 15px 25px;
            font-size: 16px;
            border-bottom: 5px solid #232323;
        }
        .leaderboard-results tbody td:nth-of-type(7) {
            font-weight: bold;
        }
        .leaderboard-results tbody tr:hover td {
            background: #1d1d1d;
        }
        .leaderboard-results tbody tr {
            color: white;
        }
        .leaderboard-results tbody tr:first-child {
            color: #ED9455;
        }
        .leaderboard-results tbody tr:nth-child(2) td {
            color: #ED9455;
        }
        .leaderboard-results tbody tr:nth-child(3) td {
            color: #ED9455;
        }
        .leaderboard-results tbody span {
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 50%;
        }
        .leaderboard-results tbody tr:first-child span {
            background: #5055CB;
            color: white;
        }
        .leaderboard-results tbody tr span {
            background: #262626;
            color: #747474;
        }
      
    </style>
</head>
<body>
    <div class="container-wrap">
        <section id="leaderboard">
            <nav class="ladder-nav">
                <div class="ladder-title">
                    <h1>Stats</h1>
                </div>
                <div class="ladder-search">
                    <input type="text" id="search-leaderboard" class="live-search-box" placeholder="Search Team, Player...">
                </div>
            </nav>
            <table id="rankings" class="leaderboard-results">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Country</th>
                        <th>Name</th>
                        <th>Stars</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th>Games Played</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 1; 
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rank . "</td>"; 
                        echo "<td><img src='assets/resources/flags/" . htmlspecialchars($row['flag']) . ".svg' alt='Flag' style='width: 30px; height: auto;'></td>";
                        echo "<td>" . htmlspecialchars($row['playername']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['stars']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['goals']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['assist']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['matches_played']) . "</td>";
                        echo "</tr>";
                        $rank++; 
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            loadRankings();
        });

        function loadRankings() {
            const request = new XMLHttpRequest();
            request.open("get", "https://codepen.io/imisterk/pen/MLgwOa.js");
            request.onload = () => {
                try {
                    const json = JSON.parse(request.responseText);
                    populateRankings(json);
                } catch (e) {
                    console.warn("Could not load Player Rankings! :(");
                }
            };
            request.send();
        }

        function populateRankings(json) {
            const rankingsBody = document.querySelector("#rankings > tbody");
            json.forEach((row) => {
                const tr = document.createElement("tr");

                const rankTd = document.createElement("td");
                rankTd.textContent = row.rank;
                tr.appendChild(rankTd);

                const countryTd = document.createElement("td");
                countryTd.textContent = row.flags;
                tr.appendChild(countryTd);

                const nameTd = document.createElement("td");
                nameTd.textContent = row.username;
                tr.appendChild(nameTd);

                const goalsTd = document.createElement("td");
                goalsTd.textContent = row.goals;
                tr.appendChild(goalsTd);

                const assistsTd = document.createElement("td");
                assistsTd.textContent = row.assists;
                tr.appendChild(assistsTd);

                const gamesPlayedTd = document.createElement("td");
                gamesPlayedTd.textContent = row.games_played;
                tr.appendChild(gamesPlayedTd);

                const starsTd = document.createElement("td");
                starsTd.textContent = row.stars;
                tr.appendChild(starsTd);

                rankingsBody.appendChild(tr);
            });
        }

        $("#search-leaderboard").keyup(function () {
            var value = this.value.toLowerCase();
            $("table").find("tr").each(function (index) {
                if (index === 0) return;
                var if_td_has = false;
                $(this).find("td").each(function () {
                    if_td_has = if_td_has || $(this).text().toLowerCase().indexOf(value) !== -1;
                });
                $(this).toggle(if_td_has);
            });
        });
    </script>
</body>
</html>
