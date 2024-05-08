<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$passport_number = $_POST['passport_number'] ?? '';
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone_number = $_POST['phone_number'] ?? '';
$emergency_contact_name = $_POST['emergency_contact_name'] ?? '';
$emergency_contact_number = $_POST['emergency_contact_number'] ?? '';
$Destination = $_POST['Destination'] ?? '';
$sql1="select * from `travel_registration`";
$rs=mysqli_query($conn,$sql1);
while($rw=mysqli_fetch_row($rs)){
  
  
   if($passport_number==$rw[1]) {
   // echo "user already exists";
    echo "<script>alert('Passport Number is already registerd to another account');
    window.location.href = 'display_data.php'</script>";
   exit;
   }
}
$sql = "INSERT INTO Travel_Registration (Passport_Number, Full_Name, Email, Phone_Number, Emergency_Contact_Name, Emergency_Contact_Number, Destination) 
        VALUES ('$passport_number', '$full_name', '$email', '$phone_number', '$emergency_contact_name', '$emergency_contact_number', '$Destination')";
    
if ($conn->query($sql) === TRUE) {
    header("Location: registration_success.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
