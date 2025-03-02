<?php
include 'connection.php';
$msg=0;
if(isset($_POST['sign'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $latlon = $_POST['latlon'];

    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        echo "<h1><center>Account already exists</center></h1>";
    } else {
        $query = "INSERT INTO login(name, email, password, gender, latlon) VALUES('$username', '$email', '$pass', '$gender', '$latlon')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            header("location:signin.php");
        } else {
            echo '<script type="text/javascript">alert("Data not saved")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="loginstyle.css">
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latlon').value = position.coords.latitude + ',' + position.coords.longitude;
                }, function(error) {
                    console.error("Error getting location: ", error);
                });
            } else {
                console.error("Geolocation is not supported by this browser.");
            }
        }
        window.onload = getLocation;
    </script>
</head>
<body>
    <div class="container">
        <div class="regform">
            <form action="" method="post">
                <p class="logo">Food <b style="color: #06C167;">Donate</b></p>
                <p id="heading">Create your account</p>
                <div class="input">
                    <label class="textlabel" for="username">User name</label><br>
                    <input type="text" id="username" name="username" required/>
                </div>
                <div class="input">
                    <label class="textlabel" for="email">Email</label>
                    <input type="email" id="email" name="email" required/>
                </div>
                <label class="textlabel" for="password">Password</label>
                <div class="password">
                    <input type="password" name="password" id="password" required/>
                    <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>
                </div>
                <div class="radio">
                    <input type="radio" name="gender" id="male" value="male" required/>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                </div>
                <input type="hidden" id="latlon" name="latlon">
                <div class="btn">
                    <button type="submit" name="sign">Continue</button>
                </div>
                <div class="signin-up">
                    <p style="font-size: 20px; text-align: center;">Already have an account? <a href="signin.php"> Sign in</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
