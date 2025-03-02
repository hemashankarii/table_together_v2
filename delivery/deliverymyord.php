<?php
ob_start(); 

include '../connection.php';
include("connect.php"); 
if($_SESSION['name']==''){
	header("location:deliverylogin.php");
}
$name=$_SESSION['name'];
$id=$_SESSION['Did'];

if (isset($_POST['delivered'])) {
    $order_id = $_POST['order_id'];
    $update_sql = "UPDATE food_donations SET delivery_status = 1 WHERE Fid = '$order_id'";
    mysqli_query($connection, $update_sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="delivery.css">
    <link rel="stylesheet" href="../home.css">
</head>
<body>
<header>
        <div class="logo">Table <b style="color: #3d550c;">Together</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="delivery.php" style="background-color:#3d550c;color:white" >Home</a></li>
                <li><a href="deliverymyord.php"  class="active"  >myorders</a></li>
                <li ><a href="../logout.php" style="background-color:#3d550c;color:white"    >Logout</a></li>

            </ul>
        </nav>
    </header>
    <br>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
    <style>
        .itm{
            background-color: white;
            display: grid;
        }
        .itm img{
            width: 400px;
            height: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        p{
            text-align: center; font-size: 28PX;color: black; 
        }
        @media (max-width: 767px) {
            .itm img{
                width: 350px;
                height: 350px;
            }
        }
    </style>

    <div class="itm">
        <img src="../img/delivery.gif" alt="" width="400" height="400"> 
    </div>

    <div class="get">
        <?php
        $sql = "SELECT fd.Fid AS Fid, fd.name, fd.phoneno, fd.date, fd.delivery_by, 
                       fd.address AS From_address, fd.latlon AS from_latlon,
                       ad.name AS delivery_person_name, ad.address AS To_address, ad.latlon AS to_latlon,
                       fd.delivery_status
                FROM food_donations fd
                LEFT JOIN admin ad ON fd.assigned_to = ad.Aid 
                WHERE delivery_by='$id'";

        $result = mysqli_query($connection, $sql);

        if (!$result) {
            die("Error executing query: " . mysqli_error($connection));
        }

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        ?>
        <div class="log">
            <a href="delivery.php" style="background-color:#3d550c"   >Take orders</a>
            <p>Order assigned to you</p>
            <br>
        </div>

        <div class="table-container">
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone No</th>
                            <th>Date/Time</th>
                            <th>Pickup Address</th>
                            <th>Delivery Address</th>
                            <th>Delivery Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['phoneno'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td>
                                    <a href="https://www.google.com/maps?q=<?= $row['from_latlon'] ?> " style="background-color:#3d550c"  target="_blank">
                                        <?= $row['From_address'] ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="https://www.google.com/maps?q=<?= $row['to_latlon'] ?>" style="background-color:#3d550c"   target="_blank">
                                        <?= $row['To_address'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php if ($row['delivery_status']) { ?>
                                        Delivered
                                    <?php } else { ?>
                                        <form method="post">
                                            <input type="hidden" name="order_id" value="<?= $row['Fid'] ?>">
                                            <button type="submit" name="delivered" style="background-color:#3d550c"  >order delivered?</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   <br>
   <br>
</body>
</html>
