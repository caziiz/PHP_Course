
<?php 
 
// PHP PRACTICE 
 
// echo is used to display something on the screen 
 
echo "<h2 style='color: darkblue; font-family: Arial;'>PHP Code Practice</h2>"; 
 
// A variable starts with the $ sign 
 
$name = "abdiaziz"; 
$age = 22; 
$city = "Hargeisa"; 
 
echo "Name: $name <br>"; 
echo "Age: $age <br>"; 
echo "City: $city <br>"; 
 
// var_dump() shows the data type and value 
 
var_dump($name); 
 
echo "<br>"; 
 
// 4. echo and print 
 
echo "Welcome $name <br>"; 
 
print "Hello $name <br>"; 
 
// 5. ARITHMETIC OPERATORS 
 
$a = 12; 
$b = 4; 
 
// Addition 
$sum = $a + $b; 
 
// Subtraction 
$subtraction = $a - $b; 
 
// Multiplication 
$multiplication = $a * $b; 
 
// Division 
$division = $a / $b; 
 
// Modulus (remainder) 
$remainder = $a % $b; 
 
 
// Display results 
 
echo "<h3 style='color: green; font-family: Arial;'>Arithmetic</h3>"; 
 
echo "Addition: $a + $b = $sum <br>"; 
echo "Subtraction: $a - $b = $subtraction <br>"; 
echo "Multiplication: $a × $b = $multiplication <br>"; 
echo "Division: $a ÷ $b = $division <br>"; 
echo "Remainder: $a % $b = $remainder <br>"; 
 
// 6. STRING EXAMPLES 
 
$message = "The smart brown cat"; 
 
echo "<h3 style='color: green; font-family: Arial;'>String Examples</h3>"; 
 
 
// strlen() 
// Counts the number of characters in a string 
 
echo "Length: " . strlen($message) . "<br>"; 
 
 
// str_word_count() 
// Counts the number of words 
 
echo "Word count: " . str_word_count($message) . "<br>"; 
 
 
// strtoupper() 
// Converts the string to uppercase 
 
echo "Uppercase: " . strtoupper($message) . "<br>"; 
 
 
// strtolower() 
// Converts the string to lowercase 
 
echo "Lowercase: " . strtolower($message) . "<br>"; 
 
 
// ucfirst() 
// Makes the first character uppercase 
 
echo "First letter uppercase: " . ucfirst($message) . "<br>"; 
 
 
// ucwords() 
// Makes the first letter of every word uppercase 
 
echo "Every word uppercase: " . ucwords($message) . "<br>"; 
 
 
// strrev() 
// Reverses the string 
 
echo "Reversed: " . strrev($message) . "<br>"; 
 
 
// strpos() 
// Finds the position of a word/character 
 
echo "Position of 'smart': " . strpos($message, "smart") . "<br>"; 
 
 
// str_replace() 
// Replaces text with other text 
 
$newMessage = str_replace("cat", "bird", $message); 
 
echo "After replacement: $newMessage <br>"; 
 
 
 
// 7. STRING CONCATENATION 
 
 
// The . operator joins strings together 
 
$firstName = "abdiaziz"; 
$lastName = "mohamed"; 
 
$fullName = $firstName . " " . $lastName; 
 
echo "<h3 style='color: green; font-family: Arial;'>Concatenation</h3>"; 
 
echo "Full name: " . $fullName . "<br>"; 
 
// 8. IF / ELSE 
 
echo "<h3 style='color: green; font-family: Arial;'>If / Else Example</h3>"; 
 
$studentAge = 17; 
 
if ($studentAge >= 18) { 
 
    echo "You are an adult."; 
} else { 
 
    echo "You are under 18."; 
} 
 
// 9. IF / ELSEIF / ELSE 
 
echo "<h3 style='color: green; font-family: Arial;'>Grade Example</h3>"; 
 
$mark = 72; 
 
if ($mark >= 90) { 
 
    echo "Grade: A+"; 
} elseif ($mark >= 80) { 
 
    echo "Grade: A"; 
} elseif ($mark >= 70) { 
 
    echo "Grade: B"; 
} elseif ($mark >= 60) { 
 
    echo "Grade: C"; 
} elseif ($mark >= 50) { 
 
    echo "Grade: D"; 
} else { 
 
    echo "Grade: F"; 
} 
 
 
 
// 10. COMPARISON OPERATORS 
 
/* 
    ==   Equal 
    ===  Identical (same value AND same type) 
    !=   Not equal 
    >    Greater than 
    <    Less than 
    >=   Greater than or equal 
    <=   Less than or equal 
*/ 
 
$x = 15; 
$y = 25; 
 
echo "<h3 style='color: green; font-family: Arial;'>Comparison</h3>"; 
 
if ($x < $y) { 
 
    echo "$x is smaller than $y"; 
} else { 
 
    echo "$x is not smaller than $y"; 
} 
 
// 11. AND / OR CONDITIONS 
 
 
$age = 19; 
$hasID = true; 
 
echo "<h3 style='color: green; font-family: Arial;'>Multiple Conditions</h3>"; 
 
if ($age >= 18 && $hasID == true) { 
 
    echo "You are allowed to enter."; 
} else { 
 
    echo "You cannot enter."; 
} 
 
// 12. STRING CHECK 
 
 
$username = "abdiaziz"; 
 
echo "<h3 style='color: green; font-family: Arial;'>String Condition</h3>"; 
 
if ($username == "abdiaziz") { 
 
    echo "Welcome abdiaziz!"; 
} else { 
 
    echo "Unknown user."; 
} 
 
// 13. SWITCH - DAYS OF THE WEEK 
 
 
echo "<h3 style='color: green; font-family: Arial;'>Switch Example - Days of the Week</h3>"; 
 
 
$day = 2; 
 
 
// switch checks the value of $day 
 
switch ($day) { 
 
    case 1: 
        echo "Today is Monday."; 
        break; 
 
    case 2: 
        echo "Today is Tuesday."; 
        break; 
 
    case 3: 
        echo "Today is Wednesday."; 
        break; 
 
    case 4: 
        echo "Today is Thursday."; 
        break; 
 
    case 5: 
        echo "Today is Friday."; 
        break; 
 
    case 6: 
        echo "Today is Saturday."; 
        break; 
 
    case 7: 
        echo "Today is Sunday."; 
        break; 
 
    // default runs when none of the cases match 
 
    default: 
        echo "Invalid day number."; 
} 
 
// 14. SWITCH - WEEKDAY OR WEEKEND 
 
 
echo "<h3 style='color: green; font-family: Arial;'>Weekday / Weekend</h3>"; 
 
$day = 7; 
 
switch ($day) { 
 
    // Monday to Friday 
 
    case 1: 
    case 2: 
    case 3: 
    case 4: 
    case 5: 
 
        echo "It is a weekday."; 
        break; 
 
 
    // Saturday and Sunday 
 
    case 6: 
    case 7: 
 
        echo "It is the weekend."; 
        break; 
 
 
    default: 
 
        echo "Invalid day."; 
} 
 
 
 
 
echo "<hr>"; 
 
echo "<h3 style='color: green; font-family: Arial;'>End of PHP Practice</h3>"; 
 
?>

