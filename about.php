<!DOCTYPE html>
<html>
<head><title>Profile</title>
<?php include ("header.php");
$emp_no=$_GET['emp_no'];
$sql="SELECT *FROM empl_tbl WHERE empl_no='$emp_no'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$position=$_SESSION['SESS_ROLE'];
$act=$_GET['action'];
$selaction=$_GET['selaction'];
$section=$_GET['section'];
?>
<script type="text/javascript">
function handleempl(elm)
{
  window.location ="about.php?section=equipment&action=transfer&emp_no=<?php echo $emp_no;?>&selaction="+elm.value;
}
</script>
</style>
</head>
<body>
<!--*HR GENERALIST-->
  <?php
  if($position=='HR Generalist' OR $position=='HR and Admin Manager'){
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
 <div class="profile-nav">
 <ul>
 <li><a href="timeline.php?emp_no=<?php echo $_GET['emp_no']; ?>">Timeline</a></li>
 <li><a href="about.php?section=overview&action=&selaction=&overview&emp_no=<?php echo $_GET['emp_no']; ?>">About</a><li>
 </ul>
 </div>

 <div class="about-div">
 <h3>About</h3>
 </div>

 <div class="profile-sidenav-about">
 <h1 style="text-align:center;font-size:23px;">PROFILE</h1>
 <img src="icon/person2.png" height="90" width="90" id="imgprof">
 <?php
 $sql4="SELECT*FROM empl_tbl WHERE empl_no='$emp_no'";
 $result4=$conn->query($sql4);
 $row4=$result4->fetch_assoc();
 $show_fname=$row4['empl_firstname'];
 $show_mname=$row4['middlename'];
 $show_lname=$row4['empl_lastname'];

 $sql5="SELECT*FROM empl_tbl WHERE empl_no='$emp_no'";
 $result5=$conn->query($sql5);
 $row5=$result5->fetch_assoc();
 $dep=$row5['dept_id'];
 ?>
 <center><h3><?php echo $show_fname; echo " ";echo  $show_mname; echo " "; echo $show_lname;?></h3></center>
 <ul class="mainmenu">
   <?php
   if($section=='overview'){
     ?>
   <li style="font-size:20px;"><a href="about.php?section=overview&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Overview</strong></a></li>
   <?php
 }
 else{
 ?>
   <li><a href="about.php?section=overview&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>">Overview</a></li>
   <?php
 }
   if($section=='employee'){
     ?>
   <li style="font-size:20px;"><a href="about.php?section=employee&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Employee</strong></a></li>
   <?php
 }
 else{
 ?>
   <li><a href="about.php?section=employee&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>">Employee</a></li>
   <?php
 }
  ?>
   <?php
    if($section=='equipment'){
     ?>
   <li style="font-size:20px;"><a href="about.php?section=equipment&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Equipment</strong></a></li>
   <?php
 }
 else{
 ?>
 <li><a href="about.php?section=equipment&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>">Equipment</a></li>
 <?php
}
?>
<?php
 if($section=='deployment_history'){
  ?>
<li style="font-size:20px;"><a href="about.php?section=deployment_history&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Deployment</strong></a></li>
<?php
}
else{
?>
<li><a href="about.php?section=&action=&selaction=&section=deployment_history&emp_no=<?php echo $_GET['emp_no'];?>">Deployment</a></li>
<?php
}
?>
 </ul>

 </div>
 <?php
 $section=$_GET['section'];
 if($section=='overview'){
 ?>
 <div class="aboutcontent-div">
   <label style="margin-left:15px;color:#878787;">Employee Number: </label><label class="en"><strong><?php echo $row4['empl_no'];?></strong></label><br><br>
   <label style="margin-left:15px;color:#878787;">Position: </label><label class="pos">
   <strong>
     <?php
   $pos3=$row4['position'];
   $sql19="SELECT*FROM position WHERE pos_id='$pos3'";
   $result19=mysqli_query($conn,$sql19);
   while($row19=mysqli_fetch_assoc($result19)){
   echo $row19['position'];
 }
   ?>
 </strong></label><br><br>
   <label style="margin-left:15px;color:#878787;">Department: </label><label class="dt"><strong>
     <?php
     $sql21="SELECT * FROM dept_tbl WHERE dept_id='$dep'";
     $result21=mysqli_query($conn,$sql21);
     while($row21=mysqli_fetch_assoc($result21)){
       echo $row21['dept_name'];
     }
     ?>
     </strong></label><br><br>
   <label style="margin-left:15px;color:#878787;">Deployment: </label><label class="dp"><strong><?php echo $row5['deploy'];?></strong></label><br><br>
   <?php
   $sql7="SELECT*FROM eq_inv WHERE empl_no='$emp_no'";
   $result7=$conn->query($sql7);
   $row7=$result7->fetch_assoc();
   ?>
 <label style="margin-left:15px;color:#878787;">Equipment assigned to employee: </label><br><?php
   $sql6="SELECT*FROM eq_inv WHERE empl_no='$emp_no'";
 $result6=mysqli_query($conn, $sql6);
 while($row6 = mysqli_fetch_assoc($result6)){
  ?><strong><?php echo "-".$row6['eqdesc'];?></strong><br><?php
 }
   ?><br>
</div>
 <?php
 }
 elseif($section=='employee'){
 ?>
 <div class="aboutcontent-div">
   <?php

   $sql3="SELECT * FROM empl_tbl  WHERE empl_no='$emp_no'";
   $result3=mysqli_query($conn,$sql3);
   while($row3=mysqli_fetch_assoc($result3)){
     ?>
     <label style="margin-left:15px;color:#878787;">Employee Number: </label><label style="margin-left:39px;"><strong><?php echo $row3['empl_no'];?></strong></label><br>
     <label style="margin-left:20px;color:#878787;">First Name: </label><label class="fn"><strong><?php echo $row3['empl_firstname'];?></strong></label><br>
     <label style="margin-left:15px;color:#878787;">Middle Name: </label><label class="mn"><strong><?php echo $row3['middlename'];?></strong></label><br>
     <label style="margin-left:22px;color:#878787;">Last Name: </label><label class="ln"><strong><?php echo $row3['empl_lastname'];?></strong></label><br><br>
     <label style="margin-left:22px;color:#878787;">Status: </label><label class="sts"><strong><?php echo $row3['empl_status'];?></strong></label><br>
     <label style="margin-left:15px;color:#878787;">Position: </label>
     <?php
     $pos2=$row5['position'];
     $sql18="SELECT * FROM position WHERE pos_id='$pos2'";
     $result18=mysqli_query($conn,$sql18);
     while($row18=mysqli_fetch_assoc($result18)){
       ?>
    <label class="ps"><strong><?php echo $row18['position'];?></strong></label><br>
     <?php
   }
   ?><br>
    <label style="margin-left:13px;color:#878787;">Department: </label>
    <?php
   $dept2=$row3['dept_id'];
   $sql14="SELECT*FROM dept_tbl WHERE dept_id='$dept2'";
   $result14=mysqli_query($conn,$sql14);
   while($row14=mysqli_fetch_assoc($result14)){
    ?>
    <label class="dept"><strong><?php echo $row14['dept_name'];?></strong></label><br>
     <?php
   }
    ?><br>
     <label style="margin-left:11px;color:#878787;">Deployment/Location: </label><label class="dep"><strong><?php echo $row3['deploy'];?></strong></label><br>
     <label style="margin-left:15px;color:#878787;">Date Hired:</label><label class="hd"><?php echo $row3['hired'];?></strong></label><br><br>
     <label style="margin-left:13px;color:#878787;">Profile creation date:</label><label style="margin-left:31px;"><?php echo $row3['date_created'];?></label><br><br>
     <span style="margin-left:15px;color:#878787;">Remarks/Comments:</span><textarea placeholder="Remarks/Comments.." readonly class="form-control" style="margin-left:20px;width:400px;"><?php echo $row3['remarks_prof'];?></textarea><br><br>

 <?php
 }
  ?>
   <a href="employee.php?emp_no=<?php echo $emp_no;?>"><button class="btn btn-primary">Edit information</button></a>
    <button class="btn btn-danger" onclick="archive(this)" value="<?php echo $emp_no;?>">Delete profile</button>
   </div>

 <?php
 }
 elseif($section=='equipment'){
 ?>
<!--Update modal Manager-->
<!-- Large modal -->
<div class="modal fade" id="myModal" role="dialog">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
     <div class="modal-header">

       <h4 class="modal-title">UPDATE EQUIPMENT</h4>
     </div>
     <div class="modal-body">
       <form action="updateeq.php" method="POST" class="ajax">
         <input type="hidden" name="old-cond" id="old-cond">
         <input type="hidden" name="up-empl" id="up-empl">
         <input type="hidden" name="up-state" id="up-state">
         <label>Equipment ID</label>
         <input type="text" id="figib" name="update-id" readonly class="form-control" style="margin-left:64px;background-color:#ccc;width:200px;"><br>
         <label>Description</label>
         <input type="text" name="update-desc" id="figib2" readonly class="form-control" style="margin-left:80px;background-color:#ccc;width:200px;"><br>
         <label>Brand</label>
         <select name="update-brand" required class="custom-select" style="margin-left:119px;width:250px;" id="figib3">
             <option></option>
           <?php
           $sql4="SELECT * FROM brand";
           $result=mysqli_query($conn, $sql4);
           while($row=mysqli_fetch_assoc($result)){
            ?>
           <option><?php echo $row['brand'];?></option>
           <?php
         }
          ?>
         </select><br>
         <label>Tag Number</label>
         <input type="text" name="update-tag" id="figib4" class="form-control" style="margin-left:73px;width:200px;"><br>
         <label>Serial Number</label>
         <input type="text" name="update-serial" id="figib5" class="form-control" style="margin-left:59px;width:200px;"><br>
         <label>Model Number</label>
         <input type="text" name="update-model" id="figib6" class="form-control" style="margin-left:52px;width:200px;"><br>
         <label>IP Address</label>
         <input type="text" name="update-ip" id="figib7" class="form-control" style="margin-left:86px;width:200px;"><br>
         <label>Date Issued</label>
         <input type="date" name="update-issued" id="figib8" readonly style="margin-left:78px;background-color:#ccc;width:200px;"><br>
         <label>Equipment State</label>
         <select  name="update-state" class="custom-select" class="form-control" style="margin-left:44px;width:100px;" id="figib9">
           <option>New</option>
           <option>Old</option>
           <option>Unknown state</option>
         </select><br>
         <label>Equipment Condition</label>
         <select  name="update-condition" class="custom-select" style="margin-left:10px;width:200px;" id="figib10">
             <option>Assigned</option>
             <option>Available/Unassigned</option>
             <option value="repair">For repair</option>
             <option value="missingeq">Missing EQ</option>
             <option value="missingpart">W/ missing part(s)</option>
             <option value="refurbished">Refurbished</option>
         </select><br>
         <label>Date Purchased</label>
         <input type="date" name="update-purch" class="form-control" style="margin-left:50px;width:200px;" id="figib11"><br>
         <label>Age</label>
         <input type="text" name="" readonly class="form-control" style="margin-left:132px;background-color:#ccc;width:200px;"><br>
         <label>Price</label>
         <input type="number" name="update-price" class="form-control" style="width:200px;margin-left:126px;" id="figib12"><br>
         <label>Location</label>
         <select  name="update-loc" required class="custom-select" style="margin-left:100px; width:500px;" id="figib13">
             <option></option>
           <?php
           $sql4="SELECT * FROM eq_inv GROUP BY curr_equip_loc";
           $result=mysqli_query($conn, $sql4);
           while($row=mysqli_fetch_assoc($result)){
            ?>
           <option><?php echo $row['curr_equip_loc'];?></option>
           <?php
         }
          ?>
         </select><br>
         <span>Remarks</span><textarea class="form-control" style="margin-left:105px;width:500px;" rows="4" name="update-remark" id="figib14"></textarea><br><br>
         <input style="left:0;" class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" style="margin-left:340px;">
       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>
 <div class="aboutcontent-div">
<br>
<div id="prof-equip">
<?php
   if($position=='Admin Staff'){
     ?>
     <a href="codegenerate.php?emp_no=<?php echo $emp_no;?>"><button style="float:left">Assign equipment</button></a>
<?php
 }
?>
   <table id="prof-equip">
   <tr>
   <th>Action</th>
   <th>ID</th>
   <th>PAR NO</th>
   <th>Description</th>
   <th>Brand</th>
   <th>Tag no</th>
   <th>Serial no</th>
   <th>Model no</th>
   <th>IP add</th>
   <th>State</th>
   <th>Condition</th>
   <th>Date Issued</th>
   <th>Date Purchased</th>
   <th>Price</th>
   <th>Location</th>
   <th>Remarks</th>

             </tr>
             <?php
             $sql2="SELECT * FROM eq_inv WHERE empl_no='$emp_no' ORDER BY par DESC";
             $result2=mysqli_query($conn, $sql2);
             while($row2 = mysqli_fetch_assoc($result2)){
              ?>
              <tbody>
                   <td>
                <?php
                if($act=='transfer'){
                 ?>
                <form action="addeq.php" method="POST">
                   <input type="hidden" name="par_transfer" value="<?php echo $row2['par']; ?>">
                   <input type="hidden" name="invid" value="<?php echo $row2['eq_inv_id']; ?>">
                   <input type="hidden" name="serial" value="<?php echo $row2['serial_no']; ?>">
                   <input type="hidden" name="emp" value="<?php echo $emp_no; ?>">
                   <input type="hidden" name="desc" value="<?php echo $row2['eqdesc']; ?>">
                   <input type="hidden" name="remark3" value="<?php echo $row2['remarks']; ?>">
                  <input type="submit" name="submit" value="Add">
                </form>
                  <?php
                 }
            ?>
               </td>
               <td><?php echo $row2['eq_inv_id']; ?></td>
               <td><?php echo $row2['par']; ?></td>
               <td style="font-size:20px;"><strong><?php echo $row2['eqdesc']; ?></strong></td>
               <td><?php echo $row2['brand']; ?></td>
               <td><?php echo $row2['tag_no']; ?></td>
               <td><?php echo $row2['serial_no']; ?></td>
               <td><?php echo $row2['model_no']; ?></td>
               <td><?php echo $row2['ip_add']; ?></td>
               <td><?php echo $row2['eq_state']; ?></td>
               <td style="color:red;"><strong><?php echo $row2['eq_condition']; ?></strong></td>
               <td><?php echo $row2['date_issued']; ?></td>
               <td><?php echo $row2['date_purch']; ?></td>
               <td><?php echo $row2['price']; ?></td>
               <td><?php echo $row2['curr_equip_loc']; ?></td>
               <td><?php echo $row2['remarks']; ?></td>
             </tbody>
               <?php
                }
                ?>
               </table><br>
             </div>

                     <br><br><br>
                     <?php
                     if($position=='HR and Admin Manager'){
                       ?> <!--APPROVE
                       <div id="transfer" style="border-style:solid;border-color:	#DCDCDC	;border-width:1px;border-radius:5px;margin-right:150px;margin-left:150px;">
                       <h6>Pending assignments</h6><br>
                     </div>
                      -->
                     <?php
                     }
                     ?>

           </div>
           <div style="background-color:#1abc9c; padding:10px;margin-top:40px;margin-left:290px;margin-right:100px;margin-bottom:-20px;font-size:20px;font-family:arial;border-top-left-radius: 3px;
             border-top-right-radius:3px; color:black;"><strong>Issued Equipment</strong></div>
           <div class="content-divitadmin">
             <div class="alert alert-primary" role="alert" style="text-align:center;">
            Property Acknowledgement Receipt/Memorandum Receipt
            </div><br>
<br>                    <table style="margin-left:210px;" id="tablerem">
                 <tr>
                   <th>UNIQUE ID</th>
                   <th>PAR NUMBER</th>
                   <th>DATE ISSUED</th>
                   <th>REMARK/COMMENT<th>
                 </tr>
                 <?php
                   $sql12="SELECT * FROM prty_ackn_rcpt WHERE transfer_empl_no='$emp_no' GROUP BY par_no ORDER BY par_id DESC";
                   $result12=mysqli_query($conn, $sql12);
                   while($row12=mysqli_fetch_assoc($result12)){
                     ?>
                     <form method="POST" action="par_remark.php#tablerem" id="remarkForm">
                 <tbody>
                   <td>
                     <?php echo $row12['par_id'];?>
                   </td>
                   <td>
                     <a href="viewpar.php?par=<?php echo $row12['par_no'];?>"><?php echo $row12['par_no'];?>
                     </td>
                     <td>
                       <?php echo $row12['dateissued'];?>
                     </td>
                     <td>
                       <input type="hidden" name="idpar" value="<?php echo $row12['par_no'];?>">
                        <input type="hidden" name="empl_remark" value="<?php echo $emp_no;?>">
                       <textarea name="par_rem" required><?php echo $row12['remark_view'];?></textarea>
                     </td>
                     <td>
                       <button class="btn btn-primary" style="height:50px;width:65px;font-size:11px;">UPDATE<br>REMARK
                       </button>
                     </td>
                   </tbody>
                 </form>
                   <?php
                 }
                  ?>
                 </table>
           </div>
 <?php
 }
 elseif($section=='deployment_history'){
 ?>
<div class="aboutcontent-div" id="deploy1">
  <?php
  $sql8="SELECT * FROM empl_tbl WHERE empl_no='$emp_no'";
  $result8=mysqli_query($conn,$sql8);
  while($row8=mysqli_fetch_assoc($result8)){
    ?>
    <br><br>
    <?php

      $a = isset($_SESSION['transfer_sess']) ? $_SESSION['transfer_sess'] : null;
      $transfer=isset($_SESSION['transfer_sess']) ? $_SESSION['transfer_sess'] : null;

      //transferID
      function createRandomtransferID() {
        $chars = "003232303232023232023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i <= 7) {
          $num = rand() % 33;
          $tmp = substr($chars, $num, 1);
          $pass = $pass . $tmp;
          $i++;
        }
        return $pass;
      }
      $transferID='TID-'.createRandomtransferID();
      ?>
  <label style="margin-left:15px;color:#878787;">Current employee's deployment/location:</label><label readonly style="width:650px;" class="form-control"><strong><?php echo " ".$row8['deploy'];?></strong></label><br><br><br>
    <label style="margin-left:15px;color:#878787;">Change employee's deployment below:</label>
  <div style="border-style:solid;border-width:0.5px;border-color:#ccc;border-radius:5px;margin-top:10px;margin-left:90px;margin-right:90px;padding-bottom:100px;padding:10px;">
    <form action="saveeditdeploy.php" method="POST"><br>
      <input type="hidden" name="transferID" value="<?php echo $transferID;?>">
    <input type="hidden" name="emp2" value="<?php echo $emp_no;?>">
    <span>Deployment ID </span><input type="text" id="deploy_id" value="<?php echo $transfer;?>" name="id" style="width:200px;" class="form-control" readonly><br><br>
    <span>Deployment </span><br>
    <select id="deployment" name="deploy" onchange="window.location='transfer-deploy.php?emp=<?php echo $emp_no;?>&val='+this.value" class="form-control" required>

      <?php
    $sql11="SELECT * FROM Deployment WHERE deply_id='$transfer'";
    $result11=mysqli_query($conn,$sql11);
    while($row11=mysqli_fetch_assoc($result11)){
      ?>
        <option><?php echo $row11['deployment'];?></option>
        <?php
      }
      ?>
      <option></option>
      <?php
        $sql10="SELECT * FROM Deployment";
        $result10=mysqli_query($conn, $sql10);
        while($row10 = mysqli_fetch_assoc($result10)){
        ?>
          <option value="<?php echo $row10['deply_id'];?>"><?php echo $row10['deployment']; ?></option>
          <?php
        }
        ?>
      </select><br><br>
    <span>Date changed </span><br><input type="date" name="date_changed" class="form-control" style="width:267px;height:30px;" required><br><br>
    <input type="submit" name="submit"  class="btn btn-primary" style="height:30px;" value="Change deployment">
</form>
<?php
}
 ?>
</div>
<br><br>
<div class = "alert alert-success" id="deploy_change">
   <a href = "#" class = "alert-link">Deployment Changes History</a>
</div>
<table style="margin-left:25px;">
  <tr>
    <th>ID</th>
    <th>Deployment changes</th>
    <th>Date</th>
    <th>Remark</th>
    <th>Action</th>
  </thead>

  <?php
  $sql20="SELECT * FROM deploy_transfer WHERE emplNo_transfer='$emp_no' ORDER BY idTransfer DESC";
  $result20=mysqli_query($conn,$sql20);
  while($row20=mysqli_fetch_assoc($result20)){
    ?>
<form method="POST" action="transfer_remark.php#transferdiv" id="transferForm">
       <tr>
         <td>
           <?php echo $row20['transferID'];?>
         </td>
         <td>
           <?php echo $row20['newDeployment'];?>
         </td>
         <td>
           <?php echo $row20['transferDate'];?>
         </td>
         <td>
           <input type="hidden" name="idtransfer" value="<?php echo $row20['transferID'];?>">
           <input type="hidden" name="empl_transfer" value="<?php echo $emp_no;?>">
           <textarea name="remarktransfer" required><?php echo $row20['remarkTransfer'];?></textarea>
         </td>
         <td>
           <button name="transferButton" class="btn btn-primary" style="height:50px;width:65px;font-size:11px;" value="<?php echo $row20['remarkTransfer'];?>" /><strong>UPDATE<br>REMARK</strong></button>
         </td>
       </tr>
</form>
         <?php
       }
       ?>
     </table>
 </div>

 <?php
 }
}
                                              // *ADMIN STAFF
