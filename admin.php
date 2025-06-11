<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTAURANTLY</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Payments</h2>
    <table>
        <tr>
            <th>Your Name</th>
            <th>Your Email</th>
            <th>Date & Time</th>
            <th>No. Of People</th>
            <th>Special Request</th>
        </tr>
        <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "restaurant_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query booking table
    $sql = "SELECT Your Name, Your Email, Date & Time, No. Of People, Special Request FROM book_tables";
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    // Counter for serial numbers
    $serialNumber = 1;

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$serialNumber."</td>";
            echo "<td>".$row["Your Name"]."</td>";
            echo "<td>".$row["Your Email"]."</td>";
            echo "<td>".$row["Date & Time"]."</td>";
            echo "<td>".$row["No. Of People"]."</td>";
            echo "<td>".$row["Special Request"]."</td>";
            echo "</tr>";
            $serialNumber++; // Increment serial number for next row
        }
    } else {
        echo "<tr><td colspan='8'>No booking found</td></tr>";
    }
    $conn->close();
?>

    </table>
</body>
</html>
