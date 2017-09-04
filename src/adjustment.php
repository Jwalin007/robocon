<?php include('server.php'); ?>
<html>
	<head>
    <!-- HEADER PART -->
		<title>ROBOCON WEB APP</title>
        <link rel="stylesheet" type="text/css" href="../css/adjustment.css">
    </head> 
    <body>
        <script>
            function totalit() 
            {
                var input = document.getElementsByName("amt");
                var total = 0;
                var cnt = 0;
                for (var i = 0; i < input.length; i++) 
                {
                    if (input[i].checked) 
                    {
                        cnt++;
                        total += parseInt(input[i].value);
                    }
                }
                var chc = new Array(cnt);
                for (var i = 0; i < input.length; i++) 
                {
                    if (input[i].checked) 
                    {
                        chc[i] = 1;
                        
                    }
                    else
                    {
                        chc[i] = 0;
                    }
                }
                var lop = total.toString();
                lop = lop.length;
                var tempt = parseInt(total);
                var num = new Array(lop);
                var temp,anstr="";
                var zero = [0,0,0,0];
                var ons = [" One"," Two"," Three"," Four"," Five"," Six"," Seven"," Eight"," Nine"];
                var tes = [" Eleven"," Twelve"," Thirteen"," Fourteen"," Fifteen"," Sixteen"," Seventeen"," Eighteen"," Nineteen"];
                var tis = [" Ten"," Twenty"," Thirty"," Fourty"," Fifty"," Sixty"," Seventy", " Eighty"," Ninety"];
                var hd = " Hundred";
                var th = " Thousand";
                for(var i=0;i<lop;i++)
                {
                    temp = tempt % 10;                  
                    num[i] = temp;
                    if(num[i]==0)
                    {
                        zero[i] = 1;
                    }
                    else
                    {
                        if(i==0)
                        {
                            anstr = ons[num[i]-1];
                        }
                        if(i==1)
                        {
                            if(zero[0]==1)
                            {
                                anstr = tis[num[i]-1];
                            }
                            else
                            {
                                if(num[i]==1)
                                {
                                    anstr = tes[num[i-1]-1];
                                }
                                else
                                {
                                    anstr = tis[num[i]-1] + anstr;
                                }
                            }
                        }
                        if(i==2)
                        {
                            anstr = ons[num[i]-1] + hd + anstr;
                        }
                        if(i==3)
                        {
                            anstr = ons[num[i]-1] + th + anstr;
                        }
                    }
                    tempt = parseInt(tempt/10); 
                }
                for(i=0;i<cnt;i++)
                {   
                    document.getElementById("data_num").value = chc;
                }
                document.getElementById("tot_words").value = anstr + " only";
                document.getElementById("tot").value = "Rs." + total.toFixed(2);
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
        <?php include('error.php'); ?>  
        <br><br><br>
        <form  method="post" action="adjustment.php" id="adjustmentform">
            <div id="up">
                <br>
                    <label>Faculty name against the adjustment: </label>
                        <select name="faculty_adj" form="adjustmentform">
                            <option value="Dr. Mihir Chauhan">Mihir Chauhan</option>
                            <option value="Prof. Akash Mecwan">Akash Mecwan</option>
                        </select>
                    <br><br>
                    <button type="submit" id="adjs_button" name="gadjs">Generate Adjustment Slip</button>
                    <button type="submit" id="adj_button" name="gadjf">Generate Adjustment File</button><br><br> 
            </div>
            <div id="down">
                <div id="hide">
                    <input type="text" id="tot_words" name ="tot_words" form="adjustmentform">
                    <input type="text" id="data_num" name ="data_num" form="adjustmentform">
                </div>
                TOTAL AMOUNT : <input type="text" id="tot" name ="tot" form="adjustmentform">
            </div>
        </form>   
        <div id="bar">
            <center>
            <table>
            <tr>
                <th>Select</th>
                <th>Document ID&nbsp;</th>
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
                for($i=0;$i<$num;$i++)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    $amount = $row[6];
                    echo "<td><input type='checkbox' name='amt' value='$amount' onclick='totalit()'/></td>";
                    for($j=0;$j<count($row);$j++)
                    {
                        echo "<td>&nbsp;";
                        echo $row[$j];
                        echo "&nbsp;</td>";
                    }
                    echo "</tr>";
                } 
            ?>
            </table>
            </center>
        </div>	
    </body>
</html>