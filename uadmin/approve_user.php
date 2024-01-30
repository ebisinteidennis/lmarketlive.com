<?php
ob_start();
include 'header.php';

// Check if the ID is provided in the query string
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Update the verification status to 'Approved' in the database
    $approve_query = "UPDATE users SET verification_status = 'Approved' WHERE id = $user_id";
    $approve_result = mysqli_query($link, $approve_query);

    if ($approve_result) {
        // Display a pop-up message
        echo "<script>alert('User approved!');</script>";

        // Redirect back to the admin dashboard after approval
        header("Location: id_verification.php");
        exit();
    } else {
        echo "Error approving user. " . mysqli_error($link);
    }
} else {
    // Redirect if no ID is provided
    header("Location: id_verification.php");
    exit();
}
?>
