<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainOBytes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add Font Awesome for icons -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            background-image: url('bg.jpg'); /* Updated background image file name */
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: rgba(52, 152, 219, 0.8); /* Nice blue color with opacity */
            color: white;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }
        .btn-container {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 1;
        }
        .btn {
            border: none;
            color: white;
            padding: 20px 40px; /* Larger padding */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px; /* Larger font size */
            margin: 10px; /* Increased margin */
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Added transition */
        }
        .btn.MCQ {
            background: linear-gradient(145deg, #4CAF50, #45a049); /* Green gradient */
        }
        .btn.TrueorFalse {
            background: linear-gradient(145deg, #f39c12, #e67e22); /* Orange gradient */
        }
        .btn.Pixa {
            background: linear-gradient(145deg, #3498db, #2980b9); /* Blue gradient */
        }
        .btn:hover {
            filter: brightness(1.1); /* Lighten the button on hover */
            transform: scale(1.1); /* Scale up on hover */
        }

        /* Animation for clicked button */
        .btn.clicked {
            animation: clickAnimation 0.5s linear; /* Animation for clicked button */
        }

        @keyframes clickAnimation {
            0% { transform: scale(1); }
            100% { transform: scale(10); }
        }

        /* User name and logout */
        .user-info {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            display: flex;
            align-items: center;
        }
        .user-info i {
            margin-right: 5px;
        }
        .user-info span {
            margin-right: 10px;
        }
        .logout-btn {
            background-color: #f39c12; /* Orange color */
            color: white;
            border: none;
            padding: 8px 12px;
            margin-left: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }
        .logout-btn:hover {
            background-color: #e67e22; /* Darker orange color on hover */
        }
        .logout-btn:active {
            transform: scale(0.9); /* Scale down on click */
        }
        .settings-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        .settings-dropdown {
            position: absolute;
            top: 60px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 5px;
            padding: 10px;
            display: none;
        }
        .settings-dropdown a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 5px 0;
            transition: 0.3s;
        }
        .settings-dropdown a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        .user-info:hover .settings-dropdown {
            display: block;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>BrainOBytes Quiz</h1>
    </div>
    <div class="user-info">
        <div class="settings-icon" onclick="toggleSettingsDropdown()">
            <i class="fas fa-cog"></i>
        </div>
        <div class="settings-dropdown" id="settingsDropdown">
            <a href="#">Dashboard</a>
            <a href="#">Profile Manager</a>
            <a href="#">Achievements</a>
            <a href="logout.php">Logout</a>
        </div>
        <i class="fas fa-user"></i>
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
            
            if ($query && mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                echo '<span>Welcome, ' . $row['firstName'] . ' ' . $row['lastName'] . '</span>';
            } else {
                echo '<span>Welcome, User</span>';
            }
        } else {
            echo '<span>Welcome, Guest</span>';
        }
        ?>
    </div>
    <div class="btn-container">
        <button class="btn MCQ" onclick="animateButtonClick('MCQ')">MCQ</button>
        <button class="btn TrueorFalse" onclick="animateButtonClick('TrueorFalse')">True or False</button>
        <button class="btn Pixa" onclick="animateButtonClick('Pixa')">Pixa</button>
    </div>

    <script>
        function animateButtonClick(topic) {
            // Get the clicked button
            var button = document.querySelector('.btn.' + topic);
            
            // Add the 'clicked' class to the button
            button.classList.add('clicked');
            
            // Remove the 'clicked' class after the animation ends
            setTimeout(function() {
                button.classList.remove('clicked');
                // Navigate to the corresponding page after the animation ends
                switch(topic) {
                    case 'MCQ':
                        window.location.href = 'multiple.html';
                        break;
                    case 'TrueorFalse':
                        window.location.href = 'trueorfalse.html';
                        break;
                    case 'Pixa':
                        window.location.href = 'imganswer.html';
                        break;
                }
            }, 500); // Adjust this value to match the animation duration
        }

        function toggleSettingsDropdown() {
            var dropdown = document.getElementById('settingsDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>

</html>
