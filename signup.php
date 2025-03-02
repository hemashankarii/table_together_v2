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
  <style>
    :root {
    --navcolor: white;
    --navfont: black;
    --green: #3d550c;
    --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    * {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f7f8fc, #e0f7fa);
        background-size: cover;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 20px;
    }

    .regform {
        background-color: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: var(--box-shadow);
        max-width: 400px;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .logo {
        font-size: 32px;
        color: var(--navfont);
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    #heading {
        font-size: 26px;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }

    .input {
        margin-bottom: 20px;
    }

    .textlabel {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        color: #555;
    }

    .regform input[type="text"],
    .regform input[type="email"],
    .regform input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-bottom: 10px;
        border-radius: 8px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        font-size: 16px;
    }

    .regform input[type="text"]:focus,
    .regform input[type="email"]:focus,
    .regform input[type="password"]:focus {
        border-color: var(--green);
        box-shadow: 0 0 8px rgba(6, 193, 103, 0.3);
    }

    .password {
        position: relative;
    }

    .showHidePw {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #777;
        transition: color 0.3s ease;
    }

    .showHidePw:hover {
        color: var(--green);
    }

    .radio {
        margin-bottom: 20px;
        display: flex;
        gap: 15px;
    }

    .radio input[type="radio"] {
        margin-right: 5px;
    }

    .radio label {
        font-size: 16px;
        color: #555;
    }

    .btn button[type="submit"] {
        background-color: var(--green);
        color: white;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        font-size: 16px;
        font-weight: bold;
    }

    .btn button[type="submit"]:hover {
        background-color:rgb(69, 90, 27);
        transform: translateY(-2px);
    }

    .signin-up {
        margin-top: 20px;
        text-align: center;
    }

    .signin-up a {
        color: var(--green);
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .signin-up a:hover {
        color: #05a858;
    }

    @media (max-width: 768px) {
        .regform {
            padding: 20px;
        }

        .logo {
            font-size: 28px;
        }

        #heading {
            font-size: 22px;
        }

        .textlabel {
            font-size: 14px;
        }

        .regform input[type="text"],
        .regform input[type="email"],
        .regform input[type="password"] {
            font-size: 14px;
        }

        .btn button[type="submit"] {
            font-size: 14px;
        }
    }
</style>

</head>
<body>
    <div class="container">
        <div class="regform">
            <form action="" method="post">
                <p class="logo">Table <b style="color: #3d550c;">Together</b></p>
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
