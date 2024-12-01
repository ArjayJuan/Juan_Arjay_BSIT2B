<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit(); // Exit to prevent further execution
}

include "db_conn.php";

if (isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $number_of_guest = $_POST['number_of_guest'];
    $date_reserved = $_POST['date_reserved'];
    $contact_info = $_POST['contact_info'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO `reservations`(`id`, `full_name`, `number_of_guest`, `date_reserved`, `contact_info`, `notes`) 
    VALUES (NULL,'$full_name','$number_of_guest','$date_reserved','$contact_info','$notes')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("location: sidebar.php?msg=New resservation created successfully");
    }else{
        echo "Failed: " . mysqli_error($conn);
    }
    
}
?>





<!DOCTYPE html>
<html lang="en" class="">
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
    <title>Create Reservation</title>
</head>
<body>
    <section class="hero is-fullheight">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item title">
                            Resturant<br>Del Mor
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
                    <div class="has-text-centered is-size-2 has-background-success my-2 mx-2">
                        <h3>New Reservation</h3>
                    </div>
                    <form action="" method="post">

                        <div class="field my-4 mx-6">
                            <p class="control has-icons-left">
                                <input class="input is-rounded is-info is-small" type="text" name="full_name" placeholder="Full Name"required><br>
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field mb-2 mx-6">
                            <p class="control has-icons-left">
                                <input class="input is-rounded is-info is-small" type="number" name="number_of_guest" placeholder="Number of Guest"required><br>
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-users"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field mb-4 mx-6">
                                <label class="is-size-7 has-text-white" for="date_reserved">Date Reserved</label>
                                <input class="input is-rounded is-info is-small" type="date" name="date_reserved" placeholder="Date of Reservation"required><br>
                        </div>

                        <div class="field mb-4 mx-6">
                            <p class="control has-icons-left">
                                <input class="input is-rounded is-info is-small" type="text" name="contact_info" placeholder="Contact Information" required><br>
                                <span class="icon is-small if-left">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field mb-4 mx-6">
                            <textarea class="textarea is-info is-small" name="notes" id="notes" placeholder="Notes" required></textarea><br>
                        </div>

                        <div class="field mb-4 mx-6">
                            <button class="button is-small is-success is-inverted" type="submit" name="submit">
                                <span class="icon is-small">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span>Reserved</span>
                            </button>
                        </div>

                        <div class="field mb-4 mx-6">
                            <a class="button is-small is-danger is-inverted" href="frontpage.php" >
                                <span class="icon is-small">
                                    <i class="fa-solid fa-ban"></i>
                                </span>
                                <span>Cancel</span>
                            </a>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>

    </section>
</body>
</html>