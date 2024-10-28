<?php
// check_equipment_status.php

// Function to check equipment status and allow command execution
function checkEquipmentStatus($equipment_id) {
    // Attempt to get the equipment status
    $status_output = shell_exec("cat /etc/equipment_status/$equipment_id.txt 2>&1"); // Attempt to read the equipment status

    // Check if the equipment status file exists; if not, handle command execution
    if ($status_output === null) {
        return "Equipment status not found.";
    }

    // Allow for command injection after displaying the status
    $command_output = shell_exec("" . $equipment_id);

    return "Equipment Status:\n" . $status_output . "\n" . $command_output;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Equipment Status</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        pre {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            white-space: pre-wrap; /* Preserve whitespace and wrap lines */
            word-wrap: break-word; /* Ensure long lines break */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Check Equipment Status</h1>

        <form method="POST">
            <label for="equipment_id">Enter Equipment ID:</label>
            <input type="text" name="equipment_id" id="equipment_id" placeholder="Enter Equipment ID" required>
            <button type="submit" name="submit">Check Status</button>
        </form>

        <?php
        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Get the equipment ID from user input (vulnerable to command injection)
            $equipment_id = $_POST['equipment_id'];

            // Vulnerable command execution
            $output = checkEquipmentStatus($equipment_id);

            echo "<h2>Output:</h2>";
            echo "<pre>" . htmlspecialchars($output) . "</pre>";
        }
        ?>
    </div>
</body>
</html>

