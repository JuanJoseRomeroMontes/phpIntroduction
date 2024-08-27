<?php
function convertRoomName($fname) {
    switch ($fname) {
        case 1:
            $nameString = "Single bed";
            break;
        case 2:
            $nameString = "Double bed";
            break;
        case 3:
            $nameString = "Double superior";
            break;
        case 4:
            $nameString = "Suite";
            break;
        default:
            $nameString = "Not a valid name!";
    }

    return $nameString;
}

$myassoc = $_POST;
if(!empty($myassoc))
{
    $roomStringName = convertRoomName($myassoc["Iname"]);
    $mysqli = new mysqli("localhost","miranda","mirapass","miranda_schema");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $query =   "INSERT INTO rooms (`roomNumber`, `availability`, `roomType`, `description`, `offer`, `price`, `discount`, `cancellation`) 
                VALUES ('$myassoc[Inumber]', '0', '$myassoc[Iname]', 'NaN', '0', '$myassoc[Iprice]', '$myassoc[Idiscount]', 'NaN');";

    $result = $mysqli -> query($query);

    // Free memory and disconect from DB
    $mysqli -> close();
}
?>

<?php if(empty($myassoc)): ?>
            <h1>Create a room</h1>
            <form method=POST>
                <div>
                    <label for=Iname>Name</label>
                    <select name=Iname id=Iname>
                        <option value=1>Single bed</option>
                        <option value=2>Double bed</option>
                        <option value=3>Double superior</option>
                        <option value=4>Suite</option>
                    </select>
                </div>
                <div>
                    <label for=Inumber>Number</label>
                    <input type=number id=Inumber name=Inumber />
                </div>
                <div>
                    <label for=Iprice>Price</label>
                    <input type=number id=Iprice name=Iprice />
                </div>
                <div>
                    <label for=Idiscount>Discount</label>
                    <input type=number id=Idiscount name=Idiscount />
                </div>
                <input type=submit value=Create />
            </form>
<?php else: ?>
            <h1>Created Room!</h1>
            <ul>
                <li>Name: <?= $roomStringName ?></li>
                <li>Number: <?= $myassoc["Inumber"]?></li>
                <li>Price: <?= $myassoc["Iprice"]?></li>
                <li>Discount: <?= $myassoc["Idiscount"]?></li>
            </ul>
            <a href=''>Back</a>
<?php endif ?>