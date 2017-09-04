<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/advance_slip.css">
    </head> 
    <body>
        <script>
            window.onload = print();
        </script>
        <img src="../doc/2.jpg">
        <img src="../doc/tick.png" id="tick">
        <p id = "date">
            <?php
                // Return date/time info of a timestamp; then format the output
                $mydate=getdate(date("U"));
                echo "$mydate[mday] $mydate[month] , $mydate[year]";
            ?>
        </p>
        <p id = "faculty">
            <?php if(isset($_SESSION['faculty_adv'])): ?>
            <?php echo $_SESSION['faculty_adv']; ?>
            <?php endif?>
        </p>
        <p id = "purchase">Material Purchase for Robocon Project</p>
        <p id = "department">Robocon</p>
        <p id = "ma">
           15000
        </p>
        <p id = "mw">
            Fifteen Thousand Rupees Only
        </p>
    </body>
</html>