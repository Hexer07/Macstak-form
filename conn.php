<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MacStack_Registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $question = isset($_POST['question']) ? $_POST['question'] : '';

    // Validate the phone number (check that it's numeric and between 10-15 characters)
    if (!preg_match('/^\d{10,15}$/', $phone)) {
        die("Invalid phone number format.");
    }

    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($course) || empty($year) || empty($email) || empty($phone) || empty($question)) {
        die("Please fill in all the required fields.");
    }

    // Prepare and bind the query
    $stmt = $conn->prepare("INSERT INTO `form`(`fname`, `lname`, `course`, `year`, `email`, `phone`, `question`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    if (!$stmt->bind_param("sssssss", $fname, $lname, $course, $year, $email, $phone, $question)) {
        die("Bind failed: " . $stmt->error);
    }

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    } else {
        echo "New record created successfully";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
