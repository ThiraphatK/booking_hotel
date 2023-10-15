<!--  จองห้องพัก
- บริษัททัวร์
- ชื่อผู้เข้าพัก
    - คำนำหน้า
    - ชื่อ
    - นามสกุล
    - อีเมล
    - เบอร์โทร
- เลือกหมายเลขห้องพัก
- วันที่เข้าพัก
- วันที่ออกห้องพัก
- ปุ่มยืนยันการจอง
-->
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
            <a href="./report_tourist.php">
                <ion-icon name="bar-chart"></ion-icon> Report tourist
            </a>
        </li>
        <li>
            <a class="active" href="./booking_room.php">
                <ion-icon name="today"></ion-icon></ion-icon> Booking room
            </a>
        </li>
        <li>
            <a href="./booking_room_change.php">
                <ion-icon name="construct"></ion-icon></ion-icon> Change data</a>
        </li>
    </ul>

    <div style="margin-left:25%;padding:1px 16px;">
        <!-- header -->
        <h1>
            <center>Register user information</center>
        </h1>
        <hr>

        <!-- form -->
        <form method="post">
            <div class="input-group">
                <span class="input-group-text">Tourist company</span>
                <select class="form-select" name="select" required>
                    <?php
                    $query = "select name from tourist;";
                    $check = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($check)) {
                        echo "<option value=" . $row['name'] . ">" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text">Title</span>
                <select class="form-select" name="select" required>
                    <option value="mr">Mr.</option>
                    <option value="ms">Ms.</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text">Email</span>
                <input type="email" aria-label="email" name="email" class="form-control" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Phone</span>
                <input type="text" aria-label="phone" name="phone" class="form-control" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Room no.</span>
                <select class="form-select" name="select" required>
                    <?php
                    $query = "select r.room_id from room r left join booking_calendar bc on r.room_id = bc.room_id  where bc.status LIKE 'clear';";
                    $check = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($check)) {
                        echo "<option value=" . $row['room_id'] . ">" . $row['room_id'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text">Check in</span>
                <input type="datetime-local" aria-label="check_in" class="form-control" name="check_in" required>
                <span class="input-group-text">Check out</span>
                <input type="datetime-local" aria-label="check_out" class="form-control" name="check_out" required>
            </div>
            <input type="button" class="btn btn-success botton-form" value="submit">
        </form>

    </div>

    <footer>
        <p><b>members</b></p>
        <ol>
            <li>Chananpat 662132056</li>
            <li>Thiraphat Kharinchai 662132057</li>
            <li>Wayupak Watcharasirisereekul 662132058</li>
        </ol>
    </footer>

    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>