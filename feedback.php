<?php
session_start();
include 'connection.php';

if (isset($_POST['feedback'])) {
  $email = $_POST['email'];
  $name = $_POST['name'];
  $msg = $_POST['message'];
  
  $sanitized_emailid = mysqli_real_escape_string($connection, $email);
  $sanitized_name = mysqli_real_escape_string($connection, $name);
  $sanitized_msg = mysqli_real_escape_string($connection, $msg);
  
  $query = "INSERT INTO user_feedback(name, email, message) VALUES(?, ?, ?)";
  $stmt = mysqli_prepare($connection, $query);
  
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $sanitized_name, $sanitized_emailid, $sanitized_msg);
    $query_run = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($query_run) {
      $_SESSION['feedback_status'] = "Thank you for your feedback!";
      header("Location: feedback.php");
      exit();
    } else {
      $_SESSION['feedback_status'] = "Error saving feedback. Please try again.";
    }
  } else {
    $_SESSION['feedback_status'] = "Database error. Please contact support.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: #3d550c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            text-align: center;
            color: #3d550c;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }
        h1 {
            color: #3d550c;
            margin-bottom: 15px;
        }
        p {
            color: #333;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3d550c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        a:hover {
            background-color: #2a3b07;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="img/green.gif" alt="we appreciate you">
        <h1>Thank You for Your Feedback!</h1>
        <?php if(isset($_SESSION['feedback_status'])): ?>
            <p><?php echo $_SESSION['feedback_status']; unset($_SESSION['feedback_status']); ?></p>
        <?php endif; ?>
        <a href="contact.html">Go Back</a>
    </div>
</body>
</html>