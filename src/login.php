<?php include('server.php');?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
				<link rel="stylesheet" type="text/css" href="../css/login.css">
				<script src='https://www.google.com/recaptcha/api.js'></script>
		</head>
    <body>
        <div id="menu-bar">
			<a href="http://www.nirmauni.ac.in/ITNU" target="_blank"><img src="../images/logo.jpg" id="nirmalogo"></a>
            <a href="../src/home.html"><li id="home"><b>Home</b></li></a>
            <a href="../src/team_nirma.php"><li id="team_nirma"><b>Team Nirma</b></li></a>
            <a href="../src/about_us.php"><li id = "about_us"><b>About Us</b></li></a>
			<a href="../src/contact_us.php"><li id="contact_us"><b>Contact Us</b></li></a>
            <img src="../images/Logo_black.png" id="roboconlogo">
		</div>
        <div id="login_box">
            <center>
                <h2>LOGIN</h2>
                <?php include('error.php'); ?>
                <form  method="post" action="login.php">
                    <input type="text" id="user" name="user" placeholder="Email/Username"/>
                    <br><br>
                    <input type="password" id="pass" name="pass" placeholder="Password"/>
                    <br>
										<div class="g-recaptcha" data-sitekey="6LdhPi8UAAAAAGdDcQpxNk5L4cq4SFdBNoF9sx4C"></div>
										<br>
                    <button type ="submit" id="login_button" name="login">GO</button><br><br>
                    <a id="signup" href="register.php">Not a member? Join Robocon Now!</a>
                </form>
            </center>
        </div>
    </body>
</html>
