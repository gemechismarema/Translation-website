send-email.php
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set the recipient email address
    $to = 'maremagemechis5@gmail.com';

    // Set the email subject
    $subject = 'New message from your website';

    // Set the email message
    $message = "Name: $name\nEmail: $email\nMessage: $message";

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // If the email was sent successfully, redirect to the thank you page
        header('Location: thank-you.html');
        exit;
    } else {
        // If the email failed to send, redirect to an error page
        header('Location: error.html');
        exit;
    }
}

?>
