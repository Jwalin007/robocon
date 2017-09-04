<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/am_account.css">
    </head>
    <body>
        <br>
        <?php if($_SESSION['privilege']=='admin'):?>
            <a id ="back" href="../src/functions1.php">BACK</a>
        <?php elseif($_SESSION['privilege']=='student'):?>
             <?php header('location: ../src/login.php'); ?>    
        <?php elseif(!isset($_SESSION['privilege'])):?>
             <?php header('location: ../src/login.php'); ?>    
        <?php endif ?>
        <br><br><br>
        <center>
        <form method="post" action="am_account.php" id="saveaccountform">
            <div id="bar">
            <table>
            <tr>
                <th>Serial No.&nbsp;</th>
                <th>&nbsp;Advance passed On&nbsp;</th>
                <th>&nbsp;Amount Of Advance&nbsp;</th>
                <th>&nbsp;Purpose&nbsp;</th>
                <th>&nbsp;Advance Received On&nbsp;</th>
                <th>&nbsp;Adjusted Amount&nbsp;</th>
                <th>&nbsp;Date Of Adjustment&nbsp;</th>
                <th>&nbsp;Pending Advance Amount&nbsp;</th>
            </tr>
            <?php
            $get_data = "SELECT * FROM accountam";
            $result1 = mysqli_query($db, $get_data);
            $num1 = (int)mysqli_num_rows($result1);
            $_SESSION['num1']=$num1;
            for($i=0;$i<$num1;$i++)
            {
                $row = mysqli_fetch_row($result1);
                echo "<tr>";    
                for($j=0;$j<count($row)-2;$j++)
                {   
                    echo "<td><input type='text' value='$row[$j]' name='$i$j'>&nbsp;"; 
                    echo "&nbsp;</input></td>";
                }
                echo "</tr>";
            } 
            ?>
            </table>
        </div>	            
        <div id="down">
            <label>Total Advance : </label>
            <input type="text" id="tot_adv" name ="tot_adv" value="<?php echo $row[8]?>" form="saveaccountform">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Total Adjustment : </label>
            <input type="text" id="tot_adj" name ="tot_adj" value="<?php echo $row[9]?>" form="saveaccountform">
        </div>
        <br><br>
        <button type="submit" name="save_account1" id="save_but">Save changes</button>
        </form> 
        </center>
    </body>
</html>