if($position=='Admin Staff'){
          ?>
          <div class="first-header-astaff">
            <ul>
              <li><a href="equip_assign.php">Equipment Assignments</a></li>
              <li><a href="equipment.php">Equipment Inventory</a></li>
          <li><a href="">Monitoring</a></li>
          <li><a href="">Activity Log</a></li>
          <li style="float:right "><a href="logout.php">LOGOUT</a></li>
          <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'];?></li>
          </ul>
          </div>
        <?php
      }

  //*IT ADMIN
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

          <div class="profile-nav">
            <ul>
            <li><a href="timeline.php?emp_no=<?php echo $_GET['emp_no']; ?>">Timeline</a></li>
            <li><a href="about.php?section=overview&selaction=&action=&emp_no=<?php echo $_GET['emp_no']; ?>">About</a><li>
            </ul>
            </div>

    <div class="about-div">
    <h3 style="float:left;">About</h3>
    </div>
    <div class="profile-sidenav-about">
    <h1 style="text-align:center;font-size:18px;">PROFILE</h1>
    <img src="icon/person2.png" height="90" width="90" id="imgprof">
      <?php
      $sql4="SELECT*FROM empl_tbl WHERE empl_no='$emp_no'";
      $result4=$conn->query($sql4);
      $row4=$result4->fetch_assoc();
      $show_fname=$row4['empl_firstname'];
      $show_mname=$row4['middlename'];
      $show_lname=$row4['empl_lastname'];
      $sql5="SELECT*FROM empl_tbl INNER JOIN dept_tbl on empl_tbl.dept_id=dept_tbl.dept_id WHERE empl_no='$emp_no'";
      $result5=$conn->query($sql5);
      $row5=$result5->fetch_assoc();
      $dep=$row5['dept_id'];
       ?>
        <center><h3><?php echo $show_fname; echo " ";echo  $show_mname; echo " "; echo $show_lname;?></h3></center>
          <ul class="mainmenu">
            <?php
            if($section=='overview'){
              ?>
            <li style="font-size:20px;"><a href="about.php?section=overview&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Overview</strong></a></li>
            <?php
          }
          else{
          ?>
            <li><a href="about.php?section=overview&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>">Overview</a></li>
            <?php
          }
            if($section=='employee'){
              ?>
            <li style="font-size:20px;"><a href="about.php?section=employee&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Employee</strong></a></li>
            <?php
          }
          else{
          ?>
            <li><a href="about.php?section=employee&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>">Employee</a></li>
            <?php
          }
           ?>
            <?php
             if($section=='equipment'){
              ?>
            <li style="font-size:20px;"><a href="about.php?section=equipment&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Equipment</strong></a></li>
            <?php
          }
          else{
          ?>
          <li><a href="about.php?section=equipment&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>">Equipment</a></li>
          <?php
        }
         ?>
         <?php
          if($section=='deployment_history'){
           ?>
         <li style="font-size:20px;"><a href="about.php?section=deployment_history&action=&selaction=&emp_no=<?php echo $_GET['emp_no'];?>"><strong>Deployment</strong></a></li>
         <?php
       }
       else{
       ?>
        <li><a href="about.php?section=&action=&selaction=&section=deployment_history&emp_no=<?php echo $_GET['emp_no'];?>">Deployment</a></li>
       <?php
       }
       ?>
          </ul>

 </div>
   <?php
        if($section=='overview'){
      ?>
      <div class="aboutcontent-div">
        <label style="color:gray;margin-left:15px;">Employee Number: </label><label class="en"><strong><?php echo $row4['empl_no'];?></strong></label><br><br>
        <label style="color:gray;margin-left:15px;">Position: </label><label class="pos">
        <strong>
          <?php
        $pos3=$row4['position'];
        $sql19="SELECT*FROM position WHERE pos_id='$pos3'";
        $result19=mysqli_query($conn,$sql19);
        while($row19=mysqli_fetch_assoc($result19)){
        echo $row19['position'];
      }
        ?>
      </strong></label><br><br>
        <label style="color:gray;margin-left:15px;">Department: </label><label class="dt"><strong>
          <?php
          $sql21="SELECT * FROM dept_tbl WHERE dept_id='$dep'";
          $result21=mysqli_query($conn,$sql21);
          while($row21=mysqli_fetch_assoc($result21)){
            echo $row21['dept_name'];
          }
          ?>
          </strong></label><br><br>
        <label style="color:gray;margin-left:15px;">Deployment: </label><label class="dp"><strong><?php echo $row5['deploy'];?></strong></label><br><br>
        <?php
        $sql7="SELECT*FROM eq_inv WHERE empl_no='$emp_no'";
        $result7=$conn->query($sql7);
        $row7=$result7->fetch_assoc();
        ?>
      <label style="color:gray;margin-left:15px;">Equipment assigned to employee: </label><br><?php
        $sql6="SELECT*FROM eq_inv WHERE empl_no='$emp_no'";
      $result6=mysqli_query($conn, $sql6);
      while($row6 = mysqli_fetch_assoc($result6)){
       ?><strong><?php echo "-".$row6['eqdesc'];?></strong><br><?php
      }
        ?><br>
     </div>
      <?php
      }
        elseif($section=='employee'){
        ?>
        <div class="aboutcontent-div">
          <?php

          $sql3="SELECT * FROM empl_tbl  WHERE empl_no='$emp_no'";
          $result3=mysqli_query($conn,$sql3);
          while($row3=mysqli_fetch_assoc($result3)){
            ?>
            <label style="color:gray;margin-left:15px;">Employee Number: </label><label style="margin-left:39px;"><strong><?php echo $row3['empl_no'];?></strong></label><br>
            <label style="color:gray;margin-left:15px;">First Name: </label><label class="fn"><strong><?php echo $row3['empl_firstname'];?></strong></label><br>
            <label style="color:gray;margin-left:15px;">Middle Name: </label><label class="mn"><strong><?php echo $row3['middlename'];?></strong></label><br>
            <label style="color:gray;margin-left:15px;">Last Name: </label><label class="ln"><strong><?php echo $row3['empl_lastname'];?></strong></label><br><br>
            <label style="color:gray;margin-left:15px;">Status: </label><label class="sts"><strong><?php echo $row3['empl_status'];?></strong></label><br>
            <label style="color:gray;margin-left:15px;">Position: </label>
            <?php
            $pos2=$row5['position'];
            $sql18="SELECT * FROM position WHERE pos_id='$pos2'";
            $result18=mysqli_query($conn,$sql18);
            while($row18=mysqli_fetch_assoc($result18)){
              ?>
           <label class="ps"><strong><?php echo $row18['position'];?></strong></label><br>
            <?php
          }
          ?><br>
           <label style="color:gray;margin-left:15px;">Department: </label>
           <?php
          $dept2=$row3['dept_id'];
          $sql14="SELECT*FROM dept_tbl WHERE dept_id='$dept2'";
          $result14=mysqli_query($conn,$sql14);
          while($row14=mysqli_fetch_assoc($result14)){
           ?>
           <label class="dept"><strong><?php echo $row14['dept_name'];?></strong></label><br>
            <?php
          }
           ?><br>
            <label style="color:gray;margin-left:15px;">Deployment/Location: </label><label class="dep"><strong><?php echo $row3['deploy'];?></strong></label><br>
            <label style="color:gray;margin-left:15px;">Date Hired:</label><label class="hd"><?php echo $row3['hired'];?></strong></label><br><br>
            <label style="color:gray;margin-left:15px;">Profile creation date:</label><label style="margin-left:31px;"><?php echo $row3['date_created'];?></label><br><br>

            <form id="remark" class="ajax">
            <span style="color:gray;margin-left:15px;">Remark/Comment:</span>
            <textarea id="remedit" name="remtext" value="Save" readonly placeholder="Remarks/Comments.." class="form-control" style="margin-left:20px;width:400px;"><?php echo $row3['remarks_prof'];?></textarea><br><br>
            <input type="submit" id="edremark2" onClick="rem2()" class="btn btn-primary" style="height:30px;visibility: hidden;margin-left:15px;" value="Save" />
            <input type="hidden" name="emp" value="<?php echo $emp_no;?>">
            </form>

            <button id="remcancel" onclick="cancelrem()" class="btn btn-danger"  style="margin-top:-30px;margin-left:80px;position:absolute;height:30px;visibility: hidden;">Cancel</button>
            <button id="edremark" onClick="rem()" class="btn btn-primary" style="margin-left:15px;margin-top:-59px;height:30px;">Edit Remark</button><br><br>

        <?php
        }
         ?>
          </div>

        <?php
        }
      elseif($section=='equipment'){
    ?>
    <!--Update modal IT Admin-->
    <!-- Large modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">UPDATE EQUIPMENT</h4>
          </div>
          <div class="modal-body">
            <form action="updateeq.php" method="POST" class="ajax">
              <input type="hidden" name="old-cond" id="old-cond">
              <input type="hidden" name="up-empl" id="up-empl">
              <input type="hidden" name="up-state" id="up-state">
              <label>Equipment ID</label>
              <input type="text" id="figib" name="update-id" readonly class="form-control" style="margin-left:64px;background-color:#ccc;width:200px;"><br>
              <label>Description</label>
              <input type="text" name="update-desc" id="figib2" readonly class="form-control" style="margin-left:80px;background-color:#ccc;width:200px;"><br>
              <label>Brand</label>
              <select name="update-brand" required class="custom-select" style="margin-left:119px;width:250px;" id="figib3">
                  <option></option>
                <?php
                $sql4="SELECT * FROM brand";
                $result=mysqli_query($conn, $sql4);
                while($row=mysqli_fetch_assoc($result)){
                 ?>
                <option><?php echo $row['brand'];?></option>
                <?php
              }
               ?>
              </select><br>
              <label>Tag Number</label>
              <input type="text" name="update-tag" id="figib4" class="form-control" style="margin-left:73px;width:200px;"><br>
              <label>Serial Number</label>
              <input type="text" name="update-serial" id="figib5" class="form-control" style="margin-left:59px;width:200px;"><br>
              <label>Model Number</label>
              <input type="text" name="update-model" id="figib6" class="form-control" style="margin-left:52px;width:200px;"><br>
              <label>IP Address</label>
              <input type="text" name="update-ip" id="figib7" class="form-control" style="margin-left:86px;width:200px;"><br>
              <label>Date Issued</label>
              <input type="date" name="update-issued" id="figib8" readonly style="margin-left:78px;background-color:#ccc;width:200px;"><br>
              <label>Equipment State</label>
              <select  name="update-state" class="custom-select" class="form-control" style="margin-left:44px;width:100px;" id="figib9">
                <option>New</option>
                <option>Old</option>
                <option>Unknown state</option>
              </select><br>
              <label>Equipment Condition</label>
              <select  name="update-condition" class="custom-select" style="margin-left:10px;width:200px;" id="figib10">
                  <option>Assigned</option>
                  <option>Available/Unassigned</option>
                  <option value="repair">For repair</option>
                  <option value="missingeq">Missing EQ</option>
                  <option value="missingpart">W/ missing part(s)</option>
                  <option value="refurbished">Refurbished</option>
              </select><br>
              <label>Date Purchased</label>
              <input type="date" name="update-purch" class="form-control" style="margin-left:50px;width:200px;" id="figib11"><br>
              <label>Age</label>
              <input type="text" name="" readonly class="form-control" style="margin-left:132px;background-color:#ccc;width:200px;"><br>
              <label>Price</label>
              <input type="number" name="update-price" class="form-control" style="width:200px;margin-left:126px;" id="figib12"><br>
              <label>Location</label>
              <select  name="update-loc" required class="custom-select" style="margin-left:100px; width:500px;" id="figib13">
                  <option></option>
                <?php
                $sql4="SELECT * FROM eq_inv GROUP BY curr_equip_loc";
                $result=mysqli_query($conn, $sql4);
                while($row=mysqli_fetch_assoc($result)){
                 ?>
                <option><?php echo $row['curr_equip_loc'];?></option>
                <?php
              }
               ?>
              </select><br>
              <span>Remarks</span><textarea class="form-control" style="margin-left:105px;width:500px;" rows="4" name="update-remark" id="figib14"></textarea><br><br>
              <input style="left:0;" class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" style="margin-left:340px;">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
      <div class="aboutcontent-div">
<br>
<div id="prof-equip">
  <?php
        if($position=='Admin Staff'){
          ?>
          <a href="codegenerate.php?emp_no=<?php echo $emp_no;?>"><button style="float:left">Assign equipment</button></a>
  <?php
      }
      if($position=='IT Admin'){
          if($act==''){
            ?>
              <a href="about.php?section=equipment&action=remove&selaction=&emp_no=<?php echo $emp_no;?>"><button class="btn btn-primary" style="float:left;margin-left:2px;margin-right:2px;height:30px;">Remove equipment</button></a>
              <?php
          }
       if($act=='remove'){
         ?>
         <!-- <a href="about.php?section=equipment&action=transfer&selaction=&emp_no=<?php echo $emp_no;?>"><button class="btn btn-primary" style="float:left;height:30px;margin-left:2px;">Transfer equipment</button></a>-->
         <a href="about.php?section=equipment&action=&selaction=&emp_no=<?php echo $emp_no;?>"><button class="btn btn-primary" style="float:left;background-color:red;height:30px;margin-left:2px;margin-right:2px;">Cancel Removal</button></a>
         <?php
       }
        ?>
          <a href="codegenerate.php?emp_no=<?php echo $emp_no;?>"><button class="btn btn-primary" style="float:right;margin-right:1px;height:30px;">Assign equipment</button></a>
        <br><br><br>
        <table id="prof-equip">
        <tr>
        <th>Action</th>
        <th>ID</th>
        <th>PAR NO</th>
        <th>Description</th>
        <th>Brand</th>
        <th>Tag no</th>
        <th>Serial no</th>
        <th>Model no</th>
        <th>IP add</th>
        <th>State</th>
        <th>Condition</th>
        <th>Date Issued</th>
        <th>Date Purchased</th>
        <th>Price</th>
        <th>Location</th>
        <th>Remarks</th>

                  </tr>
                  <?php
                  $sql2="SELECT * FROM eq_inv WHERE empl_no='$emp_no' ORDER BY par DESC";
                  $result2=mysqli_query($conn, $sql2);
                  while($row2 = mysqli_fetch_assoc($result2)){
                   ?>
                   <tbody>
                        <td>
                     <?php
                       if($act=='remove'){
                      ?>
                      <button value="<?php echo $row2['eq_inv_id'];?>" onclick="remove(this)">Remove</button>
                      <?php
                    }
                      ?>
                    <button class="btn btn-link" data-toggle="modal" data-target="#myModal" onClick="dim(this)" value="<?php echo $row2['eq_inv_id'];?>">Update</button>
                    </td>
                    <td><?php echo $row2['eq_inv_id']; ?></td>
                    <td><?php echo $row2['par']; ?></td>
                    <td style="font-size:20px;"><strong><?php echo $row2['eqdesc']; ?></strong></td>
                    <td><?php echo $row2['brand']; ?></td>
                    <td><?php echo $row2['tag_no']; ?></td>
                    <td><?php echo $row2['serial_no']; ?></td>
                    <td><?php echo $row2['model_no']; ?></td>
                    <td><?php echo $row2['ip_add']; ?></td>
                    <td><?php echo $row2['eq_state']; ?></td>
                    <td style="color:red;"><strong><?php echo $row2['eq_condition']; ?></strong></td>
                    <td><?php echo $row2['date_issued']; ?></td>
                    <td><?php echo $row2['date_purch']; ?></td>
                    <td><?php echo $row2['price']; ?></td>
                    <td><?php echo $row2['curr_equip_loc']; ?></td>
                    <td><?php echo $row2['remarks']; ?></td>
                  </tbody>
                    <?php
                     }
                     ?>
                    </table><br>
                  </div>                           
                          <?php
                          }
                          ?>
                </div>
                <div style="background-color:#1abc9c; padding:10px;margin-top:40px;margin-left:290px;margin-right:100px;margin-bottom:-20px;font-size:20px;font-family:arial;border-top-left-radius: 3px;
                	border-top-right-radius:3px; color:black;"><strong>Issued Equipment</strong></div>
                <div class="content-divitadmin">
                  <div class="alert alert-primary" role="alert" style="text-align:center;">
                 Property Acknowledgement Receipt/Memorandum Receipt
                 </div><br>
<br>                    <table style="margin-left:210px;" id="tablerem">
                      <tr>
                        <th>UNIQUE ID</th>
                        <th>PAR NUMBER</th>
                        <th>DATE ISSUED</th>
                        <th>REMARK/COMMENT<th>
                      </tr>
                      <?php
                        $sql12="SELECT * FROM prty_ackn_rcpt WHERE transfer_empl_no='$emp_no' GROUP BY par_no ORDER BY par_id DESC";
                        $result12=mysqli_query($conn, $sql12);
                        while($row12=mysqli_fetch_assoc($result12)){
                          ?>
                          <form method="POST" action="par_remark.php#tablerem" id="remarkForm">
                      <tbody>
                        <td>
                          <?php echo $row12['par_id'];?>
                        </td>
                        <td>
                          <a href="viewpar.php?par=<?php echo $row12['par_no'];?>"><?php echo $row12['par_no'];?>
                          </td>
                          <td>
                            <?php echo $row12['dateissued'];?>
                          </td>
                          <td>
                            <input type="hidden" name="idpar" value="<?php echo $row12['par_no'];?>">
                             <input type="hidden" name="empl_remark" value="<?php echo $emp_no;?>">
                            <textarea name="par_rem" required><?php echo $row12['remark_view'];?></textarea>
                          </td>
                          <td>
                            <button class="btn btn-primary" style="height:50px;width:65px;font-size:11px;">UPDATE<br>REMARK
                            </button>
                          </td>
                        </tbody>
                      </form>
                        <?php
                      }
                       ?>
                      </table>
                </div>
  <?php
    }
      elseif($section=='deployment_history'){
      ?>
  <div class="aboutcontent-div">
      <?php
      $sql16="SELECT*FROM empl_tbl WHERE empl_no='$emp_no'";
      $result16=mysqli_query($conn,$sql16);
      while($row16=mysqli_fetch_assoc($result16)){
        ?>
          <div class = "alert alert-info" style="margin-left:80px;width:800px;">  Coordinate with the HR and Admin Manager or HR Generalist to change Employee's deployment/location</div><br><br><br>
    <label style="color:#878787;">Current employee's deployment/location:</label>
    <input type="text" class="form-control" readonly style="width:660px;" value="<?php echo $row16['deploy'];?>" /><br><br>

    <div style="margin-top:20px;" id="transferdiv">
    <div class = "alert alert-success">
       <a href = "#" class = "alert-link">Deployment Changes History</a>
    </div>


    <table style="background-color:white;padding-bottom:100%;margin-top:5px;margin-left:100px;margin-right:100px;">
      <tr>
        <th>ID</th>
        <th>Deployment Changes</th>
        <th>Date changed</th>
        <th>Remark</th>
      </tr>

      <?php
      $sql20="SELECT * FROM deploy_transfer WHERE emplNo_transfer='$emp_no' ORDER BY idTransfer DESC";
      $result20=mysqli_query($conn,$sql20);
      while($row20=mysqli_fetch_assoc($result20)){
        ?>
   <form method="POST" action="transfer_remark.php#transferdiv" id="transferForm">
           <tr>
             <td>
               <?php echo $row20['transferID'];?>
             </td>
             <td>
               <?php echo $row20['newDeployment'];?>
             </td>
             <td>
               <?php echo $row20['transferDate'];?>
             </td>
             <td>
            <?php echo $row20['remarkTransfer'];?>
             </td>
           </tr>
   </form>
             <?php
           }
           ?>
         </table>
         </div>
    <?php
    }
  }
    ?>
  </div>
    <?php
    }
  ?>
  <script>

  function remove(details){
    if(confirm("Warning! You are about to REMOVE an equipment from an employee. Adding back the same equipment will no longer retain its previous PAR/MR number and will produce a different receipt for that equipment. However, equipment data will still remain in the receipt in the Issued equipment section. Press 'OK' to proceed.")){
    window.location="removeeq.php?emp=<?php echo $emp_no;?>&inv="+details.value;
  }
  }
  function rem(){
    if(confirm('Edit remarks?')){
    document.getElementById("remedit").readOnly=false;
    document.getElementById("edremark").style.visibility = "hidden";
    document.getElementById("edremark2").style.visibility = "visible";
    document.getElementById("remcancel").style.visibility = "visible";
    }
  }
  function rem2(){
    if(confirm('Press "OK" to save remarks')){
      document.getElementById("remedit").readOnly=true;
      document.getElementById("edremark2").style.visibility = "hidden";
      document.getElementById("edremark").style.visibility = "visible";
      document.getElementById("remcancel").style.visibility = "hidden";

    }
    $('form.ajax').off().on('submit', function(){
       $.ajax({
         type: "POST",
         url: "editremark.php",
         data: $('#remark').serialize(),
         dataType: "text",
         success: function(data)
         {
  alert(data);
         }
       });
    return false;
     });
  }

  function cancelrem(){
    document.getElementById("remedit").readOnly=true;
    document.getElementById("edremark2").style.visibility = "hidden";
    document.getElementById("edremark").style.visibility = "visible";
    document.getElementById("remcancel").style.visibility = "hidden";
    window.location.reload();
  }
  function dim(details){
    var invId = details.value;
    $.ajax({
      url: "test.php",
      method: "GET",
      data: {"invId": invId},
      success: function(response) {
        // Parsing the JSON string to javascript object
        var reu = JSON.parse(response);
        //Update modal
        figi1=reu.eq_inv_id;
        figi2=reu.eqdesc;
        figi3=reu.brand;
        figi4=reu.tag_no;
        figi5=reu.serial_no;
        figi6=reu.model_no;
        figi7=reu.ip_add;
        figi8=reu.date_issued;
        figi9=reu.eq_state;
        figi10=reu.eq_condition;
        figi11=reu.date_purch;
        figi12=reu.price;
        figi13=reu.curr_equip_loc;
        figi14=reu.remarks;
        figi15=reu.empl_no;

        document.getElementById("figib").value =figi1;
        document.getElementById("figib2").value =figi2;
        document.getElementById("figib3").value =figi3;
        document.getElementById("figib4").value =figi4;
        document.getElementById("figib5").value =figi5;
        document.getElementById("figib6").value =figi6;
        document.getElementById("figib7").value =figi7;
        document.getElementById("figib8").value =figi8;
        document.getElementById("figib9").value =figi9;
        document.getElementById("figib10").value =figi10;
        document.getElementById("old-cond").value =figi10;
        document.getElementById("figib11").value =figi11;
        document.getElementById("figib12").value =figi12;
        document.getElementById("figib13").value =figi13;
        document.getElementById("figib14").value =figi14;
        document.getElementById("up-empl").value =figi15;
        document.getElementById("up-state").value =figi9;

      }
      });
      //Update Modal
      $('form.ajax').on('submit', function(){
          var that = $(this),
              url = "updateeq.php",
              type = that.attr('method'),
              data={};
            that.find('[name]').each(function(index, value){
              var that = $(this),
                  name = that.attr('name'),
                  value = that.val();

              data[name] = value;
            });

        $.ajax({
          url: url,
          type: type,
          data: data,
          success: function(response){
              alert(response);
              window.location.reload();
          }
        });
          return false;

      });  //end of update modal
  }
  function transfer(transferDetails){
    if(confirm("Warning! Transferring equipment will remove its current PAR/MR number and will be assigned a new one. Adding back the same equipment to the employee will no longer retain its previous PAR/MR number. However, equipment data will still be visible in the PAR/MR in the issued equipment section. Press 'OK' to proceed. ")){
      window.location="erasetemp_assign.php?emp_no="+transferDetails.value;
    }
  }
  function archive(archiveDetails){
      var number_empl = archiveDetails.value;
    if(confirm("Warning! Deleting the employee profile will remove it from the employee list and will be transferred to the deleted profiles section. Its profile will no longer exist. Press 'OK' to proceed with the profile deletion process.")){
      $.ajax({
        url: "archive_select.php",
        type: "POST",
        data: {"number_empl" : number_empl},
        success: function(archiveData){
          alert(archiveData);
          window.location.reload();
        }
      });
    }
  }
  </script>
<div class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
</html>
