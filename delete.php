<?php

include "db_conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM `reservations` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result){
    header("location: index.php?msg=Reservation deleted successfully");
}else{
    echo "Failed: " . mysqli_error($conn);
}
?>