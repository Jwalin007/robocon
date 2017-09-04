<?php
    session_start();
    $username = "";
    $email = "";
    $password1 = "";
    $password2 = "";
    $getdata = "SELECT * FROM billentry";
    $total="";
    $faculty_adj = "";
    $faculty_adv = "";
    $num = 0;
    $success = "";
    $errors = array();
    //connect to the database
    $db = mysqli_connect("localhost","root","robocon_admin","robocon");

    //if the register button clicked
    if(isset($_POST['reg']))
    {
        $username = mysql_real_escape_string($_POST['user']);
        $email = mysql_real_escape_string($_POST['email']);
        $password1 = mysql_real_escape_string($_POST['pass1']);
        $password2 = mysql_real_escape_string($_POST['pass2']);

        //ensure that all fields are filled
        if(empty($username))
        {
            array_push($errors,"The Username field is requied.");
        }
        if(empty($email))
        {
            array_push($errors,"The Email field is required (enter only before '@' i.e. Your roll no.)");
        }
        if(empty($password1))
        {
            array_push($errors,"The Password field is requied.");
        }
        if($password1 != $password2)
        {
            array_push($errors,"The two passwords do not match.");
        }

        //if no error then add user to database
        if(count($errors) == 0)
        {
            $password = md5($password1); //encrypt password
            $sql = "INSERT INTO register(username, email, password) VALUES('$username','$email','$password')";
            mysqli_query($db, $sql);
            header('location: ../src/home.html');
        }
    }


    //if the login button clicked
    if(isset($_POST['login']))
    {
        $username = mysql_real_escape_string($_POST['user']);
        $password = mysql_real_escape_string($_POST['pass']);

        //ensure that all fields are filled
        if(empty($username))
        {
            array_push($errors,"The Username field is requied.");
        }
        if(empty($password))
        {
            array_push($errors,"The Password field is requied.");
        }

        //if no error then fetch user to database
        if(count($errors) == 0)
        {
            $password = md5($password); //encrypt password
            $query1 = "SELECT * FROM faculty where fname = '$username' AND password = '$password'";
            $query2 = "SELECT * FROM members where sname = '$username' AND password = '$password'";
            $result1 = mysqli_query($db, $query1);
            $result2 = mysqli_query($db, $query2);
            if(mysqli_num_rows($result1)==1)
            {
                $_SESSION['privilege'] = "admin";
                $_SESSION['username'] = $username;
                header('location: ../src/functions1.php');
            }
            elseif(mysqli_num_rows($result2)==1)
            {
                $_SESSION['privilege'] = "student";
                $_SESSION['username'] = $username;
                header('location: ../src/functions2.php');
            }
            else
            {
                array_push($errors, "Wrong username/password");
            }
        }
    }

    
    //if the add button clicked
    if(isset($_POST['add']))
    {
        $docid = mysql_real_escape_string($_POST['docid']);
        $nos = mysql_real_escape_string($_POST['nos']);
        $loi = mysql_real_escape_string($_POST['loi']);
        $bno = mysql_real_escape_string($_POST['bno']);
        $bd = mysql_real_escape_string($_POST['bd']);
        $tno = mysql_real_escape_string($_POST['tno']);
        $amo = mysql_real_escape_string($_POST['amo']);
        $it = mysql_real_escape_string($_POST['it']);
        $pby = mysql_real_escape_string($_POST['pby']);
        $ged = mysql_real_escape_string($_POST['ged']);
        $ct = mysql_real_escape_string($_POST['ct']);
        $po = mysql_real_escape_string($_POST['po']);
        $bpo = mysql_real_escape_string($_POST['bpo']);
        $st = "p";
        $qry1 = "SELECT * FROM billentry where name_of_sup = '$nos' AND bill_no = '$bno'";
        $ans = mysqli_query($db, $qry1);
        if(mysqli_num_rows($ans)>=1)
        {
            array_push($errors, "Duplicate bill entry found, denied database access!");
        }
        else
        {
            $sql = "INSERT INTO billentry(doc_id,name_of_sup,list_of_items,bill_no,bill_date,
            tin_no,amount,item_type,purchase_by,gate_entry,category,payment,bill_pic,status) 
            VALUES('$docid','$nos','$loi','$bno','$bd','$tno','$amo','$it','$pby','$ged','$ct','$po','$bpo','$st')";
            mysqli_query($db, $sql);
            if($_SESSION['privilege']=='admin')
            {
                header('location: ../src/functions1.php');
            }
            elseif($_SESSION['privilege']=='student')
            {
                header('location: ../src/functions2.php');
            }
        }
    }

    //if the filter button clicked
    if(isset($_POST['filter']))
    {
        $choice = mysql_real_escape_string($_POST['fil']);     
        if($choice=="1")
        {
            $getdata = "SELECT * FROM billentry";
        }
        else if($choice=="2")
        {
            $getdata = "SELECT * FROM billentry where status='p'";
        }
        else if($choice=="3")
        {
            $getdata = "SELECT * FROM billentry where status='s'";
        }
        else if($choice=="4")
        {
            $getdata = "SELECT * FROM billentry where payment='Cash'";
        }
        else if($choice=="5")
        {
            $getdata = "SELECT * FROM billentry where payment='Cheque'";
        }
        else if($choice=="6")
        {
            $getdata = "SELECT * FROM billentry where payment='Online'";
        }
        else if($choice=="7")
        {
            $getdata = "SELECT * FROM billentry where payment='Against PO'";
        }
   }

    //if the save changes button clicked
    if(isset($_POST['save']))
    {
        $j0='0';$j1='1';$j2='2';$j3='3';$j4='4';$j5='5';$j6='6';$j7='7';$j8='8';$j9='9';$j10='10';$j11='11';$j13='13';
        for($i=0;$i<$_SESSION['num'];$i++)
        {
            $str0 = "$i$j0";
            $str1 = "$i$j1";
            $str2 = "$i$j2";
            $str3 = "$i$j3";
            $str4 = "$i$j4";
            $str5 = "$i$j5";
            $str6 = "$i$j6";
            $str7 = "$i$j7";
            $str8 = "$i$j8";
            $str9 = "$i$j9";
            $str10 = "$i$j10";
            $str11 = "$i$j11";
            $str13 = "$i$j13";
            $new_docid = (int)$_POST[$str0];
            $new_nos = mysql_real_escape_string($_POST[$str1]);
            $new_loi = mysql_real_escape_string($_POST[$str2]);
            $new_bno = mysql_real_escape_string($_POST[$str3]);
            $new_bd = mysql_real_escape_string($_POST[$str4]);
            $new_tno = (int)$_POST[$str5];
            $new_amo = (int)$_POST[$str6];
            $new_it = mysql_real_escape_string($_POST[$str7]);
            $new_pby = mysql_real_escape_string($_POST[$str8]);
            $new_ged = mysql_real_escape_string($_POST[$str9]);
            $new_ct = mysql_real_escape_string($_POST[$str10]);
            $new_po = mysql_real_escape_string($_POST[$str11]);
            $new_stat = mysql_real_escape_string($_POST[$str13]);
            $qry = "UPDATE billentry SET doc_id=$new_docid, name_of_sup='$new_nos', list_of_items='$new_loi', bill_no='$new_bno', bill_date='$new_bd', tin_no=$new_tno, amount=$new_amo, item_type='$new_it', purchase_by='$new_pby', gate_entry='$new_ged', category='$new_ct', payment='$new_po', status='$new_stat' where doc_id=$new_docid";
            $rs = mysqli_query($db, $qry);
        }
    }

    //if the save changes button clicked
    if(isset($_POST['save_account']))
    {
        $j0='0';$j1='1';$j2='2';$j3='3';$j4='4';$j5='5';$j6='6';$j7='7';
        for($i=0;$i<$_SESSION['num1'];$i++)
        {
            $sstr0 = "$i$j0";
            $sstr1 = "$i$j1";
            $sstr2 = "$i$j2";
            $sstr3 = "$i$j3";
            $sstr4 = "$i$j4";
            $sstr5 = "$i$j5";
            $sstr6 = "$i$j6";
            $sstr7 = "$i$j7";
            $new_sno = (int)$_POST[$sstr0];
            $new_apo = mysql_real_escape_string($_POST[$sstr1]);
            $new_aoa = (int)$_POST[$sstr2];
            $new_prp = mysql_real_escape_string($_POST[$sstr3]);
            $new_aro = mysql_real_escape_string($_POST[$sstr4]);
            $new_aa = mysql_real_escape_string($_POST[$sstr5]);
            $new_doa = mysql_real_escape_string($_POST[$sstr6]);
            $new_paa = mysql_real_escape_string($_POST[$sstr7]);
            $new_tadv = mysql_real_escape_string($_POST['tot_adv']);
            $new_tadj = mysql_real_escape_string($_POST['tot_adj']);
            $qry2 = "UPDATE accountmmc SET ser=$new_sno, advance_date='$new_apo', advance_amount=$new_aoa, purpose='$new_prp', received_date='$new_aro', adjusted_amount=$new_aa, adjusted_date='$new_doa', pending_advance=$new_paa, total_adv=$new_tadv, total_adj=$new_tadj where ser=$new_sno";
            $resu = mysqli_query($db, $qry2);
        }
    }
    
    //if the save changes button clicked
    if(isset($_POST['save_account1']))
    {
        $j0='0';$j1='1';$j2='2';$j3='3';$j4='4';$j5='5';$j6='6';$j7='7';
        for($i=0;$i<$_SESSION['num1'];$i++)
        {
            $sstr0 = "$i$j0";
            $sstr1 = "$i$j1";
            $sstr2 = "$i$j2";
            $sstr3 = "$i$j3";
            $sstr4 = "$i$j4";
            $sstr5 = "$i$j5";
            $sstr6 = "$i$j6";
            $sstr7 = "$i$j7";
            $new_sno = (int)$_POST[$sstr0];
            $new_apo = mysql_real_escape_string($_POST[$sstr1]);
            $new_aoa = (int)$_POST[$sstr2];
            $new_prp = mysql_real_escape_string($_POST[$sstr3]);
            $new_aro = mysql_real_escape_string($_POST[$sstr4]);
            $new_aa = mysql_real_escape_string($_POST[$sstr5]);
            $new_doa = mysql_real_escape_string($_POST[$sstr6]);
            $new_paa = mysql_real_escape_string($_POST[$sstr7]);
            $new_tadv = mysql_real_escape_string($_POST['tot_adv']);
            $new_tadj = mysql_real_escape_string($_POST['tot_adj']);
            $qry2 = "UPDATE accountam SET ser=$new_sno, advance_date='$new_apo', advance_amount=$new_aoa, purpose='$new_prp', received_date='$new_aro', adjusted_amount=$new_aa, adjusted_date='$new_doa', pending_advance=$new_paa, total_adv=$new_tadv, total_adj=$new_tadj where ser=$new_sno";
            $resu = mysqli_query($db, $qry2);
        }
    }

    //if the search button clicked
    if(isset($_POST['search']))
    {
        $search = mysql_real_escape_string($_POST['search_field']);     
        $getdata = "SELECT * FROM billentry where name_of_sup LIKE '%$search%'";
    }

    //if the generate adjustment slip button clicked
    if(isset($_POST['gadjs']))
    {
        $faculty_adj = mysql_real_escape_string($_POST['faculty_adj']);    
        $total = mysql_real_escape_string($_POST['tot']);    
        $total_words = mysql_real_escape_string($_POST['tot_words']);    
        $_SESSION['faculty_adj']= $faculty_adj; 
        $_SESSION['total_words']= $total_words; 
        $_SESSION['total']= $total;
        if($_SESSION['total']=="")
        {
            array_push($errors, "No bill selected! Can't Generate required document.");
        }
        else
        {
            header('location: ../src/print_adjustment_slip.php');
        }
    }

    //if the generate adjustment file button clicked
    if(isset($_POST['gadjf']))
    {    
        $data_num = $_POST['data_num'];    
        $_SESSION['data']= $data_num;
        if(empty($_SESSION['data']))
        {
            array_push($errors, "No bill selected! Can't Generate required document.");
        }
        else
        {
            header('location: ../src/print_adjustment_file.php');
        }
    }

    //if the generate advance slip button clicked
    if(isset($_POST['gadvs']))
    {
        $faculty_adv = mysql_real_escape_string($_POST['faculty_adv']);    
        $_SESSION['faculty_adv']= $faculty_adv; 
        header('location: ../src/print_advance_slip.php');
    }

    //if the generate advance file button clicked
    if(isset($_POST['gadvf']))
    { 
        $file_path = mysql_real_escape_string($_POST['afu']);    
        $_SESSION['file_path']= $file_path;    
        header('location: ../src/print_advance_file.php');
    }

    //if the send mail button clicked
    if(isset($_POST['sending']))
    {
        $headers = "From: no_reply\r\n";
        $to = "14bit021@nirmauni.ac.in";    
        $subject = "Student Query/Compliment!";
        $name = mysql_real_escape_string($_POST['nam']);
        $phone = mysql_real_escape_string($_POST['phn']);
        $comment = mysql_real_escape_string($_POST['comment']);    
        $comment = "Name : " + $name + "<br>" + "Phone : " + $phone + "<br><br><br>" + $comment; 
        $success = mail($to,$subject,$comment,$headers);
    }

?>