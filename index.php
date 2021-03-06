<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

if (isset($_GET['food']) && $_GET['food'] === "0") {
    $products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];
}

function calculateTotalValue($products, $cart, $totalValue)
{
    $totalValue += getCookie("totalValue");
    foreach ($cart as $key => $value) {
        $totalValue += $products[$key]['price'];
    }
    setcookie("totalValue", "$totalValue", time() + (86400 * 30), "/");
    return $totalValue;
}

function getCookie($name)
{
    return $_COOKIE[$name];
}

function getSessionValue($name)
{
    return $_SESSION[$name];
}


$totalValue = 0;

if (!isset($_COOKIE['totalValue'])) {
    setcookie("totalValue", "0", time() + (86400 * 30), "/");
}

require 'form-validation.php';
require 'form-view.php';
whatIsHappening();

$tt = new DateTime();
// var_dump($tt);
// var_dump($tt->add(3600));


// var_dump(calculateTotalValue($products, $_POST['products'], $totalValue));