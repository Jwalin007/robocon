<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/register.css">
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
                <h2>REGISTER</h2>	
                <form  method="post" action="register.php">
                <?php include('error.php'); ?>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username : </label>
                <input type="text" id="user" name="user"/>
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : </label>
                <input type="text" id="email" name="email"/>
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password : </label>
                <input type="password" id="pass1" name="pass1"/>
                <br>
                <label>Re-type Password : </label>
                <input type="password" id="pass2" name="pass2"/>
                <br>
                <button type ="submit" id="reg_button" name="reg">Submit</button><br><br>
                <a id="signup" href="login.php">Already registered? Login Now!</a>
                </form>
            </center>
        </div>
    </body>
</html>