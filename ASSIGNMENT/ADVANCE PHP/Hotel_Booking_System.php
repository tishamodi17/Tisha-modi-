<?php
// Start the PHP script
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'hotel_booking');
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
        exit;
    }

    // Booking data from POST request
    $room_number = $_POST['room_number'];
    $booking_date = $_POST['booking_date'];
    $time_slot = $_POST['time_slot'];
    $start_time = $_POST['start_time'] ?? null;
    $end_time = $_POST['end_time'] ?? null;

    // Validate if the slot is available
    $query = "SELECT * FROM bookings WHERE room_number = ? AND booking_date = ? AND time_slot = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $room_number, $booking_date, $time_slot);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Slot is already booked!']);
        exit;
    }

    // Insert Booking
    $insertQuery = "INSERT INTO bookings (room_number, booking_date, time_slot, start_time, end_time) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('sssss', $room_number, $booking_date, $time_slot, $start_time, $end_time);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Room booked successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking failed. Please try again!']);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Booking System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Hotel Room Booking System</h1>
    <form id="bookingForm">
        <label for="room_number">Room Number:</label>
        <input type="text" id="room_number" name="room_number" required><br><br>

        <label for="booking_date">Booking Date:</label>
        <input type="date" id="booking_date" name="booking_date" required><br><br>

        <label for="time_slot">Booking Type:</label>
        <select id="time_slot" name="time_slot" required>
            <option value="full_day">Full Day</option>
            <option value="morning">Half Day - Morning</option>
            <option value="evening">Half Day - Evening</option>
            <option value="custom">Custom</option>
        </select><br><br>

        <div id="customTimeFields" style="display: none;">
            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time"><br><br>

            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time"><br><br>
        </div>

        <button type="submit">Book Room</button>
    </form>

    <div id="responseMessage"></div>

    <script>
        $(document).ready(function () {
            $('#time_slot').on('change', function () {
                if ($(this).val() === 'custom') {
                    $('#customTimeFields').show();
                } else {
                    $('#customTimeFields').hide();
                }
            });

            $('#bookingForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: 'hotel_booking_system.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        $('#responseMessage').text(response.message);
                        if (response.status === 'success') {
                            $('#bookingForm')[0].reset();
                            $('#customTimeFields').hide();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
