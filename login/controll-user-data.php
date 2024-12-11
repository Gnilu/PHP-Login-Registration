<?php
//Session starting
session_start();
//include database connection
require "connection.php";
$email = "";
$name = "";
$errors = array();

//If user signup button
if (isset($_POST['signup'])) {
    //retrieve user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    //Check password match
    if ($password !== $cpassword) {
        $errors['cpassword'] = "Conform password not matched!";
    }

    //Check email existence
    $email_check = "SELECT * FROM user_table WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exists!";
    }

    //proceed if no errors
    if (count($errors) === 0) {

        //Encrypt the password
        $encpass = password_hash($password, PASSWORD_BCRYPT);

        //Generate verfication code
        $code = rand(999999, 111111);

        //set account status
        $status = "notverified";

        //Insert data into database
        $insert_data = "INSERT INTO user_table (name, email, password, code, status) VALUES ('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);
        if ($data_check) {
            //Send verification email
            $subject = "Email Verification Code";
            $message = "Your Verification code is $code";
            $sender = "Form: gayani2000nilushi@gmail.com";

            //Send email
            if (mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:user-otp.php');
                exit();
            } else {
                //Handle email failure
                $errors['otp-error'] = "Failed while sending code!";
            }

        }else {
            //Handle database insertion failure
            $errors['db-errors'] = "Failed while inserting data into database";
        }

    }
}
?>