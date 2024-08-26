<?php
$data = file_get_contents("roomsData.json");
$rooms = json_decode($data, true);
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