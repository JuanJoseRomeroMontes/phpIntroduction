<?php
$data = file_get_contents("roomsData.json");
$rooms = json_decode($data, true);
$roomFound = false;
$id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval( $_GET['id'] ) : 0;
$filteredRoomList = array_filter($rooms, fn($r) => $r['id'] == $id); //Declared a funtion that filters rooms by id.
if(!empty($filteredRoomList)){
    $roomFound = true;
    $arrayReverse = array_reverse($filteredRoomList);
    $filteredRoom = array_pop($arrayReverse);
}
?>

<?php
    if($roomFound){
        echo (
            "<h1>Rooms</h1>
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