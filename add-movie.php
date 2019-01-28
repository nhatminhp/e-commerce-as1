<html>
<?php
 if (isset($_POST["name"])) {

    $name = $_POST["name"];
    $year = $_POST["year"];
    $genre_name = $_POST["genre"];
    $rating = $_POST["rating"];
    $conn = new mysqli("bdwnbi28hhp9zahxpdsx-mysql.services.clever-cloud.com:3306",
                "ummw4mjhoamcz8cdg2nb", "EQXF9glZnb7e1efETasK", "bdwnbi28hhp9zahxpdsx");

    $sql = "select * from genres where name='" . $genre_name . "';";
    $result = $conn->query($sql);
    $genre_id = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $genre_id = $row["id"];
        }
      }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO movies (name, year, genre_id, rating) VALUES ( '$name', '$year', '$genre_id', '$rating')";
    if ($conn->query($sql) === TRUE) {
        echo "New movie added successfully";
    } else {
        echo "Failed";
    }
    $conn->close();
    echo '<script>window.location.href = "list.php";</script>';
 }
?>
</html>
