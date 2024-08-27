<?php
$myassoc = $_POST;
?>

<?php
    if(empty($myassoc)){
        echo (
            "<h1>Create a room</h1>
            <form method=POST>
                <div>
                    <label for=Iname>Name</label>
                    <select name=Iname id=Iname>
                        <option value='Single bed'>Single bed</option>
                        <option value='Double bed'>Double bed</option>
                        <option value='Double superior'>Double superior</option>
                        <option value='Suite'>Suite</option>
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
                <input type=submit value=Create />
            </form>
            "
        );
    }
    else{
        echo (
            "<h1>Created Room!</h1>
            <ul>
                <li>Name: $myassoc[Iname]</li>
                <li>Number: $myassoc[Inumber]</li>
                <li>Price: $myassoc[Iprice]</li>
            </ul>"
        );
    }
?>