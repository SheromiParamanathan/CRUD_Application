<?php
   $connection = mysqli_connect("localhost","root","");
   $db = mysqli_select_db($connection, "crud_app");

   $delete  = $_GET['del'];
   
   $sql = "delete from student where id = '$delete'";

   if(mysqli_query($connection,$sql))
    {
        echo '<script>location.replace("index.php")</script>';
    }
    else
    {
        echo "Some Error" . $connection->error;
    }