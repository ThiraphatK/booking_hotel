<?php
require('./script/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a class="active" href="./search_guest_of_tourist.php">
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
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8 py-4">
                    <form method="post" class="row">
                        <div class="col">
                            <input type="text" aria-label="booking_id" class="form-control" name="booking_id" required>
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" name="submit" class="btn btn-success">search</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $sql = "call search_booking_id('" . $_POST["booking_id"] . "');";
                        $query = mysqli_query($con, $sql);
                        $check_data = mysqli_num_rows($query);
                        if ($check_data == 0) {
                            echo "<p class='text-center py-4'><span class='badge bg-danger' style='front-size:20px'>Not found</span></p>";
                        } else {
                    ?>
                            <?php echo"<p style='margin-top:2%'>booking id: ".$_POST["booking_id"]."</p>" ?>
                            <table class='table table-bordered mt-4 table-striped'>
                                <thead class='table-secondary'>
                                    <tr>
                                        <th scope='col'>Booking id</th>
                                        <th scope='col'>first name</th>
                                        <th scope='col'>last name</th>
                                        <th scope='col'>description</th>
                                        <th scope='col'>price</th>
                                        <th scope='col'>change customer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><?php echo $result['booking_id']; ?></td>
                                            <td><?php echo $result['firstname']; ?></td>
                                            <td><?php echo $result['lastname']; ?></td>
                                            <td><?php echo $result['description']; ?></td>
                                            <td><?php echo $result['price_total']; ?></td>
                                            <td><a href="./edit_profile.php"><ion-icon name="create"></ion-icon>edit</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p><b>members</b></p>
        <ol>
            <li>Chananpat Kitpatcharakulchot 662132056</li>
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