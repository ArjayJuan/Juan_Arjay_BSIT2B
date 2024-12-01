<?php
include 'db_conn.php';

session_start(); // Start the session to store user information

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check if the user exists
    $sql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username;
            echo "Login successful! Welcome, " . $username;
            // Redirect to a protected page or dashboard
            header("Location: frontpage.php");
            // exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

mysqli_close($conn);
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
    </style>
    <title>Login</title>
</head>
<body>
    <section class="hero is-fullheight">
        <div class="container is-max-desktop">
            <div class="container">
                <h3>Login Page</h3>
            </div>
            <div class="container">
            <form method="POST" action="" style="width: 5ovw; min-width :300px;">

                <div class="field my-4 mx-6">
                    <p class="control has-icons-left">
                        <input class="input is-rounded is-info is-small" type="text" name="username" placeholder="Username" required>
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-user" style="color: #000000;"></i>
                        </span>
                    </p>
                </div>

                <div class="field my-4 mx-6">
                    <p class="control has-icons-left">
                        <input class="input is-rounded is-info is-small" type="password" name="password" placeholder="Password" required>
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-lock" style="color: #000000;"></i>
                        </span>
                    </p>
                </div>

                <div class="field mb-4 mx-6">
                    <button class="button is-small is-success is-inverted" type="submit" name="submit">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Login</span>
                    </button>
                </div>

                <div class="field mb-4 mx-6">
                    <a class="button is-small is-danger is-inverted" href="frontpage.html" >
                        <span class="icon is-small">
                            <i class="fa-solid fa-ban"></i>
                        </span>
                        <span>Cancel</span>
                    </a>
                </div>
            </form>
            <?php if (isset($_SESSION['username'])) { ?>
                <div class="field mb-4 mx-6">
                    <a href="logout.php" class="button is-small is-danger is-inverted">
                        <span class="icon is-small">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span>Logout</span>
                    </a>
                </div>
            <?php } ?>
        </div>
        <p>Not yet registered? <a href="register.php">Register Here</a></p>
    </section>
</body>
</html>