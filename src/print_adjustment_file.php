<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/adjustment_file.css">
    </head> 
    <body>
        <script>
            window.onload = print();
        </script>
        <center>
        <table border=1>
         <tr>
                <th>Sr. No.&nbsp;</th>
                <th>&nbsp;Name Of Supplier&nbsp;</th>
                <th>&nbsp;List Of Items&nbsp;</th>
                <th>&nbsp;Bill No.&nbsp;</th>
                <th>&nbsp;Bill Date&nbsp;</th>
                <th>&nbsp;Tin No.&nbsp;</th>
                <th>&nbsp;Amount&nbsp;</th>
        </tr>
            <?php
                $getdata = "SELECT doc_id, name_of_sup, list_of_items, bill_no, bill_date, tin_no, amount FROM billentry where amount<=3000 AND status='p' AND payment='Cash'";
                $result = mysqli_query($db, $getdata);
                $num = mysqli_num_rows($result);
                $t=1;
                for($i=0;$i<$num;$i++)
                {
                    $row = mysqli_fetch_row($result);
                    if($_SESSION['data'][2*$i]=='1')
                    {
                        $id = (int)$row[0];
                        $qry = "UPDATE billentry SET status='s' where doc_id=$id";
                        $rs = mysqli_query($db, $qry);
                        echo "<tr>";
                        echo "<td>$t</td>";
                        for($j=1;$j<count($row);$j++)
                        {
                            echo "<td>&nbsp;";
                            echo $row[$j];
                            echo "&nbsp;</td>";
                        }
                        $t=$t+1;
                        echo "</tr>";
                    } 
                }
            ?>
        </table>
        </center>
        </body>
</html>