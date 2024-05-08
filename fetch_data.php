<?php
$sql = "SELECT * FROM travel_registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Traveler_ID"] . "</td>";
        echo "<td>" . $row["Passport_Number"] . "</td>";
        echo "<td>" . $row["Full_Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Phone_Number"] . "</td>";
        echo "<td>" . $row["Emergency_Contact_Name"] . "</td>";
        echo "<td>" . $row["Emergency_Contact_Number"] . "</td>";
        echo "<td>" . $row["Destination"] . "</td>";
        echo "<td><a href='update_record.php?id=" . $row["Traveler_ID"] . "'>Edit</a> | <a href='delete_record.php?id=" . $row["Traveler_ID"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}
$conn->close();
?>
