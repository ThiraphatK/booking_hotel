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
            <a class="active" href="./booking_room.php">
                <ion-icon name="today"></ion-icon></ion-icon> Booking room
            </a>
        </li>
    </ul>

    <div style="margin-left:25%;padding:1px 16px;">
        <!-- header -->
        <h1>
            <center>Register user information</center>
        </h1>
        <hr>

        <!-- form -->
        <form method="GET">
            <div class="input-group">
                <span class="input-group-text">Tourist company</span>
                <input type="text" class='form-control' name="select" id="select" value="<?php echo $_GET['select'] ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text">Title</span>
                <input type="text" class='form-control' name="title" id="title" value="<?php echo $_GET['title'] ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text">First name</span>
                <input type="text" class='form-control' name="firstname" id="firstname" value="<?php echo $_GET['firstname'] ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text">Last name</span>
                <input type="text" class='form-control' name="lastname" id="lastname" value="<?php echo $_GET['lastname'] ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text">Email</span>
                <input type="text" class='form-control' name="email" id="email" value="<?php echo $_GET['email'] ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text">Phone</span>
                <input type="text" class='form-control' name="phone" id="phone" value="<?php echo $_GET['phone'] ?>">
            </div>
            <div class="input-group" style="margin-top: 1px;">
                <div class="input-group col">
                    <span class="input-group-text">Check in</span>
                    <input type="date" class='form-control' name="check_in" id="check_in" value="<?php echo $_GET['check_in'] ?>">
                </div>
                <div class="input-group col" style="margin-left: 2%;">
                    <span class="input-group-text">Check out</span>
                    <input type="date" class='form-control' name="check_out" id="check_out" value="<?php echo $_GET['check_out'] ?>">
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-text">Room</span>
                <select class="form-select" aria-label="room_id" name="room_id">
                <?php
                    $sql = "call date_room_status('" . $_GET['check_in'] . "', '" . $_GET['check_out'] . "');";
                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($query)){
                    echo "<option name='room_id' value = ".$row['room_id'].">room id: ".$row['room_id'].", type:".$row['description']." price: ".$row['price']."</option>";
                    }
                ?>
                </select>
            </div>
            <div style="margin-top: 1%;">
                <button type="submit" name="submit" class="btn btn-success">submit</button>
            </div>
        </form>
        <?php
            if (isset($_GET['submit'])) {
                $sql = "call booking_room('".$_GET['title']."', '".$_GET['firstname']."', '".$_GET['lastname']."', '".$_GET['phone']."','".$_GET['email']."', '".$_GET['select']."', '".$_GET['check_in']."', '".$_GET['check_out']."', '".$_GET['room_id']."');";
                $result = mysqli_query($con, $sql);
                echo "success";
            }
        ?>
    </div>
    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>