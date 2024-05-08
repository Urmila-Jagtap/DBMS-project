<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Travel Registration Data</h2>
        <table>
            <tr>
                <th>Traveler ID</th>
                <th>Passport Number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Emergency Contact Name</th>
                <th>Emergency Contact Number</th>
                <th>Destination</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'db_connection.php';
            include 'fetch_data.php';
            ?>
        </table>
    </div>
</body>
</html>
