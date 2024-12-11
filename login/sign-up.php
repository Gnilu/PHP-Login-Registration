<?php require_once "controll-user-data.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Signup</title>
</head>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-4 offset-md-4 form login form">
                <form action="login-user.php" method="post" autocomplete="">
                    <h2>Signup Form</h2>
                    <?php
                    if (count($errors) == 1) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    } elseif (count($errors) > 1) {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($errors as $showerror) {
                                ?>

                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>

                        <?php
                    }
                    ?>

                    <div class="mb-3">
                        <label for="name" id="form-label">Full name</label>
                        <input type="name" class="form-control" id="name" name="name" required value="<?php echo $name; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" id="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value="<?php echo $email; ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Conform password</label>
                        <input type="password" class="form-control" id="cPassword" name="cpassword" required>
                    </div>
                    <!-- <div class="mb-3">
                        <h6>Gender:</h6>
                        <label for="male">Male:</label>
                        <input type="radio" name="gender" value="Male" id="male" required><br>
                        <label for="female">Female:</label>
                        <input type="radio" name="gender" value="Female" id="female" required>
                    </div> -->

                    <button type="submit" class="btn btn-primary" name="signup" value="signup" style="width: 100%;">Register</button>

                    <div class="link login-link text-center">
                        Already a member?
                        <a href="login-user.php">Login Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>