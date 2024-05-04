<?php
$users = rand(1, 4);
$mcq_access = rand(1, 15);
$pixa_access = rand(1, 15);
$tf_access = rand(1, 15);
$highest_score = rand(40, 40);
$shortest_duration = rand(10, 15);
$longest_duration = rand(60, 75);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA VISUALIZATION</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .heading {
            width: 100%;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .stat {
            width: calc(33.33% - 20px);
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .stat:hover {
            transform: scale(1.05);
        }

        .stat h2 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }

        .number {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            transition: background-color 0.3s ease-in-out;
            background-color: #ffc0cb; /* Baby pink background color */
        }

        .number:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">DATA VISUALIZATION</div>
        <div id="Users" class="stat">
            <h2>Number of Users</h2>
            <input type="text" class="number" value="<?php echo $users; ?>" readonly>
        </div>
        <div id="MCQ" class="stat">
            <h2>MCQ Access</h2>
            <input type="text" class="number" value="<?php echo $mcq_access; ?>" readonly>
        </div>
        <div id="PIXA" class="stat">
            <h2>PIXA Access</h2>
            <input type="text" class="number" value="<?php echo $pixa_access; ?>" readonly>
        </div>
        <div id="TrueFalse" class="stat">
            <h2>True or False Access</h2>
            <input type="text" class="number" value="<?php echo $tf_access; ?>" readonly>
        </div>
        <div id="HighestScore" class="stat">
            <h2>Highest Score</h2>
            <input type="text" class="number" value="<?php echo $highest_score; ?>" readonly>
        </div>
        <div id="ShortestDuration" class="stat">
            <h2>Shortest Duration</h2>
            <input type="text" class="number" value="<?php echo $shortest_duration; ?>" readonly>
        </div>
        <div id="LongestDuration" class="stat">
            <h2>Longest Duration</h2>
            <input type="text" class="number" value="<?php echo $longest_duration; ?>" readonly>
        </div>
    </div>
</body>
</html>
