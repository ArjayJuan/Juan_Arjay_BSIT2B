<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit(); // Exit to prevent further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"> 
    <script src="https://kit.fontawesome.com/4012f487f7.js" crossorigin="anonymous"></script>
    <style>
       .hero{
            background: url(https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D) center / cover;
       } 
       .sidebar {   
            padding: 15px;
        }
        .content {
            padding: 20px;
        }
    </style>
    <title>Front Page</title>
</head>
<body>
    <section class="hero is-fullheight">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item title">
                            Restaurant<br>Del Mor
                        </a>
                        <span class="navbar-burger" data-target="navbarMenuHeroA">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <span class="navbar-item">
                                <a href="logout.php" class="button is-danger is-inverted">
                                    <span class="icon is-small">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </span>
                                    <span>Logout</span>
                                </a>  
                            </span>
                            <span class="navbar-item">
                                <a class="button is-primary is-inverted" href="register.php">
                                    <span class="icon">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                    </span>
                                <span>Register</span>
                                </a>
                            </span>
                      </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container mx-3 mt-3">
            <div class="columns">
                <div class="column is-one-fifth sidebar">
                    <ul>
                        <li><a href="dashboard.php" class="sidebarmenu my-3 px-2">
                            <span class="icon is-small">
                            <i class="fa-solid fa-chart-line"></i>
                            </span>
                            <span>Dashboard</span>
                        </a></li>
                        <li><a href="frontpage.php" class="sidebarmenu my-3 px-2 mb-6">
                            <span class="icon is-small">
                                <i class="fa-solid fa-home"></i>
                            </span>
                            <span>Home</span>
                        </a></li>
                        <li><a href="create_new.php" class="sidebarmenu my-3 px-2">
                            <span class="icon is-small">
                            <i class="fa-solid fa-utensils"></i> 
                            </span>
                            <span>Add New Reservation</span>
                        </a></li>
                        <li><a href="sidebar.php" class="sidebarmenu my-3 px-2">
                            <span class="icon is-small">
                            <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span>View Reservation</span>
                        </a></li>
                        <li><a href="register.php" class="sidebarmenu my-3 px-2">
                            <span class="icon is-small">
                            <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span>Sign in</span>
                        </a></li>
                    </ul>
                </div>
                <div class="column content has-text-centered">
                    <div class="container">
                        <p class="title has-text-white">Make your reservation</p>
                        <p class="subtitle has-text-white">Book your reservations now to easily get to your table</p>
                        <a class="button is-link is-dark is-inverted is-large my-2 mt-2 mb-4" href="create_new.php">
                            <span class="icon is-large">
                                <i class="fa-solid fa-utensils fa-lg" style="color: #000000;"></i>
                            </span>
                            <span>Create Reservation</span>
                        </a>
                    </div>

                    <div class="container">
                        <p class="title has-text-black">Check your reservation</p>
                        <p class="subtitle has-text-white">Take a look at your reservation and the reservation of others</p>
                        <a class="button is-link is-dark is-inverted is-large my-2 mt-2 mb-4" href="sidebar.php">
                            <span class="icon is-small">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span>Reservation List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

    </section>
</body>
</html>