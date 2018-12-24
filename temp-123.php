<?php

echo "<pre>";
print_r($_REQUEST);


error_reporting(E_ALL);
ini_set('display_errors', 1);

// using SendGrid's 
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("rajesh291093@gmail.com", "Website user");
$email->setSubject("Message From Web User");
$email->addTo("rajesh291093@gmail.com", "Web admin");
//$email->addTo("shashibhushan0@gmail.com", "Web admin");
//$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<table><tr><td><strong>First Name</strong></td><td>".$_REQUEST['name']."</td></tr><tr><td><strong>Last Name</strong></td><td>".$_REQUEST['lastname']."</td></tr><tr><td><strong>Email Id</strong></td><td>".$_REQUEST['email']."</td></tr><tr><td><strong>Subject</strong></td><td>".$_REQUEST['subject']."</td></tr></table>"
);
$sendgrid = new \SendGrid('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');

//$response = $sendgrid->send($email);

try {
echo 1;
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
echo 2;
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>