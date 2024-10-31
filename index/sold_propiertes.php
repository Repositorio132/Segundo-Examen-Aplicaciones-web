<?php
include "../index/header.php";
require "../index/connect.php"; 

// 1. Connect to the database
$conn = connectDB();

// 2. Perform the query on sold_properties with JOINs
$sql = "SELECT sp.id, s.name AS seller_name, p.title AS property_title, p.image AS image_url 
        FROM sold_properties sp
        JOIN seller s ON sp.id_seller = s.id
        JOIN propierties p ON sp.id_prop = p.id";
$result = $conn->query($sql);

?>

<h1>Sold Properties</h1>

<section>
    <p>Here are the properties sold:</p>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Seller Name</th>
                    <th>Property Title</th>
                    <th>Image</th>
                </tr>";
                
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["seller_name"] . "</td>
                    <td>" . $row["property_title"] . "</td>
                    <td><img src='" . $row["image_url"] . "' alt='" . $row["property_title"] . "' style='width: 300px;px; height:auto;'></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No properties sold were found.</p>";
    }

    // 4. Close the connection
    $conn->close();
    ?>
</section>
