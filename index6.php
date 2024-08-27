<?php
$id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval( $_GET['id'] ) : 0;
$mysqli = new mysqli("localhost","miranda","mirapass","miranda_schema");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$query =   "SELECT rooms._id AS id, roomNumber, price, discount, room_type.roomType
            FROM rooms 
            LEFT JOIN room_type ON rooms.roomType = room_type._id
            WHERE rooms._id = $id;";

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

$roomFound = false;

//$filteredRoomList = array_filter($rooms, fn($r) => $r['id'] == $id); //Declared a funtion that filters rooms by id.
if(!empty($rooms)){
    $roomFound = true;
    $arrayReverse = array_reverse($rooms);
    $filteredRoom = array_pop($arrayReverse);
}
?>
<?php
    if($roomFound){
        echo (
            "<h1>Room</h1>
            <ul>
                <li>Id: $filteredRoom[id]</li>
                <li>Name: $filteredRoom[roomType]</li>
                <li>Number: $filteredRoom[roomNumber]</li>
                <li>Price: $filteredRoom[price]</li>
                <li>Discount: $filteredRoom[discount]</li>
            </ul>"
        );
    }
    else{
        echo ('Room not found');
    }
?>