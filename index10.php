<?php
require_once('./setup.php');

$query =   "SELECT roomNumber, price, discount, room_type.roomType
            FROM rooms 
            LEFT JOIN room_type ON rooms.roomType = room_type._id";

$result = $mysqli -> query($query);
$rooms = [];
//Convert results to array
while($row = $result->fetch_assoc())
{
    $rooms[] = $row;
}

// Free memory and disconect from DB
$result -> free_result();
$mysqli -> close();

echo $blade->run("rooms",["rooms"=>$rooms]);