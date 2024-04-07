<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Email details
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "Appointment Request";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Preferred Date: $date\n";
    $message .= "Preferred Time: $time\n";

    // Send email using Formspree
    $url = "https://formspree.io/f/moqgpjye"; // Formspree endpoint
    $data = [
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'subject' => $subject,
        'message' => $message
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Check if email was sent successfully
    if ($result !== false) {
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
