<?php
// Step 1: Create an array to store student names
$students = array("Alice", "Bob", "Charlie", "David", "Eve");

// Step 2: Display the original array using print_r
echo "<h3>Original Array:</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 3: Sort the array in ascending order (alphabetical order) using asort()
asort($students);
echo "<h3>Array After Sorting (Ascending Order using asort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 4: Sort the array in descending order (reverse alphabetical order) using arsort()
arsort($students);
echo "<h3>Array After Sorting (Descending Order using arsort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>

