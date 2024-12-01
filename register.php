<?php
include 'db_conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
    // Insert user into the database
    $sql = "INSERT INTO `users`(`user_name`, `password`) 
            VALUES ('$username','$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("location: login.php?");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <title>Register</title>
</head>
<body>
    <section class="hero is-fullheight">
        <div class="container is-max-desktop">
            <div class="container">
                <h3>Registration Page</h3>
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
                        <span>Register</span>
                    </button>
                </div>
            </form>
            </div>
            <p>Already registered? <a href="login.php">Login here</a></p>
        </div>
    </section>
</body>
</html>