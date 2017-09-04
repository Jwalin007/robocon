<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/adjustment_slip.css">
    </head> 
    <body>
        <script>
            window.onload = print();
        </script>
        <img src="../doc/1.jpg">
        <p id = "date">
            <?php
                // Return date/time info of a timestamp; then format the output
                $mydate=getdate(date("U"));
                echo "$mydate[mday] $mydate[month] , $mydate[year]";
            ?>
        </p>
        <p id = "faculty">
            <?php if(isset($_SESSION['faculty_adj'])): ?>
            <?php echo $_SESSION['faculty_adj']; ?>
            <?php endif?>
        </p>
        <p id = "purchase">Material Purchase for Robocon Project</p>
        <p id = "ma">
            <?php if(isset($_SESSION['total'])): ?>
            <?php echo $_SESSION['total']; ?>
            <?php endif?>
        </p>
        <p id = "ma1">
            <?php if(isset($_SESSION['total'])): ?>
            <?php echo $_SESSION['total']; ?>
            <?php endif?>
        </p>
        <p id = "mw">
            <?php if(isset($_SESSION['total_words'])): ?>
            <?php echo $_SESSION['total_words']; ?>
            <?php endif?>
        </p>
    </body>
</html>