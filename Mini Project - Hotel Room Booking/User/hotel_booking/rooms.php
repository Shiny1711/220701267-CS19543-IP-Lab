<?php
// Start session to manage user authentication
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms - Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="rooms.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HOTEL SHINES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Rooms Section -->
    <div class="container mt-5">
        <h2>Available Rooms</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVMBcotqXayYvl_bj2VtM_4duLBprq3fRyYQ&s" class="img-fluid rounded-start" alt="Single Bed Room">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Single Bed Room</h5>
                                <p class="card-text">"A cozy, well-furnished room with a single bed, ideal for solo travelers seeking comfort and privacy."<br>
<b>Rate:</b> $100 per night</p>
                                <button class="btn btn-primary" onclick="checkLogin('Single Bed Room')">Book Room</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://www.oberoihotels.com/-/media/oberoi-hotels/website-images/the-oberoi-new-delhi/room-and-suites/deluxe-room/detail/deluxe-room-1.jpg" class="img-fluid rounded-start" alt="Deluxe Room">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Double Bed Room</h5>
                                <p class="card-text">"Spacious and elegant room with a king-size bed, offering a stunning ocean view for couples or individuals seeking extra space."<br>
<b>Rate: </b>$180 per night</p>
                                <button class="btn btn-primary" onclick="checkLogin('Double Bed Room')">Book Room</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVMBcotqXayYvl_bj2VtM_4duLBprq3fRyYQ&s" class="img-fluid rounded-start" alt="Single Bed Room">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Family Room</h5>
                                <p class="card-text">"Comfortably designed for families, this room features multiple beds and ample space for a relaxing stay with your loved ones."<br>
<b>Rate: </b>$250 per night</p>
                                <button class="btn btn-primary" onclick="checkLogin('Family Room')">Book Room</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://www.oberoihotels.com/-/media/oberoi-hotels/website-images/the-oberoi-new-delhi/room-and-suites/deluxe-room/detail/deluxe-room-1.jpg" class="img-fluid rounded-start" alt="Deluxe Room">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Suite</h5>
                                <p class="card-text">"Comfortably designed for families, this room features multiple beds and ample space for a relaxing stay with your loved ones."<br>
<b>Rate: </b>$250 per night</p>
                                <button class="btn btn-primary" onclick="checkLogin('Suite')">Book Room</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="book_room.php" method="post" id="bookingForm">
                        <input type="hidden" name="room_type" id="roomType" value="">
                        <div class="mb-3">
                            <label for="checkin" class="form-label">Check-In Date</label>
                            <input type="date" class="form-control" id="checkin" name="checkin" required>
                        </div>
                        <div class="mb-3">
                            <label for="checkout" class="form-label">Check-Out Date</label>
                            <input type="date" class="form-control" id="checkout" name="checkout" required>
                        </div>
                        <div class="mb-3">
                            <label for="members" class="form-label">Number of Rooms</label>
                            <input type="number" class="form-control" id="members" name="members" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function checkLogin(roomType) {
            if (!<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>) {
                alert("Please log in to book a room.");
                window.location.href = "index.php"; // Redirect to index.php
            } else {
                document.getElementById('roomType').value = roomType; // Set the room type
                var bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
                bookingModal.show(); // Open the modal
            }
        }

        // Handle booking form submission
        document.getElementById('bookingForm').onsubmit = function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Debugging: Check the values before submission
            alert("Room Type: " + document.getElementById('roomType').value+"Check-In Date: " + document.getElementById('checkin').value+
           "Check-Out Date: " + document.getElementById('checkout').value+
            "Number of Members: " + document.getElementById('members').value);

            // Proceed with the submission if all fields are filled
            this.submit();
        };
    </script>
</body>
</html>
