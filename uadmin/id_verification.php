<?php
include 'header.php';

// Retrieve users with 'Pending' verification status
$pending_users_query = "SELECT * FROM users WHERE verification_status = 'Pending'";
$pending_users_result = mysqli_query($link, $pending_users_query);

if ($pending_users_result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 80%; /* Adjust the width of the table */
        margin: 20px auto; /* Center the table on the page */
        border-collapse: separate;
        border-spacing: 10px; /* Add spacing between cells */
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    a {
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    img {
        max-width: 100px;
        max-height: 100px;
    }

    .files-column a {
        display: block;
        margin-bottom: 5px;
    }

    .files-column p {
        margin: 0;
    }

    @media screen and (max-width: 600px) {
        table {
            font-size: 12px;
        }

        th, td {
            padding: 8px;
        }

        img {
            max-width: 80px;
            max-height: 80px;
        }

        .files-column a {
            margin-bottom: 3px;
        }
    }
</style>

    </head>
    <body>
        <br>
        <br>
        <h2>Admin Dashboard - Pending Verifications</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Verification Status</th>
                    <th>Front ID Image</th>
                    <th>Back ID Image</th>
                    <th>Uploaded Files</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

          <?php
            // Display users in a table
            while ($user_row = mysqli_fetch_assoc($pending_users_result)) {
                echo "<tr>";
                echo "<td>{$user_row['id']}</td>";
                echo "<td>{$user_row['email']}</td>";
                echo "<td>{$user_row['fname']}</td>";
                echo "<td>{$user_row['verification_status']}</td>";

                echo "<td>";
                if (isset($user_row['front_id'])) {
                    $frontImagePath = "/backend/auth/uploads/{$user_row['id']}/front_id.jpg";
                    echo "<img src='{$frontImagePath}' alt='Front ID Image' style='max-width: 100px; max-height: 100px;'>";
                } else {
                    echo "N/A";
                }
                echo "</td>";

                echo "<td>";
                if (isset($user_row['back_id'])) {
                    $backImagePath = "/backend/auth/uploads/{$user_row['id']}/back_id.jpg";
                    echo "<img src='{$backImagePath}' alt='Back ID Image' style='max-width: 100px; max-height: 100px;'>";
                } else {
                    echo "N/A";
                }
                echo "</td>";

                echo "<td>";
                $userUploadDirectory = "/backend/auth/uploads/{$user_row['id']}/";
                $uploadedFiles = glob($userUploadDirectory . '*');
                if (!empty($uploadedFiles)) {
                    foreach ($uploadedFiles as $file) {
                        $fileName = basename($file);
                        echo "<a href='{$userUploadDirectory}{$fileName}' target='_blank'>{$fileName}</a><br>";
                    }
                } else {
                    echo "No files uploaded";
                }
                echo "</td>";

                echo "<td><a href='approve_user.php?id={$user_row['id']}'>Approve</a> | <a href='reject_user.php?id={$user_row['id']}'>Reject</a></td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    echo "Error fetching users. " . mysqli_error($link);
}
?>
