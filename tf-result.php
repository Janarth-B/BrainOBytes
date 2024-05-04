<?php
// Database connection parameters
$host = "localhost";
$user = "root";
$pass = "";
$db = "quizz_results";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get quiz results data sent via POST
$data = json_decode(file_get_contents("php://input"), true);

// Sanitize and validate data (optional, depending on your requirements)

// Extract data
$quizName = $data['quiz_name'];
$duration = $data['duration'];
$correctAnswers = $data['correct_answers'];
$incorrectAnswers = $data['incorrect_answers'];
$pointsScored = $data['points_scored'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO tf_questions (quiz_name, duration, correct_answers, incorrect_answers, points_scored) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("siiii", $quizName, $duration, $correctAnswers, $incorrectAnswers, $pointsScored);

// Execute statement
if ($stmt->execute()) {
    // Quiz results stored successfully
    echo json_encode(array("status" => "success"));
} else {
    // Failed to store quiz results
    echo json_encode(array("status" => "error", "message" => $conn->error));
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
