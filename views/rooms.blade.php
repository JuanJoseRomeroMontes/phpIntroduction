<h1>Rooms</h1>
<ol>
    @foreach($rooms as $room)
        <li>
            <ul>
                <li>Name: {{$room["roomType"]}}</li>
                <li>Number: {{$room["roomNumber"]}}</li>
                <li>Price: {{$room["price"]}}</li>
                <li>Discount: {{$room["discount"]}}</li>
            </ul>
        </li>
        @endforeach
</ol>