<?php
  
  session_start();
  $con=mysqli_connect("localhost","root","","DBMSdata");
// Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    /*$var_value = $_SESSION['key'];*/
    $var_value = $_GET['id'];
    /*echo "$var_value";*/

$result=$con->query("select * from DBMSdata WHERE ID=$var_value");

    while($row_brand=mysqli_fetch_array($result))
    {
        $brand_image = $row_brand["Picture"];
        $Genre = $row_brand["Genre"];
        $Name = $row_brand["Name"];
        $YOR = $row_brand["Year Of Release"];
        $IMDB = $row_brand["ImDb Rating"];
        $Actors = $row_brand["Actors"];
        $Directors = $row_brand["Directors"];
        $Info = $row_brand["Info"];
        $Link = $row_brand["Link"];
       
        $image_data = '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $brand_image ).'"/>';
        
    }


    if(isset($_POST['button'])){    //trigger button click

        $search=$_POST['search'];

        $_SESSION['search'] = $search; 
     
        header("Location: search1.php");

          
    }


    
                  
?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
      

          .full {
    background: url(background.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    height:100%;
}

    </style>


</head>
<body class="full">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Genres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Horror</a>
          <a class="dropdown-item" href="Sci.php">Sci-Fi</a>
          <a class="dropdown-item" href="#">Thriller</a>
          <a class="dropdown-item" href="#">Romance</a>
          <a class="dropdown-item" href="#">Drama</a>
          <a class="dropdown-item" href="#">Comedy</a>
          <a class="dropdown-item" href="#">documentry</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Top-IMDB</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">A-Z</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="button">Search</button>
    </form>
  </div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>


 
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="1.jpg" alt="First slide" style="height:300px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="2.jpg" alt="Second slide" style="height:300px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="3.jpg" alt="Third slide" style="height:300px">
    </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="4.jpg" alt="Fourth slide" style="height:300px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




      <nav aria-label="breadcrumb container">
        <ol class="breadcrumb  alert-danger">
          <li class="breadcrumb-item active aling-centre" aria-current="page">
            <?php
              echo "Genre : ";
              echo $Genre;

            ?>

          </li>
        </ol>
      </nav>


      <div class="container full">


      <div class="row">
        <div class="col-sm-4">
          <div class="card-deck container mb-3">
            <div class="card ">
               <?php echo $image_data; ?>
              <h10>Walking dead</h10>
            </div>
          </div>

        </div>
        <div class="col-sm-8">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">

                <?php 
                    echo $Name;
                ?>

                </h5>
              <h6 class="card-subtitle mb-2 text-muted">
                <?php 
                    echo "ImDb :";
                    echo $IMDB;
                    echo "<br> Actors: ";
                    echo $Actors;
                    echo "<br> <p></p>Directors : ";

                    echo $Directors;
                ?>

              </h6>
              <p class="card-text">
                <?php
                  echo "<strong><ins> Info</ins> : </strong><br>";
                  echo $Info;

                ?>



              </p>
              <a href="<?php echo $Link ?>" class="card-link">Preview</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- //tile -->



<!-- endinig -->


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>