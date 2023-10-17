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
        <form method="get" action="./booking_room_date.php">
            <div class="input-group">
                <span class="input-group-text">Tourist company</span>
                <select class="form-select" name="select" required>
                    <option value="" selected disabled>-- เลือกทัวร์ --</option>
                    <option value="บริษัท การท่องเที่ยวอับดับหนึ่ง จำกัด" <?php if (isset($_POST['select'])) {
                                                    if ($_POST['select'] == "first_tour") {
                                                        echo "selected";
                                                    }
                                                } ?>>บริษัท การท่องเที่ยวอับดับหนึ่ง จำกัด</option>
                    <option value="บริษัท การท่องเที่ยวอับดับสอง จำกัด" <?php if (isset($_POST['select'])) {
                                                    if ($_POST['select'] == "second_tour") {
                                                        echo "selected";
                                                    }
                                                } ?>>บริษัท การท่องเที่ยวอับดับสอง จำกัด</option>
                    <option value="บริษัท การท่องเที่ยวอับดับสาม จำกัด" <?php if (isset($_POST['select'])) {
                                                    if ($_POST['select'] == "third_tour") {
                                                        echo "selected";
                                                    }
                                                } ?>>บริษัท การท่องเที่ยวอับดับสาม จำกัด</option>
                </select>
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
                <input type="text" aria-label="firstname" name="firstname" class="form-control" value="<?php if (isset($_POST['search'])) {
                                                                                                            echo $_POST['firstname'];
                                                                                                        } ?>" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Last name</span>
                <input type="text" aria-label="lastname" name="lastname" class="form-control" value="<?php if (isset($_POST['search'])) {
                                                                                                            echo $_POST['lastname'];
                                                                                                        } ?>" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Email</span>
                <input type="email" aria-label="email" name="email" class="form-control" value="<?php if (isset($_POST['search'])) {
                                                                                                    echo $_POST['email'];
                                                                                                } ?>" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Phone</span>
                <input type="text" aria-label="phone" name="phone" class="form-control" value="<?php if (isset($_POST['search'])) {
                                                                                                    echo $_POST['phone'];
                                                                                                } ?>" required>
            </div>
            <div class="input-group" style="margin-top: 1px;">
                <div class="input-group col">
                    <span class="input-group-text">Check in</span>
                    <input type="date" aria-label="check_in" class="form-control" name="check_in" value="<?php if (isset($_POST['search'])) {
                                                                                                                echo $_POST['check_in'];
                                                                                                            } ?>" required>
                </div>
                <div class="input-group col" style="margin-left: 2%;">
                    <span class="input-group-text">Check out</span>
                    <input type="date" aria-label="check_out" class="form-control" name="check_out" value="<?php if (isset($_POST['search'])) {
                                                                                                                echo $_POST['check_out'];
                                                                                                            } ?>" required>
                </div>
            </div>
            <div style="margin-top: 1%;">
                <button type="submit" name="search" class="btn btn-success">search</button>
            </div>
        </form>
        <?php if (isset($_POST['search'])) {
            $guest = "call create_guest('" . $_POST['title'] . "','" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "');";
            $query = mysqli_query($con, $guest);

            $sql = "call date_room_status('" . $_POST['check_in'] . "', '" . $_POST['check_out'] . "');";
            $query = mysqli_query($con, $sql);
            // $check_data = mysqli_num_rows($query);

            if ($_POST['check_out'] < $_POST['check_in']) {
                echo "<p class='text-center py-4'><span class='badge bg-danger' style='front-size:20px'>check out date must more than check in date</span></p>";
            } else {
        ?>
                <form method="post">
                    <div class="input-group">
                        <span class="input-group-text">Room</span>
                        <select class="form-select" name="select" required>
                            <?php
                            // $query = "select name from tourist;";
                            // $check = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<option value=" . $row['room_id'] . ">room id: " . $row['room_id'] . ", description: " . $row['description'] . ", price: " . $row['price'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div style="margin-top: 1%;">
                        <button type="submit" name="submit" class="btn btn-success">submit</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    echo "test";
                }
                ?>
                <!-- <table class='table table-bordered mt-4 table-striped'>
                    <thead class='table-secondary'>
                        <tr>
                            <th scope='col'>No.</th>
                            <th scope='col'>Room no.</th>
                            <th scope='col'>description</th>
                            <th scope='col'>price</th>
                            <th scope='col'>status</th>
                            <th scope="col">booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <form method="post">
                                    <td><?php echo $result['row_num']; ?></td>
                                    <td><?php echo $result['room_id']; ?></td>
                                    <td><?php echo $result['description']; ?></td>
                                    <td><?php echo $result['price']; ?></td>
                                    <td><?php echo $result['room_status']; ?></td>
                                    <td><button type="submit" name="submit" class="btn btn-success"><ion-icon name="create-outline"></ion-icon>booking</button></td>
                                </form>
                                <?php
                                if (isset($_POST['submit'])) {
                                    echo $_POST['row_num'];
                                    $query = mysqli_query($con, $sql);
                                    $check_data = mysqli_num_rows($query);
                                } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> -->
            <?php } ?>
        <?php } ?>
    </div>

    <!-- <footer>
        <p><b>members</b></p>
        <ol>
            <li>Chananpat Kitpatcharakulchot 662132056</li>
            <li>Thiraphat Kharinchai 662132057</li>
            <li>Wayupak Watcharasirisereekul 662132058</li>
        </ol>
    </footer> -->

    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>