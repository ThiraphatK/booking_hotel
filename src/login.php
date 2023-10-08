<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 20%;
            margin: auto;
        }
    </style>
</head>

<body>

    <h2>
        <center>Booking Hotel</center>
    </h2>
    <hr style="width: 50%;">
    <div>
        <h3>log in</h3>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>username: </th>
                        <td>
                            <input type="email" name="username" id="username">
                        </td>
                    </tr>
                    <tr>
                        <th>password: </th>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                </table>
            </form>
        <input type="button" value="login"><br>
        <a href="./reset_password.php">forgot password</a><br>
        <a href="./register.php">register</a>
    </div>

</body>

</html>