<?php include('server.php'); ?>

<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/functions1.css">
    </head>
    <body>
        <div id="menu-bar">
			<a href="http://www.nirmauni.ac.in/ITNU" target="_blank"><img src="../images/logo.jpg" id="nirmalogo"></a>
            <a href="../src/home.html"><li id="home"><b>Home</b></li></a>
            <a href="../src/team_nirma.php"><li id="team_nirma"><b>Team Nirma</b></li></a>
            <a href="../src/about_us.php"><li id = "about_us"><b>About Us</b></li></a>
			<a href="../src/contact_us.php"><li id="contact_us"><b>Contact Us</b></li></a>
            <?php if(isset($_SESSION['username'])): ?>
            <p id = "log_dis" >Welcome, <font color="white"><b><?php echo $_SESSION['username']; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a id = "logout" href="../src/home.html?logout='1'">Logout</a>
            </p>    
            <?php else:
                header('location: ../src/login.php');
            ?>
            <?php endif?>
            <img src="../images/Logo_black.png" id="roboconlogo">
		</div>	
        <div id="details">
            <?php
            $getdata = "SELECT * FROM budget";
            $query =  mysqli_query($db, $getdata);
            $row = mysqli_fetch_array($query);
            ?>
            <div id="q1"> 
                <p>Budget Sanction : <b><?php echo $row['sanction']; ?></b></p>
                <p>Additional Sanction : <b><?php echo $row['additional']; ?></b></p>
                <p>Credit From External Sources : <b><?php echo $row['credit']; ?></b></p>
                <p>Cash Purchase Amount : <b><?php echo $row['cashpurchase']; ?></b></p>
            </div>
            <div id="q2">
                <p>Direct Payment To Party : <b><?php echo $row['directpay']; ?></b></p>
                <p>Pending Payments/Adjustments : <b><?php echo $row['pending']; ?></b></p>
                <p>Amount Utilised : <b><?php echo $row['amountused']; ?></b></p>
                <p>Balance : <b><?php echo $row['balance']; ?></b></p>
            </div>
        </div>
        <div id="cf">
            <a id="acard1" href="../src/entry.php"><p id="card1">NEW BILL ENTRY</p></a>
            <a id="acard2" href="../src/view.php"><p id="card2">VIEW BILLS</p></a>
            <a id="acard3" href="../src/advance.php"><p id="card3">ADVANCE</p></a>
            <a id="acard4" href="../src/adjustment.php"><p id="card4">ADJUSTMENT</p></a>
            <a id="acard5" href="../src/account.php"><p id="card5">ACCOUNT</p></a>
        </div>
    </body>
</html>