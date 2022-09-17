<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to ODPP Complaints \n";
    $response .= "1. My complaint status \n";
    $response .= "2. My compplaint number";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Choose 1 to view complaint status \n";
    $response .= "1. Complaint status \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Your complaint number is ".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "PENDING";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your complaint is ".$accountNumber;

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

