<?php

	include "inc/functions.php";

    $to_email = "jolawale28@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: {$from}</br>";
	$headers .= " Reply-To: {$to_email} </br>";
	$headers .= "MIME-Version: 1.0 </br>";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1</br>";

    $subject = "\nYou have a message from your Sierra.";

    $logo = '#';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border: none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

	$secure_check = sanitize_my_email($to_email);

	if ($secure_check == false) {

    	echo "Invalid input";

	} else { //send email

    	mail($to_email, $subject, $body, $headers);
    	echo "This email is sent using PHP Mail";

	}

    // $send = mail($to, $subject, $body, $headers);

    echo $headers;
    echo $subject;
    echo $body;

    // header("Location: index.php");

?>