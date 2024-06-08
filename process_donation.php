<?php
// Include your database connection file
$mysqli = mysqli_connect("localhost", "root", "", "dbdonate");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_id = $_POST['goal_id'];
    $amount = $_POST['amount'];

    // Prepare and execute the SQL query
    $sql = "UPDATE goals SET collected_amount = collected_amount + ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $amount, $goal_id);

    // Execute the query
    if ($stmt->execute()) {
        // Success response
        echo json_encode(array('success' => true, 'message' => 'Donation processed successfully.'));
    } else {
        // Error response
        echo json_encode(array('success' => false, 'message' => 'Failed to process donation.'));
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>
