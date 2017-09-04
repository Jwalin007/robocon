<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/view.css">
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
        <br><br><br>
        <center>
        <form method="post" action="view.php" id="viewbillform">
        <select name="fil" form="viewbillform">
            <option value="1">All</option>
            <option value="2">Pending</option>
            <option value="3">Submitted</option>
            <option value="4">Cash</option>
            <option value="5">Cheque</option>
            <option value="6">Online</option>
            <option value="7">PO</option>
        </select>
        <button type="submit" name="filter" id="filter_button">Filter</button>
        <br><br>
        <input type="text" placeholder="Enter name of supplier" name="search_field" id="search_field"/>
        <button type="submit" name="search" id="search_button">Search</button>
        </form>
        <form method="post" action="view.php" id="savebillform">
        <div id="bar">
            
            <table>
            <tr>
                <th>Document ID&nbsp;</th>
                <th>&nbsp;Name Of Supplier&nbsp;</th>
                <th>&nbsp;List Of Items&nbsp;</th>
                <th>&nbsp;Bill No.&nbsp;</th>
                <th>&nbsp;Bill Date&nbsp;</th>
                <th>&nbsp;Tin No.&nbsp;</th>
                <th>&nbsp;Amount&nbsp;</th>
                <th>&nbsp;Item Type&nbsp;</th>
                <th>&nbsp;Purchased By&nbsp;</th>
                <th>&nbsp;Gate Entry&nbsp;</th>
                <th>&nbsp;Category&nbsp;</th>
                <th>&nbsp;Payment Mode&nbsp;</th>
                <th>&nbsp;Bill Status&nbsp;</th>
            </tr>
            <?php
            $result = mysqli_query($db, $getdata);
            $num = (int)mysqli_num_rows($result);
            $_SESSION['num'] = $num;
            for($i=0;$i<$num;$i++)
            {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                for($j=0;$j<count($row);$j++)
                {   
                    if($j!=count($row)-2)
                    {
                        if($_SESSION['privilege']=='admin')
                        {
                            echo "<td><input type='text' value='$row[$j]' name='$i$j'>&nbsp;"; 
                            echo "&nbsp;</input></td>";
                        }
                        elseif($_SESSION['privilege']=='student')
                        {
                            echo "<td>&nbsp;";
                            echo $row[$j];
                            echo "&nbsp;</td>";
                        }
                        
                    }
                }
                echo "</tr>";
            } 
            ?>
            </table>
        </div>	
        <br><br>
        <?php if($_SESSION['privilege']=='admin'):?>
            <button type="submit" name="save" id="save_button">Save changes</button>
        <?php endif ?>
        </form>
        </center>
    </body>
</html>