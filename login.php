<?php

    include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aninaw | Login</title>
</head>
<body>
    <div class="form-container">

        <div class="form-header">
            <h2>Login</h2>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

            <?php include('errors.php'); ?>

            <!-- Nilagay ko sa individual <div> yung bawat input para meron silang
                new lines sa pagitan nila // Pakibago nalang as you see fit-->

            <div>
                <label for="email">Email Address</label>
                <input type="email" name="email" id="" value="<?php echo htmlspecialchars($email); ?>">
            </div>            

            <div>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="">
            </div>

            <input type="submit" value="Login" name="login_user">

            <p>Not a user? <a href="registration.php"><b>Register</b></a></p>

        </form>
    </div>
</body>
</html>