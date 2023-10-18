<?php
require('./script/db_connect.php');

$sql = "call booking_room('".$_GET['title']."', '".$_GET['firstname']."', '".$_GET['lastname']."', '".$_GET['phone']."','".$_GET['email']."', '".$_GET['select']."', '".$_GET['check_in']."', '".$_GET['check_out']."', ".$_GET['room_id'].");";

// execute sql script
$result = mysqli_query($con, $sql);
// validate command sql script
if ($result) {
    header('location:booking_room.php');
    exit(0);
} else {
    echo mysqli_error($con);
}
?>