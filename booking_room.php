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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/navbar.css">
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
        <h2>
            <center>Register user information</center>
        </h2>
        <hr style="width: 50%;">

        <!-- form -->
        <center>
            <form action="" method="post">
                <table>
                    <tr>
                        <th> Tourist company: </th>
                        <td>
                            <input type="text" name="company" id="company" value="Tourist A" disabled required>
                        </td>
                    </tr>
                    <tr>
                        <th>Title: </th>
                        <td>
                            <select name="title" id="title" required>
                                <option value="mr" selected>Mr.</option>
                                <option value="ms">Ms.</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>First name: </th>
                        <td>
                            <input type="text" name="first_name" id="first_name" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Last name: </th>
                        <td>
                            <input type="text" name="last_name" id="last_name" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>
                            <input type="email" name="email" id="email">
                        </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>
                            <input type="text" name="phone" id="phone">
                        </td>
                    </tr>
                    <tr>
                        <th>Room no.</th>
                        <td>
                            <select name="room" id="room" required>
                                <option value="101">101</option>
                                <option value="102">102</option>
                                <option value="103">103</option>
                                <option value="104">104</option>
                                <option value="105">105</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Check in.: </th>
                        <td>
                            <input type="datetime-local" name="check_in" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Check out.: </th>
                        <td>
                            <input type="datetime-local" name="check_out" id="check_out" required>
                        </td>
                    </tr>
                </table>
                <input type="button" value="submit">

            </form>

        </center>
    </div>

    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>