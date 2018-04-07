<?php

// initializing variables
$host="localhost";
 $user="root";
 $password="yash18121998yadav";
 $db="new";
$connect = mysqli_connect($host,$user,$password,$db);
$errors = array();
// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password_1=$_POST['password1'];
  $password_2=$_POST['password2'];
 /* $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password2']);
*/
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Admins WHERE UserName='$username' OR Email='$email' LIMIT 1";
  $result = $connect->query( $user_check_query);
  $user = mysqli_fetch_array($result);

  if ($user) { // if user exists
    if ($user["UserName"] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user["Email"] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    //$password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO Admins (FirstName, LastName, UserName, Email, PassWord)
          VALUES('$firstname','$lastname','$username', '$email', '$password_1')";
    mysqli_query($connect,$query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    //header('location: index.php');
  }
}
?>
<!Doctype html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login & Sign Up</title>


  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body background :"backgroun.jpg">

  </div>
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">

        <h2>LOGIN</h2>
  <p></p>
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>SIGN UP</h2>


  <p></p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</div>
  </div>
       </div>


    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
       </div>

    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
       </div>

 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
   <form class="form-inline my-2 my-lg-0" method="post" action ="AdminLoginCheck.php" >

 <input class="form-control mr-sm-2" type="text" name="username" placeholder="Email" />
<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" />
<input class="btn_login" type="submit" name="submit" value="LOGIN" >
</form>
  </div>

   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
    <form class="form-inline my-2 my-lg-0" method="post" >
      <input class="form-control mr-sm-2" type="text" name="firstname" placeholder="First Name" />
      <input class="form-control mr-sm-2" type="text" name="lastname" placeholder="Last Name" />
     <input class="form-control mr-sm-2" type="text" name="username" placeholder="User" />
     <input class="form-control mr-sm-2" type="text" name="email" placeholder="Email" />
     <input   type="password" name="password1" placeholder="Password" />
     <input class="form-control mr-sm-2" type="password" name="password2" placeholder="Confirm Password" />
     <input class="btn_sign_up" type="submit" name="submit" value="SIGN UP"/>
    </form>
  </div>

    </div>

  </div>
 </div>
</div>



    <script  src="js/index.js"></script>




</body>
<footer>
  <div style="position:absolute; bottom: 5px; width:100%;">
  <div style="width:100%;">
  <div style="width:736px; background-color: rgba(120, 144, 156, 0.8); float:left;padding: 30px 80px; color: #000;"><h1 >fILM<br>fACTORY</h1></div>
  <div style="width:310px; background-color: rgba(237, 95, 7, 0.8); float:right; padding: 30px 80px; color: #000;"><h1 >DBMS<br>Project</h1></div>
  </div>
  </div>
</footer>
</html>
