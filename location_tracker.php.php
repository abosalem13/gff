<?php

// Get the IP address of the visitor
$ip_address = $_SERVER['REMOTE_ADDR'];

// Use IP Geolocation API to get location based on IP
$api_key = 'YOUR_API_KEY';
$api_url = "https://api.ipgeolocation.io/ipgeo?apiKey=$api_key&ip=$ip_address";
$response = file_get_contents($api_url);
$data = json_decode($response, true);

// Extract location information
$city = $data['city'];
$region = $data['region_name'];
$country = $data['country_name'];

// Email details
$to_email = 'imobilejordan@gmail.com';
$subject = 'Visitor Location';
$message = "Visitor's location: $city, $region, $country";
$headers = 'From: your_email@example.com' . "\r\n" .
    'Reply-To: your_email@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Send email
$mail_sent = mail($to_email, $subject, $message, $headers);

// Check if email was sent successfully
if ($mail_sent) {
    echo "Email sent successfully!";
} else {
    echo "Email sending failed!";
}

?>
