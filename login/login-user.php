<?php require_once "controll-user-data.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-4 offset-md-4 form login form">
            <form action="login-user.php" method="post">
            <h2>Login Form</h2>

            <?php
            if (count($errors) > 0) {
                ?>
                <div class="alert alert-danger text-center">
                    <?php
                    foreach ($errors as $showerror) {
                        echo $showerror;
                    }
                    ?>
                </div>
                <?php
            }
            ?>


                <div class="mb-3">
                    <label for="email" id="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Check me out</label>
                </div>
                <div class="link forget-password text-left">
                    <a href="forget-password.php">Forget password?</a>
                </div>
                <button type="submit" class="btn btn-primary" name="login" value="login" style="width: 100%;">Login</button>

                <div class="link login-link text-center">
                    Not yet a member?
                    <a href="sign-up.php">Signup Now</a>
                </div>
            </form>
            </div>
        </div>
    </div>

</body>

</html>