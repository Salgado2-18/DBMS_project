<?php
 include('./db.php');

 class Image{

  var 
   $image_id,
   $image_name,
   $image;

  function get_all_image_list(){
   $query = "select * from DBMSdata";
   $result = mysqli_query($query);
   return $result;
  }

}
?>

