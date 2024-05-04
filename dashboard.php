<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATISTICS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .table-container {
            display: none;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f9f9f9;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .mcq {
            background-color: #d2eafb;
        }

        .pixa {
            background-color: #e4f7dc;
        }

        .tf {
            background-color: #ffd8d0;
        }

        .button-container {
            margin-bottom: 20px;
        }

        .button-container button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        canvas {
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>STATISTICS</h1>
        <div class="button-container">
            <button onclick="showTable('mcqTable')">MCQ MODULE</button>
            <button onclick="showTable('pixaTable')">PIXA MODULE</button>
            <button onclick="showTable('tfTable')">TRUE or FALSE MODULE</button>
        </div>

        <div class="table-container" id="mcqTable">
            <h2>MCQ Questions</h2>
            <canvas id="mcqChart" width="300" height="150"></canvas>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Quiz Name</th>
                    <th>Duration</th>
                    <th>Points Scored</th>
                    <th>Timestamp</th>
                    <th>Participant</th>
                </tr>
                <?php
                $participant_names = ['Jessie Francis', 'Hari Balan', 'Jones Martin', 'K Jeeva', 'Josh Francis'];
                $correct_answers = 0; // Initialize correct_answers
                for ($i = 1; $i <= 10; $i++) {
                    shuffle($participant_names);
                    $duration = rand(30, 60);
                    $points_scored = $correct_answers * 10;
                    $timestamp = date('Y-m-d H:i:s', strtotime("-$i days"));
                    $participant = $participant_names[0];
                    echo "<tr class='mcq'>";
                    echo "<td>$i</td>";
                    echo "<td>MCQ</td>";
                    echo "<td>$duration seconds</td>";
                    echo "<td>$points_scored</td>";
                    echo "<td>$timestamp</td>";
                    echo "<td>$participant</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        
        <div class="table-container" id="pixaTable">
            <h2>PIXA Questions</h2>
            <canvas id="pixaChart" width="300" height="150"></canvas>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Quiz Name</th>
                    <th>Duration</th>
                    <th>Points Scored</th>
                    <th>Timestamp</th>
                    <th>Participant</th>
                </tr>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    shuffle($participant_names);
                    $duration = rand(30, 60);
                    $points_scored = $correct_answers * 10;
                    $timestamp = date('Y-m-d H:i:s', strtotime("-$i days"));
                    $participant = $participant_names[0];
                    echo "<tr class='pixa'>";
                    echo "<td>$i</td>";
                    echo "<td>PIXA</td>";
                    echo "<td>$duration seconds</td>";
                    echo "<td>$points_scored</td>";
                    echo "<td>$timestamp</td>";
                    echo "<td>$participant</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        
        <div class="table-container" id="tfTable">
            <h2>True or False Questions</h2>
            <canvas id="tfChart" width="300" height="150"></canvas>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Quiz Name</th>
                    <th>Duration</th>
                    <th>Points Scored</th>
                    <th>Timestamp</th>
                    <th>Participant</th>
                </tr>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    shuffle($participant_names);
                    $duration = rand(30, 60);
                    $points_scored = $correct_answers * 10;
                    $timestamp = date('Y-m-d H:i:s', strtotime("-$i days"));
                    $participant = $participant_names[0];
                    echo "<tr class='tf'>";
                    echo "<td>$i</td>";
                    echo "<td>True or False</td>";
                    echo "<td>$duration seconds</td>";
                    echo "<td>$points_scored</td>";
                    echo "<td>$timestamp</td>";
                    echo "<td>$participant</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        function showTable(tableId) {
            var tables = document.getElementsByClassName('table-container');
            for (var i = 0; i < tables.length; i++) {
                tables[i].style.display = 'none';
            }
            document.getElementById(tableId).style.display = 'block';

            if (tableId === 'mcqTable') {
                drawBarChart('mcqChart', ['Question 1', 'Question 2', 'Question 3', 'Question 4', 'Question 5'], [30, 40, 50, 20, 60]);
            } else if (tableId === 'pixaTable') {
                drawBarChart('pixaChart', ['Question 1', 'Question 2', 'Question 3', 'Question 4', 'Question 5'], [50, 20, 30, 40, 50]);
            } else if (tableId === 'tfTable') {
                drawBarChart('tfChart', ['Question 1', 'Question 2', 'Question 3', 'Question 4', 'Question 5'], [40, 30, 20, 50, 60]);
            }
        }

        function drawBarChart(canvasId, labels, data) {
            var ctx = document.getElementById(canvasId).getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Points Scored',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    </script>
</body>
</html>
