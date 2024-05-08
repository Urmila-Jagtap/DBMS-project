<?php
include("db_connection.php");
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $sql = "DELETE FROM travel_registration WHERE Traveler_ID = $id";

    if ($conn->query($sql) === TRUE) {
      
        echo "<script>alert('Record deleted successfully'); window.location.href = 'display_data.php';</script>";
    } else {
       
        echo "Error deleting record: " . $conn->error;
    }
} else {
    
    echo "No record ID provided";
}
$conn->close();
?>
