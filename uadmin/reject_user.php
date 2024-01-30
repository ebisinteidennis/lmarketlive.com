<?php
include 'header.php'; // Include your header or any necessary configurations

// Check if the ID is provided in the query string
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Update the verification status to 'Rejected' in the database
    $reject_query = "UPDATE users SET verification_status = 'Rejected' WHERE id = $user_id";
    $reject_result = mysqli_query($link, $reject_query);

    if ($reject_result) {
        // Display a pop-up message
        echo "<script>alert('User rejected!');</script>";

        // Redirect back to the admin dashboard after rejection
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error rejecting user. " . mysqli_error($link);
    }
} else {
    // Redirect if no ID is provided
    header("Location: id_verification.php");
    exit();
}
?>
