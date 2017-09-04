<?php include('server.php'); ?>

<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/account.css">
    </head>
    <body>
        <br>
        <?php if($_SESSION['privilege']=='admin'):?>
            <a id ="back" href="../src/functions1.php">BACK</a>
        <?php elseif($_SESSION['privilege']=='student'):?>
            <a id ="back" href="../src/functions2.php">BACK</a>
        <?php elseif(!isset($_SESSION['privilege'])):?>
             <?php header('location: ../src/login.php'); ?>
        <?php endif ?>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <hr><hr>
        <div id="details">
            <a id="acc_card" href="../src/mmc_account.php"><p id="card1">Mihir Chauhan</p></a>
            <a id="acc_card" href="../src/am_account.php"><p id="card2">Akash Mecwan</p></a>
        </div>
        <hr><hr>
    </body>
</html>