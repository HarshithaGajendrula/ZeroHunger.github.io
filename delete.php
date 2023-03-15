<?php

include 'conn3.php';

$id = $_GET['id'];

$q = " DELETE FROM `details` WHERE id = $id ";

mysqli_query($con, $q);

header('location:consumerhome.php');

?>

 