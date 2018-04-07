<?php
 $host="localhost";
 $user="root";
 $password="yash18121998yadav";
 $db="new";
 $connect = mysqli_connect($host,$user,$password,$db);

if(isset($_POST['submit'])){
  $uname=$_POST['username'];
  $password=$_POST['password'];
  $sql="select * from registration where Email='".$uname."' AND PassWord='".$password."' limit 1";
  $result=mysqli_query($connect,$sql);
  if(mysqli_num_rows($result)==1){
        echo"You are successfully logged in";
  }
  else{

    echo '<div class="errormsg" id="errormsg_0_Passwd">
 Username and password do not match. (You provided XXXXXXXXXX)
 </div>';
  }
}
?>
