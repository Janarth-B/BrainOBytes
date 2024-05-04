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
    <!-- Add Google Fonts for unique font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap">
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
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
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

        .gif-container {
            display: flex;
            align-items: center;
            margin-top: 50px; /* Increased margin top */
        }

        .gif-box {
            width: 400px; /* Increased width */
            height: 300px; /* Increased height */
            margin: 50px; /* Increased margin between GIF boxes */
            cursor: pointer;
            border-radius: 20px; /* Added border-radius for curved edges */
            overflow: hidden; /* Ensure content within the box is clipped to the border radius */
            transition: transform 0.3s; /* Added transition */
        }

        .gif-box.MCQ {
            background: url('mcq.gif') no-repeat center center;
        }

        .gif-box.TrueorFalse {
            background: url('tf.gif') no-repeat center center;
        }

        .gif-box.Pixa {
            background: url('pixa.gif') no-repeat center center;
        }

        .gif-box:hover {
            transform: scale(1.1); /* Scale up on hover */
        }

        /* Animation for clicked gif-box */
        .gif-box.clicked {
            animation: clickAnimation 0.5s linear; /* Animation for clicked gif-box */
        }

        @keyframes clickAnimation {
            0% { transform: scale(1); }
            100% { transform: scale(1.5); }
        }

        /* User name and logout */
        .user-info {
            position: absolute;
            top: 40px;
            left: 1200px; /* Positioned to the left */
            color: black;
            display: flex;
            align-items: end;
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
            position: end;
            top: 20px;
            right: 20px; /* Positioned to the right */
            color: whitesmoke;
            font-size: 24px;
            cursor: pointer;
        }

        .settings-dropdown {
            position: absolute;
            top: 60px;
            right: 10px; /* Adjusted position */
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

        /* Updated font for BrainOBytes */
        .header h1 {
            font-family: 'Roboto Slab', serif;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>BrainOBytes</h1>
    </div>
    <div class="user-info">
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");

            if ($query && mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                echo '<i class="fas fa-user"></i><span>Welcome, ' . $row['firstName'] . ' ' . $row['lastName'] . '</span>';
            }
        }
        ?>
        <div class="settings-icon" onclick="toggleSettingsDropdown()">
            <i class="fas fa-cog"></i>
        </div>
        <div class="settings-dropdown" id="settingsDropdown">
            <a href="dashboard.php">Dashboard</a>
            <a href="overview.php">Overview</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="gif-container">
        <div class="gif-box MCQ" onclick="animateGifBoxClick('MCQ')"></div>
        <div class="gif-box TrueorFalse" onclick="animateGifBoxClick('TrueorFalse')"></div>
        <div class="gif-box Pixa" onclick="animateGifBoxClick('Pixa')"></div>
    </div>

    <script>
        function animateGifBoxClick(topic) {
            // Get the clicked gif-box
            var gifBox = document.querySelector('.gif-box.' + topic);

            // Add the 'clicked' class to the gif-box
            gifBox.classList.add('clicked');

            // Remove the 'clicked' class after the animation ends
            setTimeout(function () {
                gifBox.classList.remove('clicked');
                // Navigate to the corresponding page after the animation ends
                switch (topic) {
                    case 'MCQ':
                        window.location.href = 'mcq-1.html';
                        break;
                    case 'TrueorFalse':
                        window.location.href = 'tf-1.html';
                        break;
                    case 'Pixa':
                        window.location.href = 'pixa.html';
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
