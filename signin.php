<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url("https://i.pinimg.com/originals/10/3b/85/103b851bff79e81d90f2b90eb9574e72.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .all {
            margin-top: 10%;
        }

        .topic {
            margin: auto;
            text-align: center;
        }

        .login {
            width: 40%;
            margin: auto;
            background-color: #CFCFCF;
            border-radius: 10px;
        }

        .logo-user img {
            width: 15%;
        }

        .fill-user-password{
            margin: auto;
        }

        .btn {
            width: 100%;
        }

        .forgot-password {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container all">
        <div class="row topic">
            <h1>Database Hotel</h1>
            <h5><b>Signin to booking hotel</b></h5>
        </div>
        <div class="row login">
            <div class="row logo-user">
                <center><img src="./image/people-circle-outline.svg"></center>
            </div>
            <div class="row fill-user-password">
                <form action="./script/signin_system.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <p class="forgot-password"><a href="./change_user_data.php" target="_blank">Forgot password?</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>