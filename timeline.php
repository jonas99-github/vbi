<!DOCTYPE html>
<html>
<head><title>Profile</title>
<?php include ("header.php");
$emp_no=$_GET['emp_no'];
$sql="SELECT *FROM empl_tbl WHERE empl_no='$emp_no'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$emp_fname = $row['empl_firstname'];
$emp_middlename = $row['middlename'];
$empl_lastname = $row['empl_lastname'];
$position=$_SESSION['SESS_ROLE'];
?>
</style>
</head>
<body>
  <?php
  if($position=='HR Generalist'){
  ?>
  <div class="first-header">
         <ul>
    <a href="search.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
      <li>
        <div id="searchdiv-form" style="float:left;margin-top:-1px;margin-left:16px;">
          <section style="float:left;">
        <form id="search-form" action="search-emp-session.php" method="POST" class="">
        <input type="text" id="search-input" name="q" style="border-radius: 5px;" class="class-form" placeholder="Search employee" value="<?php  echo isset($_GET['q']) ? $_GET['q'] : null; ?>">
        <input type="submit" name="submit-button" value="Search" class="btn btn-info" style="width:80px;">
      </form>
    </section>
    <?php
    if(isset($a)){
      ?>
    <section style="float:left;">
      <form id="clear-search" action="search.php" method="POST">
        <input type="submit" name="submit" style="margin-left:3px;" value="Clear search" class="btn btn-danger">
      </form>
    </section>
    <?php
  }
   ?>
    </div>
      </li>
    <li><a href="search.php">Employees</a></li>
    <?php
     if($position=='HR and Admin Manager' || $position=='HR Generalist'){
      ?>
    <li><a href="manage_empl.php">Manage Employee</a></li>
    <?php
  }
     if($position=='HR and Admin Manager'){
      ?>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <?php
  }
  ?>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <?php
          if($position=='HR and Admin Manager'){
           ?>
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <?php
        }
        ?>
         <a href="" style="color:black;">Help</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
    <?php
        }
