<?php
$data = file_get_contents("roomsData.json");
$rooms = json_decode($data, true);
?>

<pre>
    <?php print_r($rooms) ?>
</pre>