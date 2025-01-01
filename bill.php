<?php
// Function to calculate the electricity bill
function generateElectricityBill($consumption, $tariff_rate, $fixed_charge, $taxes, $discount) {
    // Calculate total cost
    $basic_cost = $consumption * $tariff_rate;
    $total_cost = $basic_cost + $fixed_charge + $taxes - $discount;
    
    // Create the bill
    $bill = [
        'Electricity Consumption' => $consumption . " kWh",
        'Tariff Rate' => "$" . number_format($tariff_rate, 2) . " per kWh",
        'Fixed Charge' => "$" . number_format($fixed_charge, 2),
        'Taxes' => "$" . number_format($taxes, 2),
        'Discount' => "$" . number_format($discount, 2),
        'Total Cost' => "$" . number_format($total_cost, 2)
    ];
    
    return $bill;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user inputs from the form
    $consumption = (float)$_POST['consumption'];
    $tariff_rate = (float)$_POST['tariff_rate'];
    $fixed_charge = (float)$_POST['fixed_charge'];
    $taxes = (float)$_POST['taxes'];
    $discount = (float)$_POST['discount'];
    
    // Generate the electricity bill
    $bill = generateElectricityBill($consumption, $tariff_rate, $fixed_charge, $taxes, $discount);
    
    // Display the bill
    echo "<h2>--- Electricity Bill ---</h2>";
    foreach ($bill as $key => $value) {
        echo "<p><strong>$key:</strong> $value</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Generator</title>
</head>
<body>
    <h1>Electricity Bill Generator</h1>
    
    <form method="POST">
        <label for="consumption">Electricity Consumption (kWh):</label>
        <input type="number" step="0.01" name="consumption" id="consumption" required><br><br>
        
        <label for="tariff_rate">Tariff Rate ($/kWh):</label>
        <input type="number" step="0.01" name="tariff_rate" id="tariff_rate" required><br><br>
        
        <label for="fixed_charge">Fixed Charge ($):</label>
        <input type="number" step="0.01" name="fixed_charge" id="fixed_charge" required><br><br>
        
        <label for="taxes">Taxes ($):</label>
        <input type="number" step="0.01" name="taxes" id="taxes" required><br><br>
        
        <label for="discount">Discount ($):</label>
        <input type="number" step="0.01" name="discount" id="discount" required><br><br>
        
        <button type="submit">Generate Bill</button>
    </form>
</body>
</html>

