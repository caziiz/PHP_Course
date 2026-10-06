<?php
// Step 1: array of 10 countries and their capitals
$countries = [
    "Somalia"  => "Mogadishu",
    "Kenya"    => "Nairobi",
    "Ethiopia" => "Addis Ababa",
    "Egypt"    => "Cairo",
    "Nigeria"  => "Abuja",
    "France"   => "Paris",
    "Germany"  => "Berlin",
    "Japan"    => "Tokyo",
    "Brazil"   => "Brasilia",
    "Canada"   => "Ottawa",
];

// Step 2: one function, 1 parameter, returns the capital
function getCapital($country) {
    global $countries;
    if (array_key_exists($country, $countries)) {
        return $countries[$country];
    }
    return "Not found";
}

// Step 3: display one capital using the function
echo "The capital of Somalia is " . getCapital("France") . "<br><br>";

// Step 4: display all countries and capitals
echo "<h3>All countries and capitals</h3>";
foreach ($countries as $country => $capital) {
    echo "$country - $capital<br>";
}
?>