<?php
// book.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $message = htmlspecialchars($_POST['message']);

    // --- FOR TESTING: Display the received data ---
    //echo "<h2>Booking Request Received!</h2>";
    //echo "<p><strong>Name:</strong> " . $name . "</p>";
    //echo "<p><strong>Email:</strong> " . $email . "</p>";
    //echo "<p><strong>Phone:</strong> " . $phone . "</p>";
    //echo "<p><strong>Date:</strong> " . $date . "</p>";
    //echo "<p><strong>Message:</strong> " . ($message ? $message : "N/A") . "</p>";
    //echo "<p>Thank you for your booking. We will contact you shortly!</p>";

    // --- REAL-WORLD SCENARIO: Save to a file or database, or send an email ---

    // Option A: Save to a simple text file (for basic local testing)
    $booking_data = "Name: $name, Email: $email, Phone: $phone, Date: $date, Message: $message\n";
    file_put_contents('bookings.txt', $booking_data, FILE_APPEND);
    // You might redirect the user after this: header("Location: success.html"); exit();

    // Option B: Send an email (requires mail server configuration on localhost)
    $to = "your_email@example.com";
     $subject = "New Booking from LAXAMI THREADING SALON";
     $headers = "From: webmaster@example.com\r\n";
     $headers .= "Reply-To: $email\r\n";
     $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
     $email_body = "<html><body>";
    $email_body .= "<h2>New Booking Request</h2>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Phone:</strong> $phone</p>";
    $email_body .= "<p><strong>Date:</strong> $date</p>";
    $email_body .= "<p><strong>Message:</strong> " . ($message ? $message : "No specific requests") . "</p>";
    $email_body .= "</body></html>";
    mail($to, $subject, $email_body, $headers);

    // Option C: Save to a database (requires database connection code)
    // require_once 'db_config.php'; // Your database connection file
    // try {
    //     $stmt = $pdo->prepare("INSERT INTO bookings (name, email, phone, booking_date, message) VALUES (?, ?, ?, ?, ?)");
    //     $stmt->execute([$name, $email, $phone, $date, $message]);
    //     echo "<p>Booking saved to database successfully!</p>";
    // } catch (PDOException $e) {
    //     echo "<p>Database error: " . $e->getMessage() . "</p>";
    // }

} else {
    // If someone tries to access book.php directly without POSTing a form
    echo "Access Denied: This page processes form submissions.";
}
?>