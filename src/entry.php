<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/entry.css">
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
        <br>
        <div id="bar">
            <?php include('error.php'); ?>
            <form  method="post" action="entry.php" id="billform">
                    <br><br>
                    <center>
                    <table >
                    <tr>
                        <td><b>Name of supplier : </b></td>
                        <td><input type="text" id="nos" name="nos"/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>List Of Items : </b></td>
                        <td><textarea  id="loi" name="loi" rows="10" cols="50" form="billform"></textarea></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>Bill No : </b></td>
                        <td><input type="text" id="bno" name="bno" required/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>Bill Date : </b></td>
                        <td><input type="date" id="bd" name="bd" required/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>Tin No : </b></td>
                        <td><input type="number" id="tno" name="tno"/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>Amount : </b></td>
                        <td><input type="number" id="amo" name="amo"/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>Item Type : </b></td>
                        <td>
                        <input type="radio" name="it" value="Job Work">Job Work<br>
                        <input type="radio" name="it" value="Consumables">Consumables<br>
                        <input type="radio" name="it" value="Dead Stock">Dead Stock<br>
                        <input type="radio" name="it" value="Others">Others
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr> 
                        <td><b>Purchased By : </b></td>
                        <td><input type="text" id="pby" name="pby"/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>                
                        <td><b>Gate Entry Date : </b></td>
                        <td><input type="date" id="ged" name="ged"/></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>                
                        <td><b>Category : </b></td>
                        <td>
                            <input type="radio" name="ct" value="Mechanical">Mechanical<br>
                            <input type="radio" name="ct" value="Electronics">Electronics<br>
                            <input type="radio" name="ct" value="Others">Others<br>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><b>Payment Options : </b></td>
                        <td>    
                            <input type="radio" name="po" value="Cash">Cash<br>
                            <input type="radio" name="po" value="Cheque">Cheque<br>
                            <input type="radio" name="po" value="Online">Online<br>
                            <input type="radio" name="po" value="Against PO">Against PO<br>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>                
                        <td><b>Upload bill photo : </b></td>
                        <td><input type="file" name="bpu" value="img"></td>
                    </tr>
                    </table>
                    </center>
                    <br><br>
                    <button type ="submit" id="add_button" name="add">Add To Database</button><br><br>
            </form>
		</div>	
    </body>
</html>