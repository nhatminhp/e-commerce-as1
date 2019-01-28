<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Assignment 1</title>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="/" class="w3-bar-item w3-button"><b>Assignment 1</b>   E-Commerce Project</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="/" class="w3-bar-item w3-button">Add Movie</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="/w3images/architect.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>BR</b></span> <span class="w3-hide-small w3-text-light-grey">Architects</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

    <br>
  <div class="w3-container w3-padding-32" id="post_movies">
        
        <div class="form-group" >
          <h4>Movie List</h4>
          <form class="input-group" action="list.php" method = "post">
            <input class="form-control" id="keyword" name="keyword">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" id="search_btn" name="search_btn" style="background-color: black; color: white;">Search</button>
            </span>
          </form>
        <input type="text" id="keyword_value" hidden value="<?php if (isset($_POST["keyword"])) {echo ($_POST["keyword"]);}  else {echo "";} ?>">
        <br><br>
          <?php 
            
            $conn = new mysqli("bdwnbi28hhp9zahxpdsx-mysql.services.clever-cloud.com:3306",
            "ummw4mjhoamcz8cdg2nb", "EQXF9glZnb7e1efETasK", "bdwnbi28hhp9zahxpdsx");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $count = 0;
            if (isset($_POST["keyword"])) {
              $result = $conn->query("select * from movies where name like '%" . $_POST["keyword"] . "%';");
            } else {
              $result = $conn->query("select * from movies");
            }
            
            if ($result->num_rows > 0) {
              // output data of each row
              if (isset($_POST["keyword"])) {
                echo "<text class=\"form-froup\">Search result for: " . $_POST["keyword"] . "</text><br>";
              }
              echo 
              "<table class=\"table\">
              <thead>
              <tr>
              <th scope=\"col\">#</th>
              <th scope=\"col\">id</th>
              <th scope=\"col\">name</th>
              <th scope=\"col\">year</th>
              <th scope=\"col\">rating</th>
              </tr>
              </thead>
              <tbody>";
              while($row = $result->fetch_assoc()) {
                $count = $count + 1;
                echo 
                "<tr>
                <th scope=\"row\">".$count."</th>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["year"]."</td> 
                <td>".$row["rating"]."</td>
                </tr>";
              }
              echo "</tbody>
              </table>";
            } else {
                echo "0 results";
            }
            $conn->close();
          ?>
  </div>
  

  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About Us</h3>
    <br>
    <p>
        <b>Huy Hung Phan</b><br><br>

        <b>Canh Son Nguyen</b><br><br>
            
        <b>Nhat Minh Pham</b><br><br>
            
        <b>Jehyeok Hyun</b><br><br>
    </p>
  </div>

  
<!-- End page content -->
</div>
<br>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by Nhat Minh Pham</p>
</footer>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {
    var keyword_value = $('#keyword_value').val();
    console.log(keyword_value);
    if (keyword_value) {
      $("#keyword").val(keyword_value);
    } else {
      $("#keyword").val("");
    } 
  })
</script>

</body>
</html>