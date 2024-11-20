<h3>Update Room Details</h3>
<p>Form to edit room details will be shown here.</p>
<!-- Example form fields for editing room details -->
<form action="update_room_process.php" method="POST">
    <div class="form-group">
        <label for="room_id">Room ID</label>
        <input type="text" id="room_id" name="room_id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="checkin_date">Check-in Date</label>
        <input type="date" id="checkin_date" name="checkin_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="checkout_date">Check-out Date</label>
        <input type="date" id="checkout_date" name="checkout_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Room</button>
</form>
