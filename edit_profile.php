<?php
require('./script/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking room</title>
    <style>
        th {
            text-align: right;
        }

        .input-group {
            margin-top: 1%;
        }

        .botton-form {
            margin-top: 1%;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <ul>
        <li>
            <h1 style="text-align: center;">Database Hotel</h1>
        </li>
        <hr>
        <li>
            <a href="./report_room.php">
                <ion-icon name="file-tray-stacked"></ion-icon> Report room
            </a>
        </li>
        <li>
            <a href="./search_guest_of_tourist.php">
                <ion-icon name="people-circle"></ion-icon> Search guest of tourist
            </a>
        </li>
        <li>
            <a href="./search_room.php">
                <ion-icon name="search"></ion-icon> Search room
            </a>
        </li>
        <li>
            <a href="./booking_room.php">
                <ion-icon name="today"></ion-icon></ion-icon> Booking room
            </a>
        </li>
    </ul>

    <div style="margin-left:25%;padding:1px 16px;">
        <!-- header -->
        <h1>
            <center>Change customer profile of booking room</center>
        </h1>
        <hr>

        <!-- form -->
        <form method="post" >
        <div class="input-group">
                <span class="input-group-text">Customer id</span>
                <input type="number" aria-label="custid" name="custid" class="form-control" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Title</span>
                <select class="form-select" name="title" required>
                    <option value="Mr">Mr.</option>
                    <option value="Ms">Ms.</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text">First name</span>
                <input type="text" aria-label="firstname" name="firstname" class="form-control" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Last name</span>
                <input type="text" aria-label="lastname" name="lastname" class="form-control" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Email</span>
                <input type="email" aria-label="email" name="email" class="form-control" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Phone</span>
                <input type="text" aria-label="phone" name="phone" class="form-control" required>
            </div>
            <div style="margin-top: 1%;">
                <button type="submit" name="submit" class="btn btn-success">submit</button>
            </div>
        </form>
        <?php if (isset($_POST['submit'])) {
            
            $sql = "UPDATE guest SET prefix = '".$_POST['title']."', firstname = '".$_POST['firstname']."', lastname = '".$_POST['lastname']."', email = '".$_POST['email']."',phone = '".$_POST['phone']."' where guest_id like ".$_POST['custid'].";";
            $query = mysqli_query($con, $sql);

            echo '<script>alert("Change customer profile success!")</script>'; 

        ?>
        <?php } ?>
    </div>

    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>