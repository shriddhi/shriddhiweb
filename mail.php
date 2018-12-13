<?php
    $to = 'kewal@shriddhi.com';
    $name = $_GET["name"];
    $email= $_GET["email"];
    $text= $_GET["message"];
    $subject= $_GET["phone"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$name.'  '.$subject.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$subject.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    echo $to ;
    echo $email ;
    echo $message ;
    echo $headers ;

    $success = mail($to, $email, $message, $headers);

    if (!$success) {
        $errorMessage = error_get_last()['message'];
    }else{
        echo 'Your message has been sent.';
    }

?>
