<?php
$streetErr = $emailErr = $cityErr = $streetNumberErr = $zipcode = "Yolo swaggerino";
$street = $email = $city =  $streetNumber = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["street"])) {
        $streetErr = "Street is required";
    } else {
        $street = test_input($_POST["street"]);
    }

    if (empty($_POST["streetNumber"])) {
        $streetNumberErr = "Streetnumber is required";
    } else {
        $streetNumber = test_input($_POST["streetNumber"]);
    }

    if (empty($_POST["city"])) {
        $cityErr = "city is required";
    } else {
        $city = test_input($_POST["city"]);
    }

    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "zipcode is required";
    } else {
        $zipcode = test_input($_POST["zipcode"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}