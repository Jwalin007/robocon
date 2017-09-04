<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/advance.css">
    </head>
    <body>
        <script>
            function gf()
            {
            }

            function pf() 
            {
                window.print();
            }
        </script>           
        <br>
        <?php if($_SESSION['privilege']=='admin'):?>
            <a id ="back" href="../src/functions1.php">BACK</a>
        <?php elseif($_SESSION['privilege']=='student'):?>
            <a id ="back" href="../src/functions2.php">BACK</a>
        <?php elseif(!isset($_SESSION['privilege'])):?>
             <?php header('location: ../src/login.php'); ?>
        <?php endif ?>
        <br>
        <div id="bar">
            <form  method="post" action="advance.php" id="advanceform">
                    <br><br><br><br>
                    <label>Issung faculty name : </label>
                        <select name="faculty_adv" form="advanceform">
                            <option value="Prof. Mihir Chauhan">Mihir Chauhan</option>
                            <option value="Prof. Akash Mecwan">Akash Mecwan</option>
                        </select>
                    <br><br>
                    <button type="submit" id="advs_button" name="gadvs">Generate Advance Slip</button>
            </form>
		</div>	
    </body>
</html>