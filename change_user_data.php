<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container {
            background-color: #f1f1f1;
            padding: 20px;
        }

        #password-condition p {
            padding: 10px 35px;
            font-size: 18px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #000000;
            border-radius: 4px;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        #password-condition {
            display: none;
            background-color: #f1f1f1;
            color: #000000;
        }

        .valid {
            color: green;
        }

        .valid::before {
            position: relative;
            content: "✅";
        }

        .invalid {
            color: red;
        }

        .invalid::before {
            position: relative;
            content: "❌";
        }
    </style>
</head>

<body>
    <h2>
        Booking Hotel
    </h2>
    <hr>
    <h3>Register</h3>
    <div class="container">
        <form method="POST" action="./script/login_system.php">
            <!-- input username -->
            <label for="username">Username</label>
            <input type="text" name="username" id="username" require>
            <!-- input password -->
            <label for="password">Password</label>
            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" required>
            <div id="password-condition">
                <h4>Password must contain the following:</h4>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
            </div>
            <input type="submit" value="Submit" id="submit" disabled>
    </div>
    <a href="./login.php">back to login</a>


    <script>
        var user_password = document.getElementById('password');
        var letter = document.getElementById('letter');
        var capital = document.getElementById('capital');
        var number = document.getElementById('number');
        var submit_button = document.getElementById('submit');

        // click password field, to show messag box
        user_password.onfocus = function() {
            document.getElementById('password-condition').style.display = 'block';
        }

        // click outside password field, to disable message box
        user_password.onblur = function() {
            document.getElementById('password-condition').style.display = 'none';
        }

        user_password.onkeyup = function() {
            // validate lower case
            var lowercase_regex = /[a-z]/g;
            if (user_password.value.match(lowercase_regex)) {
                letter.classList.remove('invalid');
                letter.classList.add('valid')
            } else {
                letter.classList.remove('valid');
                letter.classList.add('invalid')
            }

            // validate uppper case
            var uppercase_regex = /[A-Z]/g;
            if (user_password.value.match(uppercase_regex)) {
                capital.classList.remove('invalid');
                capital.classList.add('valid');
            } else {
                capital.classList.remove('valid');
                capital.classList.add('invalid')
            }
            // validate number
            var number_regex = /[0-9]/g;
            if (user_password.value.match(number_regex)) {
                number.classList.remove('invalid');
                number.classList.add('valid');
            } else {
                number.classList.remove('valid');
                number.classList.add('invalid');
            }

            if (letter.className == 'valid' && capital.className == 'valid' && number.className == 'valid') {
                submit_button.disabled = false;
            } else {
                submit_button.disabled = true;
            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>