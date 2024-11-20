<?php
// Start session to access user information
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Check if the user is logged in -->
                            <?php if (isset($_SESSION['name'])): ?>
                                <!-- Display the user's name if logged in -->
                                <?php echo htmlspecialchars($_SESSION['name']); ?>
                            <?php else: ?>
                                Profile
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION['name'])): ?>
                                <li><a class="dropdown-item" href="my_bookings.php">My Bookings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Welcome to Our Hotel Shines</h2>
	    <p class="home-intro">
    Welcome to <strong>Hotel Shines</strong>, your oasis in the heart of the city. Whether you’re here for business or leisure, enjoy our modern rooms, top-tier amenities like a sparkling pool and fitness center, and exceptional dining. With our warm hospitality and convenient location near key attractions, we ensure a seamless and unforgettable stay. <strong>Book your escape today!</strong>
	   </p>
            
            
        </div>
    </div>

</div>
<div class="carousel-container">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        
				<div class="carousel-item active"><img src="https://t3.ftcdn.net/jpg/03/24/73/92/360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg" class="d-block" alt="Hotel Image 1">
                        	</div>

                        	<div class="carousel-item"><img src="https://hoteldel.com/wp-content/uploads/2021/01/hotel-del-coronado-views-suite-K1TOS1-K1TOJ1-1600x900-1.jpg" alt="Hotel Image 2">
                        	</div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
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

				<a href="rooms.php" class="btn btn-primary">View Now</a>
                                
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

				<a href="rooms.php" class="btn btn-primary">View Now</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container mt-5">
       
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVMBcotqXayYvl_bj2VtM_4duLBprq3fRyYQ&s" class="img-fluid rounded-start" alt="Family Room">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Single Bed Room</h5>
                                <p class="card-text">"Comfortably designed for families, this room features multiple beds and ample space for a relaxing stay with your loved ones."<br>
<b>Rate: </b>$250 per night</p>

				<a href="rooms.php" class="btn btn-primary">View Now</a>
                                
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

				<a href="rooms.php" class="btn btn-primary">View Now</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modals for Register and Login -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="register.php" method="post">
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
<div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

