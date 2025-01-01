<?php
// Step 1: Create an array to store names of Indian cricket players
$indianCricketPlayers = array(
    "Virat Kohli", 
    "Rohit Sharma", 
    "MS Dhoni", 
    "Sachin Tendulkar", 
    "KL Rahul", 
    "Hardik Pandya", 
    "Shubman Gill", 
    "Jasprit Bumrah", 
    "Ravindra Jadeja", 
    "Ravichandran Ashwin"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Cricket Players List</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>List of Indian Cricket Players</h2>

    <!-- Step 2: Create an HTML table to display the names of the players -->
    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Player Name</th>
        </tr>

        <?php
        // Step 3: Loop through the array and display each player's name in the table
        $sr_no = 1;
        foreach ($indianCricketPlayers as $player) {
            echo "<tr>
                    <td>" . $sr_no . "</td>
                    <td>" . $player . "</td>
                  </tr>";
            $sr_no++;
        }
        ?>
    </table>

</body>
</html>

