<?php
 include('./opt/lampp/htdocs/project/db/db.php');

 class Image{

  var 
   $image_id,
   $image_name,
   $image;

  function get_all_image_list(){
   $query = "select * from DBMSdata";
   $result = mysql_query($query);
   return $result;
  }

}
?>

