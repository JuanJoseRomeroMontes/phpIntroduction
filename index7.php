<?php
$search = @$_GET['search'];
$mysqli = new mysqli("localhost","miranda","mirapass","miranda_schema");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(empty($search))
{
    $query =   "SELECT roomNumber, price, discount, room_type.roomType
                FROM rooms 
                LEFT JOIN room_type ON rooms.roomType = room_type._id";
}
else
{
    $search = ucfirst($search);
    $query =   "SELECT roomNumber, price, discount, room_type.roomType
                FROM rooms 
                LEFT JOIN room_type ON rooms.roomType = room_type._id
                WHERE room_type.roomType = '$search';";
}

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

$roomCount = count($rooms);
$normalHeader = "<h1>Rooms</h1>";
$searchHeader = "<h1>$roomCount results</h1> <a href='index7.php'>Full list</a>";
?>

<?= empty($search) ? $normalHeader : $searchHeader ?>
<form>
    <label for="search">Search for a room [name]</label>
    <input type="text" id="search" name="search" placeholder="Search term" />
    <input type="submit" value="Search" />
</form>
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