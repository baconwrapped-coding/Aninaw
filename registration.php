<?php

    include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aninaw | Register</title>
</head>
<body>
    <div class="form-container">

        <div class="form-header">
            <h2>Register</h2>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

            <?php include('errors.php'); ?>

            <!-- Nilagay ko sa individual <div> yung bawat input para meron silang
                new lines sa pagitan nila // Pakibago nalang as you see fit-->
            <div>
                <label for="firstname">First Name </label>
                <input type="text" name="firstname" id="" value="<?php echo htmlspecialchars($firstName); ?>">
            </div>
            
            <div>
                <label for="lastname">Last Name </label>
                <input type="text" name="lastname" id="" value="<?php echo htmlspecialchars($lastName); ?>">
            </div>

            <div>
                <label for="email">Email Address</label>
                <input type="email" name="email" id="" value="<?php echo htmlspecialchars($email); ?>">
            </div>            

            <div>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="">
            </div>

            <div>
                <label for="confirm-pass">Confirm Password</label>
                <input type="password" name="confirm_pass" id="">
            </div>

            <input type="hidden" name="user_type" value="2">
            <input type="submit" value="Sign-Up" name="register_user">

            <p>Already a user? <a href="login.php"><b>Log In</b></a></p>

        </form>
    </div>
</body>
</html>