<?php
    session_start();

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
    }

    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        unset($_SESSION['firstName']);
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aninaw</title>
</head>
<body>
    <h1>ANINAW: Citizen City Management, Complaint, And Recommendation System</h1>
    <?php if(isset($_SESSION['firstName'])): ?>

    <h3>Welcome <strong><?php echo $_SESSION['firstName']; ?></strong></h3>

    <button ><a href="index.php?logout=1">Sign Out</a></button>
    

    <?php endif ?>
</body>
</html>