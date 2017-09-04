<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/contact_us.css">
    </head>
    <body>
    <br>
        <a id ="back" href="../src/home.html">BACK</a>
        <br>
        <br>
        <div id="info1">
            <marquee><h2 id="head1">Happy to help you out! Leave us a query or compliment.</h2></marquee>
        </div>
        <div id="info2">
        <?php include('error.php'); ?>
            <?php 
                if(isset($success) && $success)
                {
                    array_push($errors, "Mail sent successfully!!");
                }
                else
                {
                    array_push($errors, "Failed to send the mail!!");
                }
            ?>
            <form action="contact_us.php" method="post" id="contactform">
                <table align="center">
                <tr>
                    <td><b>Name</b></td>
                    <td>:</td>
                    <td><input type="text" name="nam"></td>
                </tr>
                <tr>
                    <td><b>Phone no.</b></td>
                    <td>:</td>
                    <td><input type="text" name="phn"></td>
                </tr>
                <tr>
                    <td><b>Comment</b></td>
                    <td>:</td>
                    <td><textarea name="comment" rows="10" cols="50" form="contactform"></textarea></td>
                </tr>
                </table>
                <br>
                <button type="submit" name="sending">Send</button>
                <input type="reset" value="Reset">
            </form>
        </div>
    </body>
</html>