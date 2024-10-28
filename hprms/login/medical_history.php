<?php
require_once('../config.php'); // Use config.php for database connection

// Initialize variables for the form
$patient_id = '';
$results = []; // Initialize results array
$no_records = ''; // Initialize no records message

// Check if 'patient_id' is set and fetch medical history if it is
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];

    // Vulnerable SQL query (No sanitization)
    $qry = $conn->query("SELECT * FROM patient_history WHERE patient_id = '$patient_id'");

    // Prepare output for AJAX response
    ob_start(); // Start output buffering

    if ($qry->num_rows > 0) {
        while ($row = $qry->fetch_assoc()) {
            echo "<div class='history-item'>
                    <strong>History ID:</strong> {$row['id']}<br>
                    <strong>Illness:</strong> {$row['illness']}<br>
                    <strong>Diagnosis:</strong> {$row['diagnosis']}<br>
                    <strong>Treatment:</strong> {$row['treatment']}<br>
                    <strong>Doctor ID:</strong> {$row['doctor_id']}<br>
                    <hr>
                  </div>";
        }
    } else {
        echo "<div class='alert alert-warning'>No medical history found for Patient ID: $patient_id.</div>";
    }

    $response = ob_get_clean(); // Get buffered content
    echo $response; // Send response back to AJAX
    exit; // Prevent further execution
}

// Close the database connection
$conn->close();
?>

<style>
    /* Basic styling for the results */
    .medical-history {
        margin-top: 20px;
    }
</style>

<div class="container-fluid">
    <h3>Search Patient Medical History</h3>
    <form method="GET" action="" id="patient-form">
        <div class="form-group">
            <label for="patient_id" class="control-label">Enter Patient ID:</label>
            <input type="text" name="patient_id" id="patient_id" class="form-control form-control-border" placeholder="Patient ID" required>
            <input type="submit" value="Search" class="btn btn-primary mt-2">
        </div>
    </form>

    <!-- Display the medical history if results were found -->
    <div class="medical-history">
        <!-- Results will be populated here via AJAX -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#patient-form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: '', // URL to the same page
                type: 'GET',
                data: formData,
                success: function(response) {
                    // Insert the response into the appropriate div
                    $('.medical-history').html(response);
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>

