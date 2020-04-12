<?php
 include 'connection.php';
 $id = base64_decode($_GET['id']);

 mysqli_query($con,"DELETE FROM `student_info` WHERE id = '$id'");

 header('location:index.php?page=allstudent');





?>