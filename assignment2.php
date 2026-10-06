<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP &amp; MySQL - Assignment 2</title>
<style>
  :root {
    --primary: #4f46e5;
    --primary-dark: #3730a3;
    --accent: #06b6d4;
    --bg: #eef2ff;
    --text: #1e293b;
    --muted: #64748b;
    --good: #16a34a;
    --bad: #dc2626;
  }
  * { box-sizing: border-box; }
  body {
    margin: 0;
    font-family: "Segoe UI", Roboto, Arial, sans-serif;
    color: var(--text);
    background: linear-gradient(160deg, #eef2ff 0%, #e0f2fe 100%);
    min-height: 100vh;
  }
  header {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary) 60%, var(--accent));
    color: #fff;
    text-align: center;
    padding: 40px 20px 50px;
    box-shadow: 0 4px 20px rgba(55, 48, 163, .35);
  }
  header h1 { margin: 0 0 8px; font-size: 2rem; letter-spacing: .5px; }
  header p  { margin: 0; opacity: .9; }
  .container { max-width: 960px; margin: -30px auto 40px; padding: 0 16px; }
  .card {
    background: #fff;
    border-radius: 16px;
    padding: 24px 28px 28px;
    margin-bottom: 28px;
    box-shadow: 0 8px 24px rgba(30, 41, 59, .10);
    border-top: 5px solid var(--primary);
    overflow-x: auto;
  }
  .card h2 {
    margin: 0 0 18px;
    font-size: 1.3rem;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .badge {
    display: inline-flex; align-items: center; justify-content: center;
    width: 36px; height: 36px; border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: #fff; font-weight: 700;
  }
  .label { font-weight: 600; color: var(--muted); margin: 0 0 8px; }

  /* Q1: chips and stat boxes */
  .chips { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px; }
  .chip {
    min-width: 44px; text-align: center; padding: 8px 12px;
    border-radius: 999px; font-weight: 600; color: #fff;
  }
  .chip.pos { background: var(--primary); }
  .chip.neg { background: var(--bad); }
  .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px; }
  .stat {
    border-radius: 12px; padding: 14px 16px; color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, .12);
  }
  .stat small { display: block; opacity: .85; margin-bottom: 4px; }
  .stat strong { font-size: 1.5rem; }
  .stat span { display: block; margin-top: 4px; font-size: .9rem; opacity: .95; }
  .s-total { background: linear-gradient(135deg, #4f46e5, #6366f1); }
  .s-even  { background: linear-gradient(135deg, #0891b2, #06b6d4); }
  .s-odd   { background: linear-gradient(135deg, #d97706, #f59e0b); }
  .s-min   { background: linear-gradient(135deg, #dc2626, #f87171); }
  .s-max   { background: linear-gradient(135deg, #16a34a, #4ade80); }

  /* Shared table style */
  table { border-collapse: collapse; margin: 0 auto; min-width: 320px; }
  th, td { border: 1px solid #cbd5e1; padding: 10px 16px; text-align: center; }
  th { background: var(--primary); color: #fff; }
  .nice tr:nth-child(even) td { background-color: #f8fafc; }
  .nice td.left { text-align: left; }
  .idcell, .sem { background: #e0e7ff !important; font-weight: 700; color: var(--primary-dark); }
  table.colors td { font-weight: 600; min-width: 130px; text-shadow: 0 1px 2px rgba(0,0,0,.25); }
  table.colors th:first-child, table.colors tr th:first-child { background: var(--primary-dark); }

  /* Q3 matrix */
  table.matrix td { min-width: 60px; font-weight: 600; background: #fff; }
  table.matrix td.summary { background: #eef2ff; color: var(--primary-dark); }
  table.matrix td.edge { background: #94a3b8; color: #fff; }
  table.matrix td.tot  { background: #e0f2fe; color: #0369a1; }
  table.matrix td.min  { background: #fee2e2; color: #991b1b; }
  table.matrix td.max  { background: #dcfce7; color: #166534; }
  table.matrix td.neg  { color: var(--bad); }

  /* Q5 status badges */
  .pass, .fail { display: inline-block; padding: 3px 12px; border-radius: 999px; color: #fff; font-weight: 600; font-size: .9rem; }
  .pass { background: var(--good); }                          /* Pass badge = green */
  .fail { background: var(--bad); border: 2px solid #fff; }   /* Fail badge = red */

  /* Q5 row colors */
  .nice tr.lowrow td:not(.sem) { background: yellow !important; }                 /* total 50-59 */
  .nice tr.redrow td:not(.sem) { background: #ef4444 !important; color: #fff; }   /* total below 50 */

  footer { text-align: center; color: var(--muted); padding-bottom: 30px; font-size: .9rem; }
</style>
</head>
<body>

<header>
  <h1>PHP &amp; MySQL - Assignment 2</h1>
  <p>Jamhuriya University of Science &amp; Technology &bull; Faculty of Computer &amp; IT</p>
</header>

<div class="container">

<!-- ===================== QUESTION 1 ===================== -->
<section class="card">
  <h2><span class="badge">1</span> One-dimensional array</h2>
<?php
$numbers = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

$total = 0; $evenTotal = 0; $oddTotal = 0;
foreach ($numbers as $n) {
    $total += $n;
    if ($n % 2 == 0) $evenTotal += $n;   // -7 % 2 = -1, so negatives work too
    else             $oddTotal  += $n;
}

// minimum and maximum (found manually)
$min = $numbers[0]; $max = $numbers[0];
foreach ($numbers as $n) {
    if ($n < $min) $min = $n;
    if ($n > $max) $max = $n;
}
$minPos = []; $maxPos = [];
foreach ($numbers as $i => $n) {
    if ($n == $min) $minPos[] = $i;
    if ($n == $max) $maxPos[] = $i;
}

echo "<p class='label'>Array elements</p><div class='chips'>";
foreach ($numbers as $n) {
    $cls = ($n < 0) ? "neg" : "pos";
    echo "<span class='chip $cls'>$n</span>";
}
echo "</div>";

echo "<div class='stats'>";
echo "<div class='stat s-total'><small>Total of all elements</small><strong>$total</strong></div>";
echo "<div class='stat s-even'><small>Total of even elements</small><strong>$evenTotal</strong></div>";
echo "<div class='stat s-odd'><small>Total of odd elements</small><strong>$oddTotal</strong></div>";
echo "<div class='stat s-min'><small>Minimum element</small><strong>$min</strong><span>Positions: " . implode(", ", $minPos) . "</span></div>";
echo "<div class='stat s-max'><small>Maximum element</small><strong>$max</strong><span>Positions: " . implode(", ", $maxPos) . "</span></div>";
echo "</div>";
?>
</section>

<!-- ===================== QUESTION 2 ===================== -->
<section class="card">
  <h2><span class="badge">2</span> Associative array (colours)</h2>
<?php
$colors = [
    "Light"  => ["Red" => "Light Red",  "Green" => "Light Green",  "Blue" => "Light Blue"],
    "Normal" => ["Red" => "Normal Red", "Green" => "Normal Green", "Blue" => "Normal Blue"],
    "Dark"   => ["Red" => "Dark Red",   "Green" => "Dark Green",   "Blue" => "Dark Blue"],
];

// background colour for each cell (same row/column names as the array above)
$bg = [
    "Light"  => ["Red" => "#ff9999", "Green" => "#99ff99", "Blue" => "#9999ff"],
    "Normal" => ["Red" => "#ff0000", "Green" => "#00cc00", "Blue" => "#0000ff"],
    "Dark"   => ["Red" => "#800000", "Green" => "#006400", "Blue" => "#000080"],
];

echo "<table class='colors'>";
echo "<tr><th></th>";
foreach (array_keys($colors["Light"]) as $col) echo "<th>$col</th>";
echo "</tr>";
foreach ($colors as $rowName => $row) {
    echo "<tr><th>$rowName</th>";
    foreach ($row as $colName => $value) {
        $textColor = ($rowName == "Light") ? "#1e293b" : "#ffffff";  // keep text readable
        echo "<td style='background:{$bg[$rowName][$colName]}; color:$textColor'>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
</section>

<!-- ===================== QUESTION 3 ===================== -->
<section class="card">
  <h2><span class="badge">3</span> Two-dimensional square array</h2>
<?php
$a = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6],
];
$size = count($a);

$odd = 0; $even = 0; $all = 0;
$rowTotals = array_fill(0, $size, 0);
$colTotals = array_fill(0, $size, 0);
$diag1 = 0; $diag2 = 0;           // main diagonal, anti-diagonal
$min = $a[0][0]; $max = $a[0][0];

for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        $v = $a[$i][$j];
        $all += $v;
        if ($v % 2 == 0) $even += $v; else $odd += $v;
        $rowTotals[$i] += $v;
        $colTotals[$j] += $v;
        if ($i == $j)             $diag1 += $v;
        if ($i + $j == $size - 1) $diag2 += $v;
        if ($v < $min) $min = $v;
        if ($v > $max) $max = $v;
    }
}
$minPos = ""; $maxPos = ""; $minCount = 0; $maxCount = 0;
for ($i = 0; $i < $size; $i++)
    for ($j = 0; $j < $size; $j++) {
        if ($a[$i][$j] == $min) { $minPos .= "[$i,$j], "; $minCount++; }
        if ($a[$i][$j] == $max) { $maxPos .= "[$i,$j], "; $maxCount++; }
    }
$minPos = rtrim($minPos, ", ");
$maxPos = rtrim($maxPos, ", ");

$span = $size + 2;
echo "<table class='matrix'>";
echo "<tr><td class='summary' colspan='$span'>Total odd elements = $odd</td></tr>";
echo "<tr><td class='summary' colspan='$span'>Total even elements = $even</td></tr>";

// top line: main diagonal (left), column totals, anti-diagonal (right)
echo "<tr><td class='edge'>$diag1</td>";
foreach ($colTotals as $c) echo "<td class='tot'>$c</td>";
echo "<td class='edge'>$diag2</td></tr>";

// middle: row total | elements | row total
for ($i = 0; $i < $size; $i++) {
    echo "<tr><td class='tot'>{$rowTotals[$i]}</td>";
    for ($j = 0; $j < $size; $j++) {
        $v = $a[$i][$j];
        $cls = ($v == $min) ? "min" : (($v == $max) ? "max" : "");
        if ($v < 0) $cls .= " neg";
        echo "<td class='$cls'>$v</td>";
    }
    echo "<td class='tot'>{$rowTotals[$i]}</td></tr>";
}

// bottom line: anti-diagonal (left), column totals, main diagonal (right)
echo "<tr><td class='edge'>$diag2</td>";
foreach ($colTotals as $c) echo "<td class='tot'>$c</td>";
echo "<td class='edge'>$diag1</td></tr>";

echo "<tr><td class='summary' colspan='$span'>Total all elements = $all</td></tr>";
echo "<tr><td class='min' colspan='$span'>Minimum element is: $min in $minCount positions:<br>$minPos</td></tr>";
echo "<tr><td class='max' colspan='$span'>Maximum element is: $max in $maxCount positions:<br>$maxPos</td></tr>";
echo "</table>";
?>
</section>

<!-- ===================== QUESTION 4 ===================== -->
<section class="card">
  <h2><span class="badge">4</span> Student records</h2>
<?php
// CA221 appears twice, so duplicate keys would overwrite each other.
// Each record therefore stores its ID as a column value.
$students = [
    ["ID" => "CA221", "Name" => "Mohamed Ahmed Ali", "Phone" => "0648440403", "Address" => "Laba Dhagax, Wardhiigley"],
    ["ID" => "CA223", "Name" => "Ahmed Abdi Jama",   "Phone" => "0647223201", "Address" => "Taleex, Hodan"],
    ["ID" => "CA221", "Name" => "Amina Nur Adan",    "Phone" => "0646990276", "Address" => "Macmacaanka, Dharkeynley"],
];

echo "<table class='nice'>";
echo "<tr><th></th><th>Name</th><th>Phone</th><th>Address</th></tr>";
foreach ($students as $s) {
    echo "<tr>";
    echo "<td class='idcell'>{$s['ID']}</td>";
    echo "<td class='left'>{$s['Name']}</td><td>{$s['Phone']}</td><td class='left'>{$s['Address']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
</section>

<!-- ===================== QUESTION 5 ===================== -->
<section class="card">
  <h2><span class="badge">5</span> Student transcript</h2>
<?php
$transcript = [
    "Semester 1" => [
        ["Course" => "subject1", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40, "Total" => 85, "Status" => "Pass"],
        ["Course" => "subject2", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40, "Total" => 85, "Status" => "Pass"],
        ["Course" => "subject3", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40, "Total" => 85, "Status" => "Pass"],
    ],
    "Semester 2" => [
        ["Course" => "subject1", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 0,  "Total" => 45, "Status" => "Fail"],
        ["Course" => "subject2", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40, "Total" => 85, "Status" => "Pass"],
        ["Course" => "subject3", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 10, "Total" => 55, "Status" => "Pass"],
    ],
];

echo "<table class='nice'>";
echo "<tr><th>Semester</th><th>Course</th><th>CW1</th><th>MidTerm</th><th>CW2</th><th>Final</th><th>Total</th><th>Status</th></tr>";
foreach ($transcript as $semester => $courses) {
    $first = true;
    foreach ($courses as $c) {
        // below 50 = red, 50-59 = yellow, 60+ = normal
        if ($c["Total"] < 50) {
            $rowClass = "redrow";
        } elseif ($c["Total"] < 60) {
            $rowClass = "lowrow";
        } else {
            $rowClass = "";
        }
        echo "<tr class='$rowClass'>";
        if ($first) {
            echo "<td class='sem' rowspan='" . count($courses) . "'>$semester</td>";
            $first = false;
        }
        foreach ($c as $key => $value) {
            if ($key == "Status") {
                $cls = (strtolower($value) == "pass") ? "pass" : "fail";
                echo "<td><span class='$cls'>$value</span></td>";
            } else {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";
    }
}
echo "</table>";
?>
</section>

</div>

<footer>PHP &amp; MySQL &bull; Assignment 2</footer>
</body>
</html>