if($position=='Admin Staff'){
          ?>
          <div class="first-header-astaff">
            <ul>
              <li><a href="equip_assign.php">Equipment Assignments</a><li>
              <li><a href="equipment.php?section=">Equipment Inventory</a></li>
          <li><a href="">Activity Log</a><li>
          <li style="float:right"><a href="logout.php">LOGOUT</a></li>
          <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'];?></li>
          </ul>
          </div>
        <?php }
         if($position=='IT Admin'){
         ?>
                   <div class="first-header">
         <ul>
    <a href="dashboard.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
    <li>
         <div id="searchdiv-form" style="float:left;margin-top:-1px;margin-left:16px;">
           <section style="float:left;">
         <form id="search-form" action="search-dashboard.php" method="POST" class="">
         <input type="text" id="search-input" name="q" style="border-radius: 5px;" class="class-form" placeholder="Search employee" value="<?php  echo isset($_GET['q']) ? $_GET['q'] : null; ?>">
         <input type="submit" name="submit-button" value="Search" class="btn btn-info" style="width:80px;font-size:12px;">
       </form>
     </section>
     <?php
     if(isset($a)){
       ?>
     <section style="float:left;">
       <form id="clear-search" action="dashboard.php" method="POST">
         <input type="submit" name="submit" style="margin-left:3px;font-size:12px;" value="Clear search" class="btn btn-danger">
       </form>
     </section>
     <?php
   }
    ?>
     </div>
       </li>
    <li><a href="dashboard.php">Employees</a></li>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <li><a href="reorder.php">Make Reorder Request</a></li>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <a href="" style="color:black;">Help</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
  <?php }
    if($position=='HR and Admin Manager'){
                            ?>
                         <div class="first-header">
         <ul>
    <a href="search.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
      <li>
        <div id="searchdiv-form" style="float:left;margin-top:-1px;margin-left:16px;">
          <section style="float:left;">
        <form id="search-form" action="search-emp-session.php" method="POST" class="">
        <input type="text" id="search-input" name="q" style="border-radius: 5px;" class="class-form" placeholder="Search employee" value="<?php  echo isset($_GET['q']) ? $_GET['q'] : null; ?>">
        <input type="submit" name="submit-button" value="Search" class="btn btn-info" style="width:80px;">
      </form>
    </section>
    <?php
    if(isset($a)){
      ?>
    <section style="float:left;">
      <form id="clear-search" action="search.php" method="POST">
        <input type="submit" name="submit" style="margin-left:3px;" value="Clear search" class="btn btn-danger">
      </form>
    </section>
    <?php
  }
   ?>
    </div>
      </li>
    <li><a href="search.php">Employees</a></li>
    <?php
     if($position=='HR and Admin Manager' || $position=='HR Generalist'){
      ?>
    <li><a href="manage_empl.php">Manage Employee</a></li>
    <?php
  }
     if($position=='HR and Admin Manager'){
      ?>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <?php
  }
  ?>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <?php
          if($position=='HR and Admin Manager'){
           ?>
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <?php
        }
        ?>
         <a href="" style="color:black;">Help</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
                           <?php
                         }
                         ?>
          <div class="profile-nav">
            <ul>
              <?php
              if($position=='IT Admin'){
                ?>
            <li><a href="timeline.php?emp_no=<?php echo $_GET['emp_no']; ?>">Timeline</a></li>
            <li><a href="about.php?section=overview&action=&selaction=&emp_no=<?php echo $_GET['emp_no']; ?>">About</a></li>
            <?php
           }
            else{
              ?>
              <li><a href="timeline.php?emp_no=<?php echo $_GET['emp_no']; ?>&action=&selaction=">Timeline</a></li>
              <li><a href="about.php?section=overview&action=&selaction=&emp_no=<?php echo $_GET['emp_no']; ?>">About</a></li>
                <?php
            }
             ?>
            </ul>
            </div>
    <div style="background-color:#1abc9c;
    	margin-left:470px;
    	margin-top:28px;
    	width:609px;
    	border-top-left-radius: 3px;
    	border-top-right-radius: 3px;
    	position:absolute;
    	padding-bottom:0;">
    <h3>Timeline</h3>
        </div>

    <div class="profile-sidenav-timeline">
        <h1 style="text-align:center;font-size:18px;">PROFILE</h1>
      <img src="icon/person2.png" height="90" width="90" id="imgprof">
      <?php
      $sql4="SELECT*FROM empl_tbl WHERE empl_no='$emp_no'";
      $result4=$conn->query($sql4);
      $row4=$result4->fetch_assoc();
      $show_fname=$row4['empl_firstname'];
      $show_mname=$row4['middlename'];
      $show_lname=$row4['empl_lastname'];
      $pos=$row4['position'];
      $b=$row4['deploy'];
      $sql5="SELECT*FROM position WHERE pos_id='$pos'";
      $result5=$conn->query($sql5);
      $row5=$result5->fetch_assoc();
      $a=$row5['position'];
      $sql6="SELECT*FROM eq_inv WHERE empl_no='$emp_no'";
      $result6=$conn->query($sql6);
      $row6=$result6->fetch_assoc();
       ?>
        <center><h3><?php echo $show_fname; echo " ";echo  $show_mname; echo " "; echo $show_lname;?></h3></center>
            <span>Position: <strong><?php echo $a;?></strong></span><br><br>
            <span>Deployment: <strong><?php echo $b;?></strong></span><br><br>

 </div>
 <div style="	margin-top:80px;">
 <?php
 $sql2="SELECT * FROM transac_inv WHERE transac_empl='$emp_no' ORDER BY transac_uid DESC";
 $result2=mysqli_query($conn, $sql2);
 while($row2=mysqli_fetch_assoc($result2)){
   $emp= $row2['transac_empl'];
   $inv= $row2['transac_eqid'];
   ?>

 <div class="profile-div">
   <?php
   if ($row2['transac_type']=='Assigned an Equipment'){

   ?>
  Unique ID: <?php echo $row2['transac_uid'];?> <label style="float:right;"><?php echo $row2['transac_date'];?></label><br>
   <?php echo $row2['transac_pos'];?>
   <?php echo $row2['transac_type'];?> :

   <?php
   $sql4="SELECT * FROM eq_inv WHERE eq_inv_id='$inv'";
   $result4=mysqli_query($conn,$sql4);
   while($row4=mysqli_fetch_assoc($result4)){
     echo "<strong><a href='equipment.php?section=all&q=$inv'>" . $row4['eqdesc'] . "</a></strong>";
   }
   echo " to ";
   $sql3="SELECT * FROM empl_tbl WHERE empl_no='$emp'";
   $result3=mysqli_query($conn,$sql3);
   while($row3=mysqli_fetch_assoc($result3)){
    echo "<a href=''>". $row3['empl_firstname'] . " " . $row3['middlename'] . " ". $row3['empl_lastname'] . "</a>";
   }
   echo " ". $row2['transac_loc'];
   $sql7="SELECT * FROM eq_inv WHERE eq_inv_id = '$inv'";
   $result7=mysqli_query($conn,$sql7);
   while($row7=mysqli_fetch_assoc($result7)){
     $par=$row7['par'];
     echo " ". "<a href='viewpar.php?par=$par'>" . $row7['par'] . "</a>";
   }
 }

if ($row2['transac_type']=='Edited employee remark'){
  echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label><br>";
  $sql8="SELECT * FROM empl_tbl WHERE empl_no='$emp_no'";
  $result8=mysqli_query($conn,$sql8);
  while($row8=mysqli_fetch_assoc($result8)){
  echo $row2['transac_pos'] . " " . $row2['transac_type'] . " of " . " " . "<a href=''>".$row8['empl_firstname']." ".$row8['middlename']." ".$row8['empl_lastname']."</a>" . "</strong><br>";
  echo "Changes: " . "<strong>" . $row2['transac_remark'] . "</strong>";

  }
}
if($row2['transac_type']=='removed an equipment'){
  $sql9="SELECT * FROM empl_tbl WHERE empl_no='$emp_no'";
  $result9=mysqli_query($conn,$sql9);
  while($row9=mysqli_fetch_assoc($result9)){
    echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right'>" . $row2['transac_date'] . "</label>" . "<br>";
    echo $row2['transac_pos'] ." ". $row2['transac_type'] . " from ". "<a href=''>" . $row9['empl_firstname'] . " " . $row9['middlename'] . " " . $row9['empl_lastname'] . "</a>" . ": ";
    $invi=$row2['transac_eqid'];
    $sql10="SELECT * FROM eq_inv WHERE eq_inv_id='$invi'";
    $result10=mysqli_query($conn,$sql10);
    while($row10=mysqli_fetch_assoc($result10)){
      echo "<strong><a href='equipment.php?section=all&q=$invi'>" . $row10['eqdesc'] . "</a></strong>";
    }
}
}
if($row2['transac_type']=='Transferred an Equipment'){
  $rr=$row2['transac_transferredto'];
  $sql11="SELECT * FROM empl_tbl WHERE empl_no='$rr'";
  $result11=mysqli_query($conn,$sql11);
  while($row11=mysqli_fetch_assoc($result11)){
    $ee=$row2['transac_eqid'];
    $sql12="SELECT * FROM eq_inv WHERE eq_inv_id='$ee'";
    $result12=mysqli_query($conn,$sql12);
    while($row12=mysqli_fetch_assoc($result12)){

    echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label><br>" . $row2['transac_pos'] ." ". $row2['transac_type'] . ": "."<strong>". "<a href='equipment.php?section=all&q=$ee'>" . $row12['eqdesc'] . "</a>" . "</strong>" . " to " . "<a href='timeline.php?emp_no=$rr'>" . $row11['empl_firstname'] . " " . $row11['middlename'] . " " . $row11['empl_lastname'] ."</a>". " ". $row2['transac_loc'];
}
}
}
if($row2['transac_type']=='Updated a PAR remark'){
  $mm=$row2['transac_empl'];
echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label>" . "<br>" . $row2['transac_pos'] . " " . $row2['transac_type'] . ": " . "<a href='about.php?section=equipment&action=&selaction=&emp_no=$mm#tablerem'>" . $row2['transac_remark'] . "</a>" . " " . "<br><br>" . $row2['transac_eqid'];
}

if($row2['transac_type']=='Changed an employee Deployment'){
$kk=$row2['transac_empl'];
echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label>" . "<br>" . $row2['transac_pos'] . " " . $row2['transac_type'] . "<br>" . "Changes: " . "<strong><a href='about.php?section=deployment_history&action=&selaction=&emp_no=$kk#deploy1'>" . $row2['transac_loc'] . "</a></strong>";
}
if($row2['transac_type']=='Edited employee information'){
$gg=$row2['transac_empl'];
$sql13="SELECT * FROM empl_tbl WHERE empl_no='$gg'";
$result13=mysqli_query($conn,$sql13);
while($row13=mysqli_fetch_assoc($result13)){
echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label>" . "<br>" . $row2['transac_pos'] . " " . $row2['transac_type'] . " of " . "<a href='about.php?section=employee&action=&selaction=&emp_no=$gg'>" . $row13['empl_firstname'] . " " . $row13['middlename'] . " " . $row13['empl_lastname'] ."</a>";
}
}
if($row2['transac_type']=='Updated a deployment changes remark'){
  $gg=$row2['transac_empl'];
  echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label>" . "<br>" . $row2['transac_pos'] . " " . $row2['transac_type'] . " for " . "<a href='about.php?section=&action=&selaction=&section=deployment_history&emp_no=$gg#deploy_change'>" . $row2['transac_loc']  . "</a> <br>" . " Remark: " . $row2['transac_remark'];
}
if ($row2['transac_type']=='Added an employee'){
  $jj=$row2['transac_empl'];
  $sql5="SELECT * FROM empl_tbl WHERE empl_no='$jj'";
  $result5=mysqli_query($conn,$sql5);
  while($row5=mysqli_fetch_assoc($result5)){
      echo "Unique ID: " . $row2['transac_uid'] . "<label style='float:right;'>" . $row2['transac_date'] . "</label><br>";
        echo $row2['transac_pos'] . " " . $row2['transac_type'] . ": " . "<a href='timeline.php?emp_no=$jj'>" . $row5['empl_firstname']." ".$row5['middlename']." ".$row5['empl_lastname']. "</a>";
}
}
?>
 </div>

 <?php
}
 ?>
 </div>
 <div class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
</html>
