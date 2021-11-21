<?php
    session_start();

    $firstName = '';
    $lastName = '';
    $email = '';

    $errors = [];

    // connect to db
    include('config/db_connect.php');

    if(isset($_POST['register_user'])) {
        // register new users
        $firstName = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastName = mysqli_real_escape_string($db, $_POST['lastname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['pass']);
        $userType = $_POST['user_type'];
        $confirmPass = $_POST['confirm_pass'];

        // registration form validation
        if(empty($firstName)) { array_push($errors, 'first name is required.');}
        if(empty($lastName)) { array_push($errors, 'last name is required.');}
        if(empty($email)) { array_push($errors, 'email address is required.');}
        if(empty($password)) { array_push($errors, 'password is required.');}
        if(empty($confirmPass)) { array_push($errors, 'confirming password is required.');}
        if($password != $confirmPass) { array_push($errors, 'Passwords do not match.');}

            // check for existing email
        $check_email_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($db, $check_email_query);
        $fetched_email = mysqli_fetch_assoc($result);

        if($fetched_email['email'] == $email) {
            array_push($errors, 'a user with that email already exist.');
        }

        // register user if there is no error
        if(count($errors) == 0) {
            $password = md5($password);

            $query = "INSERT INTO users(firstname, lastname, email, pass_word, user_type) VALUES (
                    '$firstName', '$lastName', '$email', '$password', '$userType')";
            mysqli_query($db, $query);

            $_SESSION['email'] = $email;
            $_SESSION['firstName'] = $firstName;

            header("Location: index.php");
        }
    }    

    // login user
    if(isset($_POST['login_user'])) {
        $errors = [];
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['pass']);

        if(empty($email)) { array_push($errors, 'Email is required.');}
        if(empty($password)) { array_push($errors, 'Password is required.');}

        if(count($errors) == 0) {
            $password = md5($password);
            // LAST PART EDITED
            $query = "SELECT * FROM users WHERE email = '$email' AND pass_word = '$password'";
            $results = mysqli_query($db, $query);

            if(mysqli_num_rows($results)) {
                $sessionName = mysqli_fetch_assoc($results);
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $sessionName['firstname'];

                header("Location: index.php");
            } else {
                array_push($errors, 'Wrong Email and Password Combination.');
            }
        }
    }
?>