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
            <a class="active" href="./report_room.php">
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
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8 py-4">
                    <form method="post" class="row">
                        <div class="col">
                            <select class="form-select" name="select" required>
                                <option value="" selected disabled>-- tour name --</option>
                                <option value="first_tour" <?php if (isset($_POST['select'])) {
                                                                if ($_POST['select'] == "first_tour") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Mushroom Travel</option>
                                <option value="second_tour" <?php if (isset($_POST['select'])) {
                                                                if ($_POST['select'] == "second_tour") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Hello Travel</option>
                                <option value="third_tour" <?php if (isset($_POST['select'])) {
                                                                if ($_POST['select'] == "third_tour") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>At Siam Tour</option>
                            </select>
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" name="submit" class="btn btn-success">search</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        // $sql = "SELECT * FROM booking WHERE tourist_id LIKE '".$_POST['select']."'";
                        // $sql = "select g.firstname , g.lastname ,r.room_id , rt.price , b.checkin_date, b.checkout_date  from booking b left join tourist t on b.tourist_id = t.tourist_id left join room r on b.room_id = r.room_id left join guest g on b.guest_id = g.guest_id left join room_type rt on r.type_id = rt.type_id where t.username = '" . $_POST['select'] . "';";
                        $sql = "call tour_commission('".$_POST["select"]."');";
                        $query = mysqli_query($con, $sql);
                        $check_data = mysqli_num_rows($query);
                        if ($check_data == 0) {
                            echo "<p class='text-center py-4'><span class='badge bg-danger' style='front-size:20px'>Not found</span></p>";
                        } else {
                    ?>
                            <table class='table table-bordered mt-4 table-striped'>
                                <thead class='table-secondary'>
                                    <tr>
                                        <th scope='col'>No.</th>
                                        <th scope='col'>first name</th>
                                        <th scope='col'>last name</th>
                                        <th scope='col'>description</th>
                                        <th scope='col'>price</th>
                                        <th scope='col'>number of days</th>
                                        <th scope='col'>total price</th>
                                        <th scope='col'>commission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                                        <tr style="text-align: right;">
                                            <td><?php echo $result['row_num']; ?></td>
                                            <td><?php echo $result['firstname']; ?></td>
                                            <td><?php echo $result['lastname']; ?></td>
                                            <td><?php echo $result['description']; ?></td>
                                            <td><?php echo $result['price']; ?></td>
                                            <td><?php echo $result['number_of_days']; ?></td>
                                            <td><?php echo $result['price_total']; ?></td>
                                            <td><?php echo $result['commission']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- <table class='table table-bordered mt-4' style="width: 40%;">
                                <tr>
                                    <th class="table-secondary" style="width: 20%;">summary</th>
                                    <td>
                                        <?php
                                        $sql = "call sum_tour_commission('".$_POST["select"]."');";
                                        $query = mysqli_query($con, $sql);
                                        $result = mysqli_fetch_assoc($query2);
                                        echo $result['total_price'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-secondary" style="width: 20%;">commission</th>
                                    <td>
                                        <?php
                                        $sql = "call sum_tour_commission('".$_POST["select"]."');";
                                        $query = mysqli_query($con, $sql);
                                        $result = mysqli_fetch_assoc($query2);
                                        echo $result['commission'];
                                        ?>
                                    </td>
                                </tr>
                            </table> -->
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