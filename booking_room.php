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
        th{
            text-align: right;
        }
    </style>
</head>
<body>
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
</body>
</html>