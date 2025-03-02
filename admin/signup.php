<?php
include '../connection.php';
$msg=0;
if(isset($_POST['sign'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $location = $_POST['district'];
    $address = $_POST['address'];
    $latlon = $_POST['latlon'];

    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        echo "<h1><center>Account already exists</center></h1>";
    } else {
        $query = "INSERT INTO admin(name, email, password, location, address, latlon) VALUES('$username', '$email', '$pass', '$location', '$address', '$latlon')";
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
    <link rel="stylesheet" href="formstyle.css">
    <script src="signin.js" defer></script>
    <title>Register</title>
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
        <form action="" method="post" id="form">
            <span class="title">Register</span>
            <div class="input-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="username" required/>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required/>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required/>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="input-field">
                <label for="district">Location:</label>
                <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                    <option value="chennai">Chennai</option>
                    <option value="kancheepuram">Kancheepuram</option>
                    <option value="thiruvallur">Thiruvallur</option>
                    <option value="vellore">Vellore</option>
                    <option value="tiruvannamalai">Tiruvannamalai</option>
                    <option value="tiruvallur">Tiruvallur</option>
                    <option value="tiruppur">Tiruppur</option>
                    <option value="coimbatore">Coimbatore</option>
                    <option value="erode">Erode</option>
                    <option value="salem">Salem</option>
                    <option value="namakkal">Namakkal</option>
                    <option value="tiruchirappalli">Tiruchirappalli</option>
                    <option value="thanjavur">Thanjavur</option>
                    <option value="pudukkottai">Pudukkottai</option>
                    <option value="karur">Karur</option>
                    <option value="ariyalur">Ariyalur</option>
                    <option value="perambalur">Perambalur</option>
                    <option value="madurai" selected>Madurai</option>
                    <option value="virudhunagar">Virudhunagar</option>
                    <option value="dindigul">Dindigul</option>
                    <option value="ramanathapuram">Ramanathapuram</option>
                    <option value="sivaganga">Sivaganga</option>
                    <option value="thoothukkudi">Thoothukkudi</option>
                    <option value="tirunelveli">Tirunelveli</option>
                    <option value="tiruppur">Tiruppur</option>
                    <option value="tenkasi">Tenkasi</option>
                    <option value="kanniyakumari">Kanniyakumari</option>
                </select>
            </div>
            <input type="hidden" id="latlon" name="latlon">
            <button type="submit" name="sign">Register</button>
            <div class="login-signup">
                <span class="text">Already a member?
                    <a href="signin.php" class="text login-link">Login Now</a>
                </span>
            </div>
        </form>
    </div>
</body>
</html>
