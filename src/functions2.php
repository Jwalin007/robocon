<?php include('server.php'); ?>

<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/functions2.css">
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
        <div id="cf">
            <a id="acard1" href="../src/entry.php"><p id="card1">NEW BILL ENTRY</p></a>
            <a id="acard2" href="../src/view.php"><p id="card2">VIEW BILLS</p></a>
        </div>
    </body>
</html>