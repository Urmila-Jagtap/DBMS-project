<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $passport_number = $_POST['passport_number'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $emergency_contact_name = $_POST['emergency_contact_name'];
    $emergency_contact_number = $_POST['emergency_contact_number'];
    $Destination = $_POST['Destination'];

    $sql = "UPDATE travel_registration SET 
            Passport_Number = '$passport_number', 
            Full_Name = '$full_name', 
            Email = '$email', 
            Phone_Number = '$phone_number', 
            Emergency_Contact_Name = '$emergency_contact_name', 
            Emergency_Contact_Number = '$emergency_contact_number', 
            Destination = '$Destination' 
            WHERE Traveler_ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href = 'display_data.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
  
    $id = $_GET['id'];

       $sql = "SELECT * FROM travel_registration WHERE Traveler_ID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Traveler Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Update Traveler Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="passport_number">Passport Number:</label>
            <input type="text" id="passport_number" name="passport_number" value="<?php echo $row['Passport_Number']; ?>" required>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo $row['Full_Name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['Phone_Number']; ?>" required>

            <label for="emergency_contact_name">Emergency Contact Name:</label>
            <input type="text" id="emergency_contact_name" name="emergency_contact_name" value="<?php echo $row['Emergency_Contact_Name']; ?>" required>

            <label for="emergency_contact_number">Emergency Contact Number:</label>
            <input type="text" id="emergency_contact_number" name="emergency_contact_number" value="<?php echo $row['Emergency_Contact_Number']; ?>" required>

            <label for="itinerary">Destination:</label>
            <textarea id="Destination" name="Destination" rows="4" required><?php echo $row['Destination']; ?></textarea>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {   
        echo "No record found with ID: $id";
    }
}
$conn->close();
?>
