<?php
$streetErr = $emailErr = $cityErr = $streetNumberErr = $zipcode = "";
$street = $email = $city =  $streetNumber = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["street"])) {
        $streetErr = "Street is required";
    } else {
        $street = test_input($_POST["street"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $street)) {
            $streetErr = "Only letters and white space allowed";
        } else {
            $_SESSION["street"] = $street;
        }
    }

    if (empty($_POST["streetnumber"])) {
        $streetNumberErr = "Streetnumber is required";
    } else {
        $streetNumber = test_input($_POST["streetnumber"]);
        if (!is_numeric($streetNumber)) {
            $streetNumberErr = "Only numbers allowed";
        } else {
            $_SESSION["streetNumber"] = $streetNumber;
        }
    }

    if (empty($_POST["city"])) {
        $cityErr = "city is required";
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        } else {
            $_SESSION["city"] = $city;
        }
    }

    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "zipcode is required";
    } else {
        $zipcode = test_input($_POST["zipcode"]);
        if (!is_numeric($zipcode)) {
            return $zipcodeErr = "Only numbers allowed";
        } else {
            $_SESSION["zipcode"] = $zipcode;
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}