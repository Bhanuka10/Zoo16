<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "medical_history_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_id = $_POST['doctor_id'];
    $medical_details = $_POST['medical_details'];

    $sql = "INSERT INTO history (date, doctor_name, doctor_id, medical_details)
            VALUES ('$date', '$doctor_name', '$doctor_id', '$medical_details')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
