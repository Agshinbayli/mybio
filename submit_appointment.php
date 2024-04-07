<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Email details
    $to = "aqsinbeyli@gmail.com"; // Change this to your email address
    $subject = "Appointment Request";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Preferred Date: $date\n";
    $message .= "Preferred Time: $time\n";

    // Send email
    if (mail($to, $subject, $message)) {
        echo "<p>Thank you for your appointment request. We will contact you shortly.</p>";
    } else {
        echo "<p>Failed to send appointment request. Please try again later.</p>";
    }
} else {
    // Redirect to appointment page if form is not submitted
    header("Location: appointment.html");
    exit;
}
?>
