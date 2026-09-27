<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assignment 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 30px;
            color: #333;
        }

        .section {
            background: white;
            border-left: 5px solid #4a90e2;
            border-radius: 8px;
            padding: 20px 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .section h2 {
            margin: 0 0 6px 0;
            color: #4a90e2;
            font-size: 1.1em;
        }

        .definition {
            font-size: 0.88em;
            color: #888;
            margin-bottom: 12px;
            font-style: italic;
        }

        .result {
            background: #f4f8ff;
            border-radius: 5px;
            padding: 10px 15px;
            font-family: monospace;
            font-size: 1em;
            color: #222;
        }

        /* Different accent colors per section */
        .q1  { border-color: #e74c3c; } .q1  h2 { color: #e74c3c; }
        .q2  { border-color: #e67e22; } .q2  h2 { color: #e67e22; }
        .q3  { border-color: #f1c40f; } .q3  h2 { color: #c9a800; }
        .q4  { border-color: #2ecc71; } .q4  h2 { color: #27ae60; }
        .q5  { border-color: #1abc9c; } .q5  h2 { color: #16a085; }
        .q6  { border-color: #3498db; } .q6  h2 { color: #2980b9; }
        .q7  { border-color: #9b59b6; } .q7  h2 { color: #8e44ad; }
        .q8  { border-color: #34495e; } .q8  h2 { color: #34495e; }
        .q9  { border-color: #e91e63; } .q9  h2 { color: #e91e63; }
        .q10 { border-color: #00bcd4; } .q10 h2 { color: #00838f; }

        /* Multiplication table */
        table {
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 0.9em;
        }

        table th {
            background: #34495e;
            color: white;
            padding: 8px 12px;
            text-align: center;
        }

        table td {
            padding: 7px 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table tr:nth-child(even) td { background: #f4f4f4; }
        table tr:hover td { background: #dceeff; }
    </style>
</head>
<body>

<?php

// ─── Q1: Greatest & Smallest ─────────────────────────────────────────────────
$a = 15; $b = 7; $c = 22;

$greatest = $a;
if ($b > $greatest) $greatest = $b;
if ($c > $greatest) $greatest = $c;

$smallest = $a;
if ($b < $smallest) $smallest = $b;
if ($c < $smallest) $smallest = $c;

echo "
<div class='section q1'>
    <h2>Q1 — Greatest & Smallest of 3 Numbers</h2>
    <div class='definition'>Compare three numbers and find the largest and smallest without using built-in functions.</div>
    <div class='result'>Numbers: ($a, $b, $c) → Greatest = <strong>$greatest</strong>, Smallest = <strong>$smallest</strong></div>
</div>";


// ─── Q2: Divisibility ────────────────────────────────────────────────────────
$n = 15;

if ($n % 3 == 0 && $n % 5 == 0)       $msg = "$n → divisible by <strong>both 3 and 5</strong>";
elseif ($n % 3 == 0)                   $msg = "$n → divisible by <strong>3 only</strong>";
elseif ($n % 5 == 0)                   $msg = "$n → divisible by <strong>5 only</strong>";
else                                   $msg = "$n → <strong>not divisible</strong> by 3 or 5";

echo "
<div class='section q2'>
    <h2>Q2 — Divisibility Check</h2>
    <div class='definition'>A number is divisible by X if the remainder (%) is 0. Check if the number is divisible by 3, 5, both, or neither.</div>
    <div class='result'>$msg</div>
</div>";


// ─── Q3: Odd & Even ──────────────────────────────────────────────────────────
$odd = ""; $even = "";
for ($i = 2;  $i <= 20; $i++) if ($i % 2 != 0) $odd  .= "$i ";
for ($i = 35; $i >= 7;  $i--) if ($i % 2 == 0) $even .= "$i ";

echo "
<div class='section q3'>
    <h2>Q3 — Odd &amp; Even Numbers</h2>
    <div class='definition'>Odd numbers are not divisible by 2. Even numbers are divisible by 2. The second loop counts down from 35 to 7.</div>
    <div class='result'>
        Odd (2 → 20): <strong>$odd</strong><br>
        Even (35 → 7): <strong>$even</strong>
    </div>
</div>";


// ─── Q4: Divisible by 2 & 5 ──────────────────────────────────────────────────
$div25 = "";
for ($i = 50; $i >= 2; $i--) if ($i % 2 == 0 && $i % 5 == 0) $div25 .= "$i ";

echo "
<div class='section q4'>
    <h2>Q4 — Divisible by 2 &amp; 5 (50 → 2)</h2>
    <div class='definition'>A number divisible by both 2 and 5 is always divisible by 10. The loop counts down from 50 to 2.</div>
    <div class='result'>Result: <strong>$div25</strong></div>
</div>";


// ─── Q5: Reverse a number ────────────────────────────────────────────────────
$num = 12345; $reversed = 0; $temp = $num;
while ($temp != 0) {
    $reversed = $reversed * 10 + ($temp % 10);
    $temp     = (int)($temp / 10);
}

echo "
<div class='section q5'>
    <h2>Q5 — Reverse a Number</h2>
    <div class='definition'>Extract the last digit using % 10, build the reversed number by shifting digits left (* 10), then remove the last digit using integer division.</div>
    <div class='result'>Reverse of <strong>$num</strong> = <strong>$reversed</strong></div>
</div>";


// ─── Q7: HCF ─────────────────────────────────────────────────────────────────
$x = 8; $y = 12;
$p = $x; $q = $y;
while ($q != 0) { $temp = $q; $q = $p % $q; $p = $temp; }
$hcf = $p;

echo "
<div class='section q7'>
    <h2>Q7 — HCF (Highest Common Factor)</h2>
    <div class='definition'>The HCF is the largest number that divides both integers exactly. Calculated using the Euclidean algorithm: repeatedly replace the larger number with the remainder until 0.</div>
    <div class='result'>HCF(<strong>$x</strong>, <strong>$y</strong>) = <strong>$hcf</strong></div>
</div>";


// ─── Q6: LCM ─────────────────────────────────────────────────────────────────
$lcm = ($x * $y) / $hcf;

echo "
<div class='section q6'>
    <h2>Q6 — LCM (Lowest Common Multiple)</h2>
    <div class='definition'>The LCM is the smallest number that both integers divide into evenly. Formula: LCM(a, b) = (a × b) / HCF(a, b).</div>
    <div class='result'>LCM(<strong>$x</strong>, <strong>$y</strong>) = (<strong>$x</strong> × <strong>$y</strong>) / HCF = <strong>$lcm</strong></div>
</div>";


// ─── Q8: Multiplication Table ─────────────────────────────────────────────────
echo "
<div class='section q8'>
    <h2>Q8 — 12×12 Multiplication Table</h2>
    <div class='definition'>Two nested loops: the outer loop controls the row, the inner loop controls the column. Each cell shows row × column.</div>
    <table>
        <tr><th>×</th>";
for ($i = 1; $i <= 12; $i++) echo "<th>$i</th>";
echo "</tr>";
for ($i = 1; $i <= 12; $i++) {
    echo "<tr><th>$i</th>";
    for ($j = 1; $j <= 12; $j++) echo "<td>" . ($i * $j) . "</td>";
    echo "</tr>";
}
echo "</table></div>";


// ─── Q9: Prime check ─────────────────────────────────────────────────────────
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) if ($n % $i == 0) return false;
    return true;
}

$n      = 29;
$answer = isPrime($n) ? "Yes, <strong>$n is prime</strong>" : "No, <strong>$n is not prime</strong>";

echo "
<div class='section q9'>
    <h2>Q9 — Prime Number Check</h2>
    <div class='definition'>A prime number is only divisible by 1 and itself. We check all divisors from 2 up to √n — if any divide evenly, it's not prime.</div>
    <div class='result'>Is $n prime? → $answer</div>
</div>";


// ─── Q10: Primes 10–50 ───────────────────────────────────────────────────────
$primes = "";
for ($i = 10; $i <= 50; $i++) if (isPrime($i)) $primes .= "$i ";

echo "
<div class='section q10'>
    <h2>Q10 — Prime Numbers from 10 to 50</h2>
    <div class='definition'>Apply the prime check to every number in the range 10–50 and print those that pass.</div>
    <div class='result'>Primes: <strong>$primes</strong></div>
</div>";

?>
</body>
</html>