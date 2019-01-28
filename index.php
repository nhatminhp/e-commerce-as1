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
      <a href="/list.php" class="w3-bar-item w3-button">Movie List</a>
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


  <div class="w3-container w3-padding-32" id="post_movies">
    <form action="add-movie.php" method="post">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" style="margin-top: 20px">Add movie</h3>
        <br>
        <div class="form-group" >
          <label for="name">Name</label>
          <input class="form-control" id="name" name="name">
        </div>
        <div class="form-group" >
          <label for="year">Year</label>
          <select class="form-control" id="year" name="year"></select>
        </div>
        
        <div class="form-group" >
          <label for="year">Genre</label>
          <?php 
            $conn = new mysqli("bdwnbi28hhp9zahxpdsx-mysql.services.clever-cloud.com:3306",
            "ummw4mjhoamcz8cdg2nb", "EQXF9glZnb7e1efETasK", "bdwnbi28hhp9zahxpdsx");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result = $conn->query("select * from genres");
            $genre_list = array();
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $genre_list[$row["id"]] = $row["name"];
              }
            }
            $conn->close();
          ?>
          <select class="form-control" id="genre" name="genre">
            <?php foreach ($genre_list as $key => $value): ?>
            <option id="<?php echo $key ?>"><?php echo $value ?></option>
            <?php endforeach; ?>
          </select>
          
        </div>
        <div class="form-group" >
          <label for="rating">Rating</label>
          <select class="form-control" id="rating" name="rating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <hr>
        
        <button class="btn btn btn-dark" id="add_btn" name="add_btn">
          <i class="fa fa-paper-plane"></i> Add
        </button>
    </form>
  </div>
  
<div class="w3-container w3-padding-32">
    <label id="result"></label>
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
    var start = 1900;
    var end = new Date().getFullYear();
    var options = "";
    $('#add_btn').prop("disabled", true);
    for(var year = start ; year <=end; year++){
      options += "<option>"+ year +"</option>";
    }
    document.getElementById("year").innerHTML = options;
    $('#name').on('change', function(){
      var name = $('#name').val();
      if (name) {
        $('#add_btn').prop("disabled", false);
      } else {
        $('#add_btn').prop("disabled", true);
      }
    });
  })
</script>

</body>
</html>
