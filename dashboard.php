<!DOCTYPE html>
<html lang="en" class="has-background-success-light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"> 
    <script src="https://kit.fontawesome.com/4012f487f7.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <style>
        .hero {
            background: url(https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D) center / cover;
        }
        .sidebar {
            padding: 15px;
        }
        .sidebarmenu {
            margin: 20px;
            
        }
    </style>
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
                    <h1 class="title has-text-centered">Dashboard</h1>
                    <div class="columns">
                        <div class="column">
                            <div class="box has-background-light">
                                <h2 class="subtitle">Total Users</h2>
                                <p class="is-size-3 has-text-centered">
                                    <?php
                                    include "db_conn.php";
                                    // Query to count users
                                    $sql = "SELECT COUNT(*) AS total_users FROM users"; // Assuming your users table is named 'users'
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['total_users'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="box has-background-light">
                                <h2 class="subtitle">Total Reservations</h2>
                                <p class="is-size-3 has-text-centered">
                                    <?php
                                    // Query to count reservations
                                    $sql = "SELECT COUNT(*) AS total_reservations FROM reservations"; // Assuming your reservations table is named 'reservations'
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['total_reservations'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>