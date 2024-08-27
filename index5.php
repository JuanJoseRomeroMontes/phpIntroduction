<?php
$mysqli = new mysqli("localhost","miranda","mirapass","miranda_schema");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$query =   "SELECT roomNumber, price, discount, room_type.roomType
            FROM rooms 
            LEFT JOIN room_type ON rooms.roomType = room_type._id";

$result = $mysqli -> query($query);
$rooms = [];
//Convert results to array
while($row = mysqli_fetch_array($result))
{
    $rooms[] = $row;
}

// Free memory and disconect from DB
$result -> free_result();
$mysqli -> close();
?>

<h1>Rooms</h1>
<ol>
    <?php foreach($rooms as $room): ?>
        <li>
            <ul>
                <li>Name: <?= $room["roomType"] ?></li>
                <li>Number: <?= $room["roomNumber"] ?></li>
                <li>Price: <?= $room["price"] ?></li>
                <li>Discount: <?= $room["discount"] ?></li>
            </ul>
        </li>
    <?php endforeach?>
</ol>