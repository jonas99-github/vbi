<!DOCTYPE html>
<head><title>Equipment Monitoring</title>
<?php include ("header.php");
$position=$_SESSION['SESS_ROLE'];
$sec=$_SESSION['section'];
$state=$_SESSION['state'];
$condition=$_SESSION['condition'];
?>
</head>
<body>
                                          <!--*HR and Admin Manager-->

                                        <!--*IT Admin-->
        <?php

    $a = isset($_GET['q']) ? $_GET['q'] : null;
        if($position=='IT Admin' OR 'HR and Admin Manager'){
       ?>
       <div class="first-header">
         <ul>
    <a href="dashboard.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
    <li>
      <div id="searchdiv-form" style="float:left;margin-top:-1px;margin-left:16px;">
        <section style="float:left;">
      <form id="search-form" action="search-session.php" method="POST" class="">
      <input type="text" id="search-input" name="q" style="border-radius: 5px;" placeholder="Search equipment" value="<?php  echo isset($_GET['q']) ? $_GET['q'] : null; ?>">
      <input type="submit" name="submit-button" value="Search" class="btn btn-info" style="width:80px;font-size:12px;">
    </form> 
  </section>
  <?php
  if(isset($a)){
    ?>
  <section style="float:left;">
    <form id="clear-search" action="equipment.php?section=" method="POST">
<input type="submit" name="submit" style="margin-left:3px;font-size:12px;" value="Clear search" class="btn btn-danger">
    </form>
  </section>
  <?php
}
 ?>
  </div>
    </li>
    <li><a href="dashboard.php">Employees</a></li>
    <?php
    if($position=='HR and Admin Manager'){
      ?>
        <li><a href="manage_empl.php">Manage Employee</a></li>
        <?php
    }
     ?>
    <li><a href="session2ndnav.php?section=all&q=<?php echo $a;?>">Equipment Inventory</a></li>
    <?php
     if($position=='HR and Admin Manager'){
      ?>
      <li><a href="undistributed.php">Undistributed</a></li>
        <?php
    }
    ?>
    <?php
     if($position=='IT Admin' or $position=='Admin Staff'){
       ?>
    <li><a href="undistributed.php">Undistributed</a></li>
    <li><a href="reorder.php">Make Reorder Request</a></li>
    <?php
  }
   ?>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <a href="manual.php" style="color:black;">Manual</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
   
  </div>
  </ul>
</div>
<!--PAGINATION-->
<!--END of PAGINATION-->
    <?php
  }
   ?>

  <div class="itad_2ndheader">
    <ul>
      <?php
      if($sec=='all'){
        ?>
      <li><a href="session2ndnav.php?section=all&q=<?php echo $a;?>" style="background-color:#ccc;">All</a></li><?php
    }
    else{
      ?>
      <li><a href="session2ndnav.php?section=all&q=<?php echo $a;?>">All</a>
      <?php
     }
     if($sec=='equipment'){
       ?>
      <li><a href="session2ndnav.php?section=equipment&q=<?php echo $a;?>" style="background-color:#ccc;">Equipment</a></li>
      <?php
    }
    else{
     ?>
       <li><a href="session2ndnav.php?section=equipment&q=<?php echo $a;?>">Equipment</a></li>
       <?php
     }
     if($sec=='brand'){
      ?>
      <li><a href="session2ndnav.php?section=brand&q=<?php echo $a;?>" style="background-color:#ccc;">Brand</a></li>
      <?php
    }
    else{
       ?>
      <li><a href="session2ndnav.php?section=brand&q=<?php echo $a;?>">Brand</a></li>
      <?php
    }
    if($sec=='tag'){
     ?>
      <li><a href="session2ndnav.php?section=tag&q=<?php echo $a;?>" style="background-color:#ccc;">Tag number</a></li>
      <?php
    }
    else{
     ?>
       <li><a href="session2ndnav.php?section=tag&q=<?php echo $a;?>">Tag number</a></li>
       <?php
     }
     if($sec=='serial'){
     ?>
      <li><a href="session2ndnav.php?section=serial&q=<?php echo $a;?>" style="background-color:#ccc;">Serial Number</a></li>
      <?php
    }
    else{
      ?>
      <li><a href="session2ndnav.php?section=serial&q=<?php echo $a;?>">Serial Number</a></li>
        <?php
      }
      if($sec=='model'){
        ?>
      <li><a href="session2ndnav.php?section=model&q=<?php echo $a;?>" style="background-color:#ccc;">Model Number</a></li>
      <?php
    }
    else{
       ?>
      <li><a href="session2ndnav.php?section=model&q=<?php echo $a;?>">Model Number</a></li>
         <?php
       }
      if($sec=='location'){
        ?>
      <li><a href="session2ndnav.php?section=location&q=<?php echo $a;?>" style="background-color:#ccc;">Location</a></li>
      <?php
    }
    else{
        ?>
      <li><a href="session2ndnav.php?section=location&q=<?php echo $a;?>">Location</a></li>
      <?php
    }
    if($sec=='remark'){
        ?>
      <li><a href="session2ndnav.php?section=remark&q=<?php echo $a;?>" style="background-color:#ccc;">Remarks</a></li>
      <?php
    }
    else{
       ?>
      <li><a href="session2ndnav.php?section=remark&q=<?php echo $a;?>">Remarks</a></li>
      <?php
    }
     if($sec=='par'){
        ?>
      <li><a href="session2ndnav.php?section=par&q=<?php echo $a;?>" style="background-color:#ccc;">PAR / MR</a></li>
      <?php
    }
    else{
       ?>
      <li><a href="session2ndnav.php?section=par&q=<?php echo $a;?>">PAR / MR</a></li>
      <?php
    }
    
     ?>
    </ul>
  </div>

<?php

 if($position=='IT Admin' or 'HR and Admin Manager'){
    if($position=='IT Admin'){
   ?>
   <div class="dropdown" style="padding:10px;float:left;margin-left:12px;">
     <button type="button" class="btn btn-info">
       Inventory Input
     </button>
     <div class="dropdown-content">
       <a href="equipment.php?section=addeq#additem">Add Equipment</a>
       <a href="description.php">Add EQ description & Brand</a>
       <a href="location.php">Add Location / Project Site</a>
       <a href="dashboard.php">Assign equipment</a>
   </div>
   </div>
   <?php
 }
  ?><div style="background-color:red;">
   <form action="export.php" method="POST">
     <input type="hidden" name="query" value="<?php echo $a;?>"> <!-- Query-->
     <input type="hidden" name="state-sess" value="<?php echo $state;?>"> <!-- State-->
     <input type="hidden" name="condition-sess" value="<?php echo $condition;?>"> <!-- Condition-->
     <input type="submit" name="submit" value="Download" class="btn btn-success" style="position:fixed;right:31px;margin-top:455px;">
     </form>
</div>
<div class="alert alert-info" role="alert" style="margin-top:4px;margin-left:460px;text-align:center;width:730px;height:40px;">
    <label style="font-size:20px;margin-top:-5px;"><strong>Filter Result:</strong></label>
     <?php
    echo "<label style='color:green;'><strong>".$state." "."-". " ".$condition."</label></strong>";
     ?>
</div>
   <br>
   <div class="alert alert-secondary" role="alert" style="margin-left:90px;margin-top:-10px;padding-bottom:22px;width:300px;position:absolute;">
 <br>
<?php
$sql5="SELECT * FROM eq_inv";
$result=mysqli_query($conn, $sql5);
$count=mysqli_num_rows($result);
 ?>
     <label>Total equipment:</label>&nbsp<strong style="margin-left:120px;color:blue;"><?php echo $count;?></strong><br>
     <label>Equipment w/ Incomplete data:</label>&nbsp<strong style="margin-left:14px;color:blue;">
       <?php
       $sql6="SELECT * FROM eq_inv WHERE brand='' OR tag_no='' OR serial_no='' OR model_no='' OR ip_add='' OR date_issued='' OR eq_state='' OR eq_condition='' OR date_purch='' OR price='' OR curr_equip_loc=''";
       $result6=mysqli_query($conn,$sql6);
       $row6=mysqli_num_rows($result6);
       echo $row6;?></strong><br>
</div>
   
<div class="filters">
  <?php
}
 ?>
 <script>
         function handleRadio(data){
          window.location="sessionstate.php?q=<?php echo $a;?>&state="+data.value;
         }
         function handleRadiocond(data2){
           window.location="sessioncondition.php?q=<?php echo $a;?>&condition="+data2.value;
         }
 </script>

  <span style="margin-left:120px;">STATE</span><br><br>
  <form style="margin-left:100px;">
  <input type="radio" name="state" id="state" value="allstate" onchange="javascript:handleRadio(this)" <?php echo $state==='allstate' ? 'checked' : '' ?>> All State <br>
  <input type="radio" name="state" id="new" value="new" onchange="javascript:handleRadio(this)" <?php echo $state==='new' ? 'checked' : '' ?>> New <br>
  <input type="radio" name="state" id="old" value="old" onchange="javascript:handleRadio(this)" <?php echo $state==='old' ? 'checked' : '' ?>> Old <br>
  <input type="radio" name="state" id="unknown" value="Unknown state" onchange="javascript:handleRadio(this)" <?php echo $state==='Unknown state' ? 'checked' : '' ?>> Unknown State <br>
  </form>
                                             <!--    -->
  <form action="" method="POST" class="filters2">
  <span style="margin-left:2px;">CONDITION</span><br>
  <input type="radio" name="condition" value="allcondition" onchange="javascript:handleRadiocond(this)" style="margin-left:165px;"<?php echo $condition==='allcondition' ? 'checked' : '' ?>> All Condition <br>
  <input type="radio" name="condition" value="working" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='working' ? 'checked' : '' ?>> Working (1) (2) & (3):
  <?php
  switch($state){
    case "allstate":
    switch($condition){
      case "allcondition":
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "Undistributed":
      if($condition=='working' || $condition=='allcondition'){
        $sql3="SELECT *
        FROM eq_inv
        WHERE eq_condition
        IN ('Available/Unassigned','assigned','Undistributed')
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')";
      }
      if($condition=='Available/Unassigned' || $condition=='assigned' || $condition=='Undistributed'){
        $sql3="SELECT *
        FROM eq_inv
        WHERE eq_condition='$condition'
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')";
      }
      break;
      //so that Working will be zero if these are checked
      case "repair":
      case "missingeq":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
    }
    //Values are allstate and allcondition, Available/Unassigned,working, assigned, undistributed, etc.
    break;
    case "new":
    switch($condition){
      case "allcondition":
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "Undistributed":
      if($condition=='working' || $condition=='allcondition'){
          $sql3 = "SELECT *
          FROM eq_inv
          WHERE eq_state ='new'
          AND eq_condition
          IN ('Available/Unassigned','assigned','Undistributed')
          AND(eq_inv_id LIKE '%$a%'
              OR eq_assign_id='$a'
              OR eqdesc LIKE '%$a%'
              OR brand LIKE '%$a%'
              OR eq_inv.empl_no LIKE '%$a%'
              OR tag_no LIKE '%$a%'
              OR serial_no LIKE '%$a%'
              OR model_no LIKE '%$a%'
              OR ip_add LIKE '%$a%'
              OR curr_equip_loc LIKE '%$a%'
              OR remarks LIKE '%$a%'
              OR par LIKE '%$a%')";
      }
      if($condition=='Available/Unassigned' || $condition=='assigned' || $condition=='Undistributed'){
        $sql3 = "SELECT *
        FROM eq_inv
        WHERE eq_condition='$condition'
        AND eq_state='new'
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')";
      }
      break;
       //so that Working will be zero if these are checked
      case "repair":
      case "missingeq":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
    }
  //Values are new and allcondition, Available/Unassigned,working, assigned, etc.
    break;
    case "old":
    switch($condition){
      case "allcondition":
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "Undistributed":
      if($condition=='working' || $condition=='allcondition'){
          $sql3 = "SELECT *
          FROM eq_inv
          WHERE eq_state='old'
          AND eq_condition
          IN ('Available/Unassigned','assigned','Undistributed')
          AND(eq_inv_id LIKE '%$a%'
              OR eq_assign_id='$a'
              OR eqdesc LIKE '%$a%'
              OR brand LIKE '%$a%'
              OR eq_inv.empl_no LIKE '%$a%'
              OR tag_no LIKE '%$a%'
              OR serial_no LIKE '%$a%'
              OR model_no LIKE '%$a%'
              OR ip_add LIKE '%$a%'
              OR curr_equip_loc LIKE '%$a%'
              OR remarks LIKE '%$a%'
              OR par LIKE '%$a%')";
      }
      if($condition=='Available/Unassigned' || $condition=='assigned' || $condition=='Undistributed'){
        $sql3 = "SELECT *
        FROM eq_inv
        WHERE eq_condition='$condition'
        AND eq_state='old'
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')";
      }
      break;
      //so that Working will be zero if these are checked
      case "repair":
      case "missingeq":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      case "Undistributed":
      $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
    }
  //Values are old and allcondition, Available/Unassigned,working, assigned,Undistributed, etc.
    break;
    case "Unknown state":
    switch($condition){
      case "allcondition":
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "Undistributed":
      if($condition=='working' || $condition=='allcondition' || $condition=='Undistributed'){
          $sql3 = "SELECT *
          FROM eq_inv
          WHERE eq_condition
          IN ('Available/Unassigned','assigned','Undistributed')
          AND eq_state='Unknown state'
          AND(eq_inv_id LIKE '%$a%'
              OR eq_assign_id='$a'
              OR eqdesc LIKE '%$a%'
              OR brand LIKE '%$a%'
              OR eq_inv.empl_no LIKE '%$a%'
              OR tag_no LIKE '%$a%'
              OR serial_no LIKE '%$a%'
              OR model_no LIKE '%$a%'
              OR ip_add LIKE '%$a%'
              OR curr_equip_loc LIKE '%$a%'
              OR remarks LIKE '%$a%'
              OR par LIKE '%$a%')";
      }
      if($condition=='Available/Unassigned' || $condition=='assigned' || $condition=='Undistributed'){
        $sql3 = "SELECT *
        FROM eq_inv
        WHERE eq_condition='$condition'
        AND eq_state='Unknown state'
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')";
      }
      break;
      //so that Working will be zero if these are checked
      case "repair":
      case "missingeq":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
    }
  //Values are Unknown state and allcondition, Available/Unassigned,working,assigned,Undistributed,etc.
    break;
  }
  $result3=mysqli_query($conn,$sql3);
  $countavail=mysqli_num_rows($result3);
  echo "<label style='color:green;margin-left:49px;font-size:22px;'><strong>".$countavail."</strong></label>";
  ?>
  <br>

  <input type="radio" name="condition" value="Available/Unassigned" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='Available/Unassigned' ? 'checked' : '' ?>>(1) Available/Unassigned:
                          <?php
                          switch($state){
                            case "allstate":
                            switch($condition){
                              case "allcondition":
                              case "Available/Unassigned":
                              case "working":
                                $sql3="SELECT *
                                FROM eq_inv
                                WHERE eq_condition='Available/Unassigned'
                                AND(eq_inv_id LIKE '%$a%'
                                    OR eq_assign_id='$a'
                                    OR eqdesc LIKE '%$a%'
                                    OR brand LIKE '%$a%'
                                    OR eq_inv.empl_no LIKE '%$a%'
                                    OR tag_no LIKE '%$a%'
                                    OR serial_no LIKE '%$a%'
                                    OR model_no LIKE '%$a%'
                                    OR ip_add LIKE '%$a%'
                                    OR curr_equip_loc LIKE '%$a%'
                                    OR remarks LIKE '%$a%'
                                    OR par LIKE '%$a%')";
                                break;
                                           //so that Available/Unassigned will be zero if these are checked
                              case "assigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                                $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                            }
                                  //Values are allstate and allcondition, Available/Unassigned,etc.
                            break;
                            case "new":
                            switch($condition){
                              case "allcondition":
                              case "Available/Unassigned":
                              case "working":
                              $sql3 = "SELECT *
                              FROM eq_inv
                              WHERE eq_condition='Available/Unassigned'
                              AND eq_state='new'
                              AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                            break;
                                       //so that Available/Unassigned will be zero if these are checked
                              case "assigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                          }
                                //Values are new and allcondition, Available/Unassigned,etc.
                          break;
                            case "old":
                            switch($condition){
                              case "allcondition":
                              case "Available/Unassigned":
                              case "working":
                            $sql3 = "SELECT *
                            FROM eq_inv
                            WHERE eq_condition='Available/Unassigned'
                            AND eq_state='old'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                                       //so that Available/Unassigned will be zero if these are checked
                              case "assigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                          }
                                //Values are old and allcondition, Available/Unassigned, etc.
                          break;
                            case "Unknown state":
                            switch($condition){
                              case "allcondition":
                              case "Available/Unassigned":
                              case "working":
                            $sql3 = "SELECT *
                            FROM eq_inv
                            WHERE eq_condition='Available/Unassigned'
                            AND eq_state='Unknown state'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id  LIKE '%$a%'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                                       //so that Available/Unassigned will be zero if these are checked
                              case "assigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Values are Unknown state and allcondition, Available/Unassigned,etc.
                          }
                  $result3=mysqli_query($conn,$sql3);
                  $countavail=mysqli_num_rows($result3);
                  echo "<label style='color:green;margin-left:31px;font-size:22px;'><strong>".$countavail."</strong></label>";
                  ?>
                  <br>
  <input type="radio" name="condition" value="assigned" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='assigned' ? 'checked' : '' ?>>(2) Assigned:
                          <?php //EDIT THE COMMENTS
                          switch($state){
                            case "allstate":
                            switch($condition){
                              case "allcondition":
                              case "assigned":
                              case "working":
                              $sql3="SELECT *
                              FROM eq_inv
                              WHERE eq_condition='assigned'
                              AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                              break;
                              //so that assigned will be zero if these are checked
                              case "Available/Unassigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                            }
                            //Values are allstate and allcondition, assigned,etc.
                            break;
                            case "new":
                            switch($condition){
                              case "allcondition":
                              case "assigned":
                              case "working":
                              $sql3 = "SELECT *
                              FROM eq_inv
                              WHERE eq_condition='assigned'
                              AND eq_state='new'
                              AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                              break;
                              //so that assigned will be zero if these are checked
                              case "Available/Unassigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                            }
                            //Values are new and allcondition or assigned
                            break;
                            case "old":
                            switch($condition){
                              case "allcondition":
                              case "assigned":
                              case "working":
                              $sql3 = "SELECT *
                              FROM eq_inv
                              WHERE eq_condition='assigned'
                              AND eq_state='old'
                              AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                              break;
                              //so that assigned will be zero if these are checked
                              case "Available/Unassigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                            }
                            //Values are old and allcondition or assigned
                            break;
                            case "Unknown state":
                            switch($condition){
                              case "allcondition":
                              case "assigned":
                              case "working":
                              $sql3 = "SELECT *
                              FROM eq_inv
                              WHERE eq_condition='assigned'
                              AND eq_state='Unknown state'
                              AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                              break;
                              //so that assigned will be zero if these are checked
                              case "Available/Unassigned":
                              case "repair":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                            }
                            //Values are Unknown state and allcondition or assigned
                            break;
                          }
                          $result3=mysqli_query($conn,$sql3);
                          $countavail=mysqli_num_rows($result3);
                          echo "<label style='color:green;margin-left:111px;font-size:22px;'><strong>".$countavail."</strong></label>";
                          ?>
                          <br>
  <input type="radio" name="condition" value="repair" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='repair' ? 'checked' : '' ?>> For Repair:
                          <?php
                          switch($state){
                            case "allstate":
                            switch($condition){
                              case "allcondition":
                              case "repair":
                              $sql3="SELECT *
                              FROM eq_inv
                              WHERE eq_condition='repair'
                              AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                              break;
                              //so that repair will be zero if these are checked
                              case "working":
                              case "Available/Unassigned":
                              case "assigned":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                            }
                            //Values are allstate and allcondition or repair
                            break;
                            case "new":
                            switch($condition){
                              case "allcondition":
                              case "repair":
                              $sql3 ="SELECT *
                              FROM eq_inv
                              WHERE eq_condition='repair'
                              AND eq_state='new' AND(eq_inv_id LIKE '%$a%'
                                  OR eq_assign_id='$a'
                                  OR eqdesc LIKE '%$a%'
                                  OR brand LIKE '%$a%'
                                  OR eq_inv.empl_no LIKE '%$a%'
                                  OR tag_no LIKE '%$a%'
                                  OR serial_no LIKE '%$a%'
                                  OR model_no LIKE '%$a%'
                                  OR ip_add LIKE '%$a%'
                                  OR curr_equip_loc LIKE '%$a%'
                                  OR remarks LIKE '%$a%'
                                  OR par LIKE '%$a%')";
                              break;
                              //so that repair will be zero if these are checked
                              case "working":
                              case "Available/Unassigned":
                              case "assigned":
                              case "missingpart":
                              case "missingeq":
                              case "defective":
                              case "refurbished":
                              case "Unknown condition":
                              case "Undistributed":
                              $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                            }
                            //Values are new and allcondition or repair
                            break;
                            case "old":
                            switch($condition){
                            case "allcondition":
                            case "repair":
                            $sql3 ="SELECT *
                            FROM eq_inv
                            WHERE eq_condition='repair'
                            AND eq_state='old'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                            //so that repair will be zero if these are checked
                            case "working":
                            case "Available/Unassigned":
                            case "assigned":
                            case "missingpart":
                            case "missingeq":
                            case "defective":
                            case "refurbished":
                            case "Unknown condition":
                            case "Undistributed":
                            $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Values are old and allcondition or repair, etc.
                          break;
                          case "Unknown state":
                          switch($condition){
                            case "allcondition":
                            case "repair":
                            $sql3 = "SELECT *
                            FROM eq_inv
                            WHERE eq_condition='repair'
                            AND eq_state='Unknown state'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                            //so that repair will be zero if these are checked
                            case "working":
                            case "Available/Unassigned":
                            case "assigned":
                            case "missingpart":
                            case "missingeq":
                            case "defective":
                            case "refurbished":
                            case "Unknown condition":
                            case "Undistributed":
                            $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Values are Unknown state and allcondition or repair
                          break;
                        }
                        $result3=mysqli_query($conn,$sql3);
                        $countavail=mysqli_num_rows($result3);
                        echo "<label style='color:green;margin-left:120px;font-size:22px;'><strong>".$countavail."</strong></label>";
                        ?>
                        <br>
                        <input type="radio" name="condition" value="missingpart" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='missingpart' ? 'checked' : '' ?>> W/ Missing Parts:
                        <?php
                        switch($state){
                          case "allstate":
                          switch($condition){
                            case "allcondition":
                            case "missingpart":
                            $sql3="SELECT *
                            FROM eq_inv
                            WHERE eq_condition='missingpart'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                            //so that missingpart will be zero if these are checked
                            case "working":
                            case "Available/Unassigned":
                            case "assigned":
                            case "repair":
                            case "missingeq":
                            case "defective":
                            case "refurbished":
                            case "Unknown condition":
                            case "Undistributed":
                            $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Values are allstate and allcondition, missingpart, etc.
                          break;
                          case "new":
                          switch($condition){
                            case "allcondition":
                            case "missingpart":
                            $sql3 = "SELECT *
                            FROM eq_inv
                            WHERE eq_condition='missingpart'
                            AND eq_state='new'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                            //so that missingpart will be zero if these are checked
                            case "working":
                            case "Available/Unassigned":
                            case "assigned":
                            case "repair":
                            case "missingeq":
                            case "defective":
                            case "refurbished":
                            case "Unknown condition":
                            case "Undistributed":
                            $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Value are new and allcondition missingpart, etc.
                          break;
                          case "old":
                          switch($condition){
                            case "allcondition":
                            case "missingpart":
                            $sql3 = "SELECT *
                            FROM eq_inv
                            WHERE eq_condition='missingpart'
                            AND eq_state='old'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                            //so that missingpasrt will be zero if these are checked
                            case "working":
                            case "Available/Unassigned":
                            case "assigned":
                            case "repair":
                            case "missingeq":
                            case "defective":
                            case "refurbished":
                            case "Unknown condition":
                            case "Undistributed":
                            $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Values are old and allcondition, missingpart, etc.
                          break;
                          case "Unknown state":
                          switch($condition){
                            case "allcondition":
                            case "missingpart":
                            $sql3 = "SELECT *
                            FROM eq_inv
                            WHERE eq_condition='missingpart'
                            AND eq_state='Unknown state'
                            AND(eq_inv_id LIKE '%$a%'
                                OR eq_assign_id='$a'
                                OR eqdesc LIKE '%$a%'
                                OR brand LIKE '%$a%'
                                OR eq_inv.empl_no LIKE '%$a%'
                                OR tag_no LIKE '%$a%'
                                OR serial_no LIKE '%$a%'
                                OR model_no LIKE '%$a%'
                                OR ip_add LIKE '%$a%'
                                OR curr_equip_loc LIKE '%$a%'
                                OR remarks LIKE '%$a%'
                                OR par LIKE '%$a%')";
                            break;
                            //so that missingpart will be zero if these are checked
                            case "working":
                            case "Available/Unassigned":
                            case "assigned":
                            case "repair":
                            case "missingeq":
                            case "defective":
                            case "refurbished":
                            case "Unknown condition":
                            case "Undistributed":
                            $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
                          }
                          //Values are Unknown state and allcondition, missingpart, etc.
                          break;
                        }
                        $result3=mysqli_query($conn,$sql3);
                        $countavail=mysqli_num_rows($result3);
                        echo "<label style='color:green;margin-left:77px;font-size:22px;'><strong>".$countavail."</strong></label>";
                        ?>
                        <br>
  <div class="filters3">  
  <input type="radio" name="condition" value="missingeq" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='missingeq' ? 'checked' : '' ?>> Missing:
    <?php
    switch($state){
    case "allstate":
    switch($condition){
      case "allcondition":
      case "missingeq":
      $sql3="SELECT *
      FROM eq_inv
      WHERE eq_condition='missingeq'
      AND(eq_inv_id LIKE '%$a%'
          OR eq_assign_id='$a'
          OR eqdesc LIKE '%$a%'
          OR brand LIKE '%$a%'
          OR eq_inv.empl_no LIKE '%$a%'
          OR tag_no LIKE '%$a%'
          OR serial_no LIKE '%$a%'
          OR model_no LIKE '%$a%'
          OR ip_add LIKE '%$a%'
          OR curr_equip_loc LIKE '%$a%'
          OR remarks LIKE '%$a%'
          OR par LIKE '%$a%')";
      break;
      //so that missingeq will be zero if these are checked
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "repair":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      case "Undistributed":
      $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
    }
    //Values are allstate and allcondition, missingeq, etc.
    break;
    case "new":
    switch($condition){
      case "allcondition":
      case "missingeq":
      $sql3 = "SELECT *
      FROM eq_inv
      WHERE eq_condition='missingeq'
      AND eq_state='new'
      AND(eq_inv_id LIKE '%$a%'
          OR eq_assign_id='$a'
          OR eqdesc LIKE '%$a%'
          OR brand LIKE '%$a%'
          OR eq_inv.empl_no LIKE '%$a%'
          OR tag_no LIKE '%$a%'
          OR serial_no LIKE '%$a%'
          OR model_no LIKE '%$a%'
          OR ip_add LIKE '%$a%'
          OR curr_equip_loc LIKE '%$a%'
          OR remarks LIKE '%$a%'
          OR par LIKE '%$a%')";
      break;
      //so that missingeq will be zero if these are checked
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "repair":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      case "Undistributed":
      $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
    }
    //Values are new and allcondition, missingeq, etc.
    break;
    case "old":
    switch($condition){
      case "allcondition":
      case "missingeq":
      $sql3 = "SELECT *
      FROM eq_inv
      WHERE eq_condition='missingeq'
      AND eq_state='old'
      AND(eq_inv_id LIKE '%$a%'
          OR eq_assign_id='$a'
          OR eqdesc LIKE '%$a%'
          OR brand LIKE '%$a%'
          OR eq_inv.empl_no LIKE '%$a%'
          OR tag_no LIKE '%$a%'
          OR serial_no LIKE '%$a%'
          OR model_no LIKE '%$a%'
          OR ip_add LIKE '%$a%'
          OR curr_equip_loc LIKE '%$a%'
          OR remarks LIKE '%$a%'
          OR par LIKE '%$a%')";
      break;
      //so that missingeq will be zero if these are checked
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "repair":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      case "Undistributed":
      $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
    }
    //Values are old and allcondition, missingeq, etc.
    break;
    case "Unknown state":
    switch($condition){
      case "allcondition":
      case "missingeq":
      $sql3 = "SELECT *
      FROM eq_inv
      WHERE eq_condition='missingeq'
      AND eq_state='Unknown state'
      AND(eq_inv_id LIKE '%$a%'
          OR eq_assign_id='$a'
          OR eqdesc LIKE '%$a%'
          OR brand LIKE '%$a%'
          OR eq_inv.empl_no LIKE '%$a%'
          OR tag_no LIKE '%$a%'
          OR serial_no LIKE '%$a%'
          OR model_no LIKE '%$a%'
          OR ip_add LIKE '%$a%'
          OR curr_equip_loc LIKE '%$a%'
          OR remarks LIKE '%$a%'
          OR par LIKE '%$a%')";
      break;
      //so that missingeq will be zero if these are checked
      case "working":
      case "Available/Unassigned":
      case "assigned":
      case "repair":
      case "missingpart":
      case "defective":
      case "refurbished":
      case "Unknown condition":
      case "Undistributed":
      $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
    }
    //Values are Unknown state and allcondition, missingeq, etc.
    break;
  }
  $result3=mysqli_query($conn,$sql3);
  $countavail=mysqli_num_rows($result3);
  echo "<label style='margin-left:93px;color:green;font-size:22px;'><strong>".$countavail."</strong></label>";
  ?>
  <br>
  <input type="radio" name="condition" value="defective" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='defective' ? 'checked' : '' ?>> Defective:
  <?php
  switch($state){
  case "allstate":
  switch($condition){
  case "allcondition":
  case "defective":
  $sql3="SELECT *
  FROM eq_inv
  WHERE eq_condition='defective'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that defective will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Values are allstate and allcondition, defective, etc.
  break;
  case "new":
  switch($condition){
  case "allcondition":
  case "defective":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='defective'
  AND eq_state='new'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that defective will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are new and allcondition, defective, etc.
  break;
  case "old":
  switch($condition){
  case "allcondition":
  case "defective":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='defective'
  AND eq_state='old'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that defective will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are old and allcondition, defective, etc.
  break;
  case "Unknown state":
  switch($condition){
  case "allcondition":
  case "defective":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='defective'
  AND eq_state='Unknown state'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that defective will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are Unknown state and allcondition, defective, etc.
  break;
  }
  $result3=mysqli_query($conn,$sql3);
  $countavail=mysqli_num_rows($result3);
  echo "<label style='color:green;margin-left:84px;font-size:22px;'><strong>".$countavail."</strong></label>";
  ?>
  <br>
  <input type="radio" name="condition" value="refurbished" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='refurbished' ? 'checked' : '' ?>> Refurbished:
  <?php
  switch($state){
  case "allstate":
  switch($condition){
  case "allcondition":
  case "refurbished":
  $sql3="SELECT *
  FROM eq_inv
  WHERE eq_condition='refurbished'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that refurbished will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are allstate and allcondition, refurbished, etc.
  break;
  case "new":
  switch($condition){
  case "allcondition":
  case "refurbished":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='refurbished'
  AND eq_state='new'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that refurbished will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Values are new and allcondition, refurbished, etc.
  break;
  case "old":
  switch($condition){
  case "allcondition":
  case "refurbished":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='refurbished'
  AND eq_state='old'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that refurbished will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are old and allcondition, refurbished, etc.
  break;
  case "Unknown state":
  switch($condition){
  case "allcondition":
  case "refurbished":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='refurbished'
  AND eq_state='Unknown state'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that refurbished will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "Unknown condition":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are Unknown state and allcondition, refurbished, etc.
  break;
  }
  $result3=mysqli_query($conn,$sql3);
  $countavail=mysqli_num_rows($result3);
  echo "<label style='color:green;margin-left:68px;font-size:22px;'><strong>".$countavail."</strong></label>";
  ?><br>

<input type="radio" name="condition" value="Undistributed" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='Undistributed' ? 'checked' : '' ?>> (3) Undistributed:
<?php
  switch($state){
  case "allstate":
  switch($condition){
  case "allcondition":
  case "Undistributed":
  case "working":
  $sql3="SELECT *
  FROM eq_inv
  WHERE eq_condition='Undistributed'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Undistributed will be zero if these are checked
  
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Values are allstate and allcondition, Undistributed, etc.
  break;
  case "new":
  switch($condition){
  case "allcondition":
  case "Undistributed":
  case "working":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='Undistributed'
  AND eq_state='new'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Undistributed will be zero if these are checked
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  $sql3="SELECT *FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are new and allcondition, Undistributed, etc.
  break;
  case "old":
  switch($condition){
  case "allcondition":
  case "Undistributed":
  case "working":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='Undistributed'
  AND eq_state='old'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Undistributed will be zero if these are checked
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are old and allcondition, Undistributed, etc.
  break;
  case "Unknown state":
  switch($condition){
  case "allcondition":
  case "Undistributed":
  case "working":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='Undistributed'
  AND eq_state='Unknown state'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Undistributed will be zero if these are checked

  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "refurbished":
  case "Unknown condition":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are Unknown state and allcondition, Undistributed, etc.
  break;
  }
  $result3=mysqli_query($conn,$sql3);
  $countavail=mysqli_num_rows($result3);
  echo "<label style='color:green;margin-left:35px;font-size:22px;'><strong>".$countavail."</strong></label>";
  ?>
  <br>

  <input type="radio" name="condition" value="Unknown condition" onchange="javascript:handleRadiocond(this)" <?php echo $condition==='Unknown condition' ? 'checked' : '' ?>> Unknown Condition:
  <?php
  switch($state){
  case "allstate":
  switch($condition){
  case "allcondition":
  case "Unknown condition":
  $sql3="SELECT *
  FROM eq_inv
  WHERE eq_condition='Unknown condition'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Unknown condition will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "refurbished":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Value are allstate and allcondition, Unknown condition, etc.
  break;
  case "new":
  switch($condition){
  case "allcondition":
  case "Unknown condition":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='Unknown condition'
  AND eq_state='new'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Unknown condition will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "refurbished":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Values are new and allcondition, Unknown condition, etc.
  break;
  case "old":
  switch($condition){
  case "allcondition":
  case "Unknown condition":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='Unknown condition'
  AND eq_state='old'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Unknown condition will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "refurbished":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Values are old and allcondition, Unknown condition, etc.
  break;
  case "Unknown state":
  switch($condition){
  case "allcondition":
  case "Unknown condition":
  $sql3 = "SELECT *
  FROM eq_inv
  WHERE eq_condition='Unknown condition'
  AND eq_state='Unknown state'
  AND(eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')";
  break;
  //so that Unknown condition will be zero if these are checked
  case "working":
  case "Available/Unassigned":
  case "assigned":
  case "repair":
  case "missingpart":
  case "missingeq":
  case "defective":
  case "refurbished":
  case "Undistributed":
  $sql3="SELECT * FROM eq_inv WHERE eq_condition='none'";
  }
  //Values are Unknown state and allcondition, Unknown condition, etc.
  break;
  }
  $result3=mysqli_query($conn,$sql3);
  $countavail=mysqli_num_rows($result3);
  echo "<label style='color:green;margin-left:15px;font-size:22px;'><strong>".$countavail."</strong></label>";
  ?>
  <br>
</div>
</form>
</div>

<?php
if($position=='IT Admin' OR 'HR and Admin Manager'){
   ?>

<?php
}
 ?>
<?php
//invid
function createRandominvid() {
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
$invid='EQ-'.createRandominvid();
$section=$_GET['section'];
if($section=='addeq'){
?>
<div>
<form action="saveitem.php" method="POST" id="additem" style="margin-left:250px;margin-right:250px;margin-top:170px;margin-bottom:-205px;background-color:white;position:relative;border-style:solid;border-width:1px;border-color:#DCDCDC  ;">
<span style="margin-left:10px;">ID:</span>
<input type="text" name="invid" value="<?php echo $invid;?>" style="width:150px; background-color:gray;color:white;" class="form-control" readonly>
<hr />
<span style="margin-left:10px;">Equipment Description:&nbsp</span><select name="eqdesc" class="form-control" style="height:35px;width:200px;" required>
      <option></option>
<?php
$sql=(
  "SELECT *
  FROM eq_desc
  GROUP BY eqdesc
  ");
$result=mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
 ?>
  <option><?php echo $row['eqdesc'];?></option>
  <?php
   }
   ?>
</select>
<span>State:</span>
<select name="eq_state" class="form-control" style="height:35px;width:200px;" required>
  <option></option>
  <option>New</option>
  <option>Old</option>
  <option>Unknown state</option>
</select><br><br>
<span style="margin-left:10px;">Condition: </span>
<select name="eq_condition" class="form-control" style="height:35px;width:200px;" required>
<option></option>
<option>Available/Unassigned</option>
<option value="repair">For repair</option>
<option value="missingpart">W/ missing parts</option>
<option value="missingeq">Missing EQ</option>
<option value="defective">Defective EQ</option>
<option value="refurbished">Refurbished</option>
<option>Unknown condition</option>
</select>
<span>Equipment Location: </span>
  <select name="loc" class="form-control" style="height:35px;width:300px;" required>
        <option></option>
  <?php
  $sql=(
    "SELECT *
    FROM deployment
    ORDER BY DEPLOYMENT
    DESC
    ");
  $result=mysqli_query($conn, $sql);
  for($i=0; $row = mysqli_fetch_assoc($result); $i++){
   ?>
    <option><?php echo $row['deployment'];?></option>
    <?php
     }
     ?>
  </select><br><br>
<span style="margin-left:10px;">Brand:</span><select name="brand" class="form-control" style="margin-left:32px;height:35px;width:200px;" >
      <option></option>
<?php
$sql=(
  "SELECT *
  FROM brand
  GROUP BY brand
  ");
$result=mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
 ?>
  <option><?php echo $row['brand'];?></option>
  <?php
   }
   ?>
</select>
  <span>Tag No.: </span><input type="text" name="tag_no" class="form-control" style="height:35px;width:200px;"><br><br>
  <span style="margin-left:10px;">Serial No.: </span><input type="text" name="serial_no" class="form-control" style="margin-left:1px;height:35px;width:200px;">
  <span>Model No. </span><input type="text" name="model_no" class="form-control" style="height:35px;width:200px;"><br><br>
  <span style="margin-left:10px;">IP Address:</span><input type="text" name="ip_add" class="form-control" style="height:35px;width:200px;">
  
  <span>Date Purchased:</span>
  <input type="date" name="date_purch" class="form-control" style="height:35px;width:200px;"><br><br>
  <span style="margin-left:10px;">Price:</span>
  <input type="number" name="price" class="form-control" style="margin-left:34px;height:35px;width:200px;">
  
<span style="margin-left:10px;">Remarks:</span><textarea name="remarks" class="form-control" style="margin-left:14px;height:35px;width:200px;"></textarea><br><br>
 <input type="submit" value="Add Equipment" class="btn btn-success btn-lg" style="padding:4px;margin-left:555px;font-size:15px;"><br><br>
</form>
<a href="equipment.php?section="><button class="btn btn-danger btn-lg" style="padding:4px;margin-top:148px;position:absolute; font-size:15px; margin-left:929px;">Close</button></a>
<?php
}
?>
</div>
<div class="equipinv-table">
<table id = "equipments" style="margin-top:250px;">
<thead>
  <?php

  if($sec=='all'){
    ?>
	<tr>
  <th width="4%">Action</th>
  <th width="9%"> EQ ID </th>
  <th width="12%"> EQ Description </th>
  <th width="10%"> Firstname </th>
  <th width="10%"> Middlename </th>
  <th width="10%"> Lastname </th>
	<th width="12%"> Brand </th>
  <th width="12%"> Serial Number </th>
  <th width="2%"> State </th>
  <th width="15%"> Condition </th>
  <th width="30%"> Location </th>
</tr>
<?php
}
if($sec=='equipment'){
  ?>
  <tr>
  <th width="4%">Action</th>
  <th width="9%"> EQ ID </th>
  <th width="12%"> EQ Description </th>
  <th width="12%"> Brand </th>
  <th width="12%"> Serial Number </th>
  <th width="8%"> State </th>
  <th width="12%"> Condition </th>
  <th width="12%"> Price </th>
  <th width="30%"> Location </th>
</tr>
<?php
}
if($sec=='brand'){
 ?>
 <tr>
 <th width="4%">Action</th>
 <th width="9%"> EQ ID </th>
 <th width="12%"> Brand </th>
 <th width="12%"> EQ Description </th>
 <th width="12%"> Serial Number </th>
 <th width="8%"> State </th>
 <th width="12%"> Condition </th>
 <th width="30%"> Location </th>
</tr>
<?php
}
if($sec=='tag'){
  ?>
  <tr>
  <th width="4%">Action</th>
  <th width="9%"> EQ ID </th>
  <th width="9%"> Tag Number </th>
  <th width="12%"> EQ Description </th>
  <th width="12%"> Brand </th>
  <th width="12%"> Serial Number </th>
  <th width="8%"> State </th>
  <th width="12%"> Condition </th>
  <th width="30%"> Location </th>
 </tr>
 <?php
}
if($sec=='serial'){
 ?>
 <tr>
 <th width="4%">Action</th>
 <th width="9%"> EQ ID </th>
 <th width="12%"> Serial Number </th>
 <th width="12%"> EQ Description </th>
 <th width="12%"> Brand </th>
 <th width="8%"> State </th>
 <th width="12%"> Condition </th>
 <th width="30%"> Location </th>
</tr>
<?php
}
if($sec=='model'){
 ?>
 <tr>
 <th width="4%">Action</th>
 <th width="9%"> EQ ID </th>
 <th width="12%"> Model Number </th>
 <th width="12%"> EQ Description </th>
 <th width="12%"> Brand </th>
 <th width="12%"> Serial Number </th>
 <th width="8%"> State </th>
 <th width="12%"> Condition </th>
 <th width="30%"> Location </th>
</tr>
<?php
}
if($sec=='location'){
 ?>
 <tr>
 <th width="4%">Action</th>
 <th width="9%"> EQ ID </th>
 <th width="30%"> Location </th>
 <th width="12%"> EQ Description </th>
 <th width="12%"> Brand </th>
 <th width="12%"> Serial Number </th>
 <th width="8%"> State </th>
 <th width="12%"> Condition </th>
</tr>
<?php
}
if($sec=='remark'){
 ?>
 <tr>
 <th width="4%">Action</th>
 <th width="9%"> EQ ID </th>
 <th width="20%"> Remarks </th>
 <th width="12%"> EQ Description </th>
 <th width="12%"> Brand </th>
 <th width="12%"> Serial Number </th>
 <th width="8%"> State </th>
 <th width="12%"> Condition </th>
 <th width="25%"> Location </th>
 </tr>
 <?php
}
if($sec=='par'){
  ?>
  <tr>
 <th width="4%">Action</th>
 <th width="9%"> EQ ID </th>
 <th width="20%"> PAR/MR </th>
 <th width="12%"> EQ Description </th>
 <th width="12%"> Brand </th>
 <th width="12%"> Serial Number </th>
 <th width="8%"> State </th>
 <th width="12%"> Condition </th>
 <th width="25%"> Location </th>
 </tr>
 <?php
}
?>
</thead>
<tbody>

<?php
if($state=='allstate' && $condition=='allcondition'){
  $sql = (
    "SELECT *
     from eq_inv
     left JOIN empl_tbl
        on eq_inv.empl_no=empl_tbl.empl_no
     WHERE
       eq_inv_id LIKE '%$a%'
       OR eq_assign_id='$a'
       OR eqdesc LIKE '%$a%'
       OR brand LIKE '%$a%'
       OR eq_inv.empl_no LIKE '%$a%'
       OR tag_no LIKE '%$a%'
       OR serial_no LIKE '%$a%'
       OR model_no LIKE '%$a%'
       OR ip_add LIKE '%$a%'
       OR curr_equip_loc LIKE '%$a%'
       OR remarks LIKE '%$a%'
       OR par LIKE '%$a%'
     AND (eq_state='new'
       OR eq_state='old'
       OR eq_state='Unknown state')
     AND (eq_condition='Available/Unassigned'
       OR eq_condition='assigned'
       OR eq_condition='repair'
       OR eq_condition='missingpart'
       OR eq_condition='missingeq'
       OR eq_condition='refurbished'
       OR eq_condition='Unknown condition'
       OR eq_condition='Undistributed')
     ORDER BY empl_firstname
          , empl_lastname
          , middlename  ASC"
      );
    }

elseif($state=='allstate' AND ($condition=='Available/Unassigned' OR $condition=='assigned' OR   $condition=='repair' OR $condition=='missingpart' OR $condition=='missingeq' OR $condition=='defective' OR $condition=='refurbished' OR $condition=='Unknown condition' OR $condition=='Undistributed')){
  $sql = (
    "SELECT *
    from eq_inv
    left JOIN empl_tbl
      on eq_inv.empl_no=empl_tbl.empl_no
    WHERE
    eq_condition='$condition'
    AND (eq_state='new'
      OR eq_state='old'
      OR eq_state='Unknown state')
    AND (eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')
    ORDER BY empl_firstname
      , empl_lastname
      , middlename  ASC"
      );
    }
elseif($condition=='allcondition' AND ($state=='new' OR $state=='old' OR $state=='Unknown state')){
  $sql = (
    "SELECT *
    from eq_inv
    left JOIN empl_tbl
      on eq_inv.empl_no=empl_tbl.empl_no
      WHERE eq_state='$state'
      AND (eq_condition='Available/Unassigned'
        OR eq_condition='assigned'
        OR eq_condition='repair'
        OR eq_condition='missingpart'
        OR eq_condition='missingeq'
        OR eq_condition='refurbished'
        OR eq_condition='Unknown condition'
        OR eq_condition='Undistributed')
      AND (eq_inv_id LIKE '%$a%'
          OR eq_assign_id='$a'
          OR eqdesc LIKE '%$a%'
          OR brand LIKE '%$a%'
          OR eq_inv.empl_no LIKE '%$a%'
          OR tag_no LIKE '%$a%'
          OR serial_no LIKE '%$a%'
          OR model_no LIKE '%$a%'
          OR ip_add LIKE '%$a%'
          OR curr_equip_loc LIKE '%$a%'
          OR remarks LIKE '%$a%'
          OR par LIKE '%$a%')
      ORDER BY empl_firstname
        , empl_lastname
        , middlename  ASC"
      );
    }
elseif($condition=='working' AND ($state=='new' OR $state=='old' OR $state=='Unknown state')){
            $sql = (
              "SELECT *
              from eq_inv
              left JOIN empl_tbl
                on eq_inv.empl_no=empl_tbl.empl_no
              WHERE
                eq_state='$state'
                AND(eq_inv_id LIKE '%$a%'
                    OR eq_assign_id='$a'
                    OR eqdesc LIKE '%$a%'
                    OR brand LIKE '%$a%'
                    OR eq_inv.empl_no LIKE '%$a%'
                    OR tag_no LIKE '%$a%'
                    OR serial_no LIKE '%$a%'
                    OR model_no LIKE '%$a%'
                    OR ip_add LIKE '%$a%'
                    OR curr_equip_loc LIKE '%$a%'
                    OR remarks LIKE '%$a%'
                    OR par LIKE '%$a%')
                AND (eq_condition='Available/Unassigned'
                    OR eq_condition='assigned' OR eq_condition='Undistributed')
                ORDER BY empl_firstname
                    , empl_lastname
                    , middlename  ASC"
                    );
                    }
elseif($condition=='working' AND ($state=='allstate')){
                    $sql = ("SELECT *
                      from eq_inv
                      left JOIN empl_tbl
                        on eq_inv.empl_no=empl_tbl.empl_no
                      WHERE eq_condition IN ('Available/Unassigned','assigned','Undistributed')
                      AND eq_state IN ('new'
                      ,'old'
                      ,'Unknown state')
                      AND(eq_inv_id LIKE '%$a%'
                          OR eq_assign_id='$a'
                          OR eqdesc LIKE '%$a%'
                          OR brand LIKE '%$a%'
                          OR eq_inv.empl_no LIKE '%$a%'
                          OR tag_no LIKE '%$a%'
                          OR serial_no LIKE '%$a%'
                          OR model_no LIKE '%$a%'
                          OR ip_add LIKE '%$a%'
                          OR curr_equip_loc LIKE '%$a%'
                          OR remarks LIKE '%$a%'
                          OR par LIKE '%$a%')
                      ORDER BY empl_firstname
                        , empl_lastname
                        , middlename  ASC"
                      );
                    }
else{
		$sql = (
      "SELECT *
      from eq_inv
      left JOIN empl_tbl
        on eq_inv.empl_no=empl_tbl.empl_no
        WHERE eq_state='$state'
        AND eq_condition='$condition'
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')
        ORDER BY empl_firstname
        , empl_lastname
        , middlename  ASC"
      );
    }
		$result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
          if ($sec=='all'){
                      ?>
        <tr>
          <td>
            <!-- Button trigger modal -->
           <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
          </td>
          <td><?php echo $row['eq_inv_id']; ?></td>
          <td style="font-size:16px;"><STRONG><?php echo $row['eqdesc'];?></STRONG></td>
          <td style="color:green; font-size:15px;"><strong><a href="timeline.php?emp_no=<?php echo $row['empl_no'];?>" style="color:inherit;"><?php echo $row['empl_firstname']; ?></a></strong></td>
          <td style="color:green; font-size:15px;"><strong><a href="timeline.php?emp_no=<?php echo $row['empl_no'];?>" style="color:inherit;"><?php echo $row['middlename']; ?></a></strong></td>
          <td style="color:green; font-size:15px;"><strong><a href="timeline.php?emp_no=<?php echo $row['empl_no'];?>" style="color:inherit;"><?php echo $row['empl_lastname']; ?></a></strong></td>
          <td><?php echo $row['brand']; ?></td>
        	<td><?php echo $row['serial_no']; ?></td>
        	<td><?php echo $row['eq_state']; ?></td>
        	<td><?php echo $row['eq_condition']; ?></td>
          <td><?php echo $row['curr_equip_loc']; ?></td>
        </tr>
        <?php
      }
      if($sec=='equipment'){
        ?>
        <tr>
          <td>
            <!-- Button trigger modal -->
          <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
          </td>
          <td><?php echo $row['eq_inv_id']; ?></td>
          <td style="font-size:16px;"><STRONG><?php echo $row['eqdesc'];?></STRONG></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['serial_no']; ?></td>
          <td><?php echo $row['eq_state']; ?></td>
          <td><?php echo $row['eq_condition']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['curr_equip_loc']; ?></td>
        </tr>
          <?php
            }
        if($sec=='brand'){
          ?>
          <tr>
            <td>
              <!-- Button trigger modal -->
             <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
            </td>
            <td><?php echo $row['eq_inv_id']; ?></td>
            <td style="font-size:16px;"><STRONG><?php echo $row['brand']; ?></STRONG></td>
            <td><?php echo $row['eqdesc'];?></td>
            <td><?php echo $row['serial_no']; ?></td>
            <td><?php echo $row['eq_state']; ?></td>
            <td><?php echo $row['eq_condition']; ?></td>
            <td><?php echo $row['curr_equip_loc']; ?></td>
          </tr>
          <?php
              }
            if($sec=='tag'){
            ?>
            <tr>
            <td>
            <!-- Button trigger modal -->
           <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
          </td>
          <td><?php echo $row['eq_inv_id']; ?></td>
          <td style="font-size:16px;"><STRONG><?php echo $row['tag_no']; ?></STRONG></td>
          <td><?php echo $row['eqdesc'];?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['serial_no']; ?></td>
          <td><?php echo $row['eq_state']; ?></td>
          <td><?php echo $row['eq_condition']; ?></td>
          <td><?php echo $row['curr_equip_loc']; ?></td>
        </tr>
        <?php
      }
      if($sec=='serial'){
      ?>
    <tr>
    <td>
      <!-- Button trigger modal -->
     <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
    </td>
    <td><?php echo $row['eq_inv_id']; ?></td>
    <td style="font-size:16px;"><STRONG><?php echo $row['serial_no']; ?></STRONG></td>
    <td><?php echo $row['eqdesc'];?></td>
    <td><?php echo $row['brand']; ?></td>
    <td><?php echo $row['eq_state']; ?></td>
    <td><?php echo $row['eq_condition']; ?></td>
    <td><?php echo $row['curr_equip_loc']; ?></td>
  </tr>
  <?php
    }
    if($sec=='model'){
      ?>
      <tr>
      <td>
        <!-- Button trigger modal -->
       <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
      </td>
      <td><?php echo $row['eq_inv_id']; ?></td>
      <td style="font-size:16px;"><STRONG><?php echo $row['model_no']; ?></STRONG></td>
      <td><?php echo $row['eqdesc'];?></td>
      <td><?php echo $row['brand']; ?></td>
      <td><?php echo $row['serial_no']; ?></td>
      <td><?php echo $row['eq_state']; ?></td>
      <td><?php echo $row['eq_condition']; ?></td>
      <td><?php echo $row['curr_equip_loc']; ?></td>
      </tr>
      <?php
          }
  if($sec=='location'){
          ?>
          <tr>
          <td>
            <!-- Button trigger modal -->
           <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
          </td>
          <td><?php echo $row['eq_inv_id']; ?></td>
          <td style="font-size:16px;"><STRONG><?php echo $row['curr_equip_loc']; ?></STRONG></td>
          <td><?php echo $row['eqdesc'];?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['serial_no']; ?></td>
          <td><?php echo $row['eq_state']; ?></td>
          <td><?php echo $row['eq_condition']; ?></td>
          </tr>
<?php
}
  if($sec=='remark'){
    ?>
    <tr>
    <td>
      <!-- Button trigger modal -->
     <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
    </td> <!-- End of Button trigger modal -->
    <td><?php echo $row['eq_inv_id']; ?></td>
    <td style="font-size:16px;"><STRONG><?php echo $row['remarks']; ?></STRONG></td>
    <td><?php echo $row['eqdesc'];?></td>
    <td><?php echo $row['brand']; ?></td>
    <td><?php echo $row['serial_no']; ?></td>
    <td><?php echo $row['eq_state']; ?></td>
    <td><?php echo $row['eq_condition']; ?></td>
    <td><?php echo $row['curr_equip_loc']; ?></td>
    </tr>
    <?php
  }
   if($sec=='par'){
    ?> 
    <tr>
    <td>
      <!-- Button trigger modal -->
     <button type="button" style="font-size:9px;padding:4px;" value="<?php echo $row['eq_inv_id'];?>" onclick="foggyDetails(this)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">VIEW</button>
    </td> <!-- End of Button trigger modal -->
    <td><?php echo $row['eq_inv_id']; ?></td>
    <td style="font-size:16px;"><STRONG><a href=""><?php echo $row['par']; ?></a></STRONG></td>
    <td><?php echo $row['eqdesc'];?></td>
    <td><?php echo $row['brand']; ?></td>
    <td><?php echo $row['serial_no']; ?></td>
    <td><?php echo $row['eq_state']; ?></td>
    <td><?php echo $row['eq_condition']; ?></td>
    <td><?php echo $row['curr_equip_loc']; ?></td>
    </tr>
    <?php
  }
}
 ?>
</tbody>
</table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">EQUIPMENT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary popover-test" data-toggle="modal" data-target="#historyModal" id="button-history" style="float:right;">EQ History</button>
        <label>PAR No.:<strong><span id="foggy17" style="margin-left:83px;">&nbsp;</span></strong><br>
        <label>Equipment ID:<strong><span id="foggy" style="margin-left:44px;"></span></strong><br>
        <label>Employee Number:<strong><span id="foggy2" style="margin-left:9px;"></span></strong><br>
        <label>Employee Name:<strong>

          <a href="#" onclick="jibu()"><span id="foggy3" style="margin-left:20px;"></span>&nbsp;<span id="foggy4"></span>&nbsp;<span id="foggy18"></span></a>
        </strong><br>
        <label>Description:<strong><span id="foggy5" style="margin-left:60px;"></span></strong><br>
        <label>Brand:<strong><span id="foggy19" style="margin-left:100px;"></span></strong><br>
        <label>Tag No.:<strong><span id="foggy6" style="margin-left:89px;"></span></strong><br>
        <label>Serial No.:<strong><span id="foggy7" style="margin-left:75px;"></span></strong><br>
        <label>Model No.:<strong><span id="foggy8" style="margin-left:69px;"></span></strong><br>
        <label>IP Address:<strong><span id="foggy9" style="margin-left:70px;"></span></strong><br>
        <label>Date Issued:<strong><span id="foggy10" style="margin-left:60px;"></span></strong><br>
        <label>EQ State:<strong><span id="foggy11" style="margin-left:80px;"></span></strong><br>
        <label>EQ Condition:<strong><span id="foggy12" style="margin-left:46px;"></span></strong><br>
        <label>Date Purchased:<strong><span id="foggy13" style="margin-left:30px;"></span></strong><br>
        <label>Price:<strong><span id="foggy14" style="margin-left:105px;"></span></strong><br>
        <label>Location:<strong><span id="foggy15" style="margin-left:78px;"></span></strong><br>
        <label>Remarks:<strong><span id="foggy16" style="margin-left:80px;"></span></strong>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php
          if($position=='IT Admin'){
            ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update</button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Remove</button>
        <?php
      }
       ?>
      </div>
    </div>
  </div>
</div>

<!--Remove Confirmation-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:red;"><b>WARNING!</b></h5>
        <button type="button" class="close" data-target="#exampleModalCenter" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Removing the equipment from the inventory will erase the equipment history of the equipment. If the equipment is assigned, it will also be removed from the list of assigned equipment of the employee.<br> Press Yes to delete the equipment?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="dontremove" onclick="unloadScrollBars()">No</button>
        <button type="button" class="btn btn-primary" id="remove-eq" onclick="medi()">Yes</button>
      </div>
    </div>
  </div>
</div>

<!--Update modal-->
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
          <select name="update-brand" class="custom-select" style="margin-left:119px;width:250px;" id="figib3">
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
              <option value="assigned">Assigned</option>
              <option>Available/Unassigned</option>
              <option value="repair">For repair</option>
              <option value="missingeq">Missing EQ</option>
              <option value="missingpart">W/ missing part(s)</option>
              <option value="refurbished">Refurbished</option>
              <option>Undistributed</option>
          </select><br>
          <label>Date Purchased</label>
          <input type="date" name="update-purch" class="form-control" style="margin-left:50px;width:200px;" id="figib11"><br>
          <label>Age</label>
          <input type="text" name="" readonly class="form-control" style="margin-left:132px;background-color:#ccc;width:200px;"><br>
          <label>Price</label>
          <input type="number" name="update-price" class="form-control" style="width:200px;margin-left:126px;" id="figib12"><br>
          <label>Location</label>
          <select  name="update-loc"  class="custom-select" style="margin-left:100px; width:500px;" id="figib13">
              <option></option>
            <?php
            $sql4="SELECT * FROM deployment GROUP BY deployment";
            $result=mysqli_query($conn, $sql4);
            while($row=mysqli_fetch_assoc($result)){
             ?>
            <option><?php echo $row['deployment'];?></option>
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

<!--eq history-->
<!-- Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Equipment History Record</h5>
        <button type="button" class="close" onclick="eraseFunction()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<label><strong>Employees:&nbsp</strong></label>
      <div class="modal-body">
        <div id="eqoutput"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="eraseFunction()">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){

//add and remove scroll in modal
  $('#dontremove').click(function(){
  $('#exampleModal').modal("hide");
  document.getElementById("exampleModalCenter").style.overflow ="scroll";
  });

  $('#button-history').click(function(){
    $("#historyModal").modal({
       show: false,
       backdrop: 'static'
   });

      document.getElementById("historyModal").style.overflow ="scroll";

    $.ajax({
      url: "historyeq.php",
      method: "POST",
    ContentType:'application/javascript',
      data: {"id" : figi1},
      success:function(response3){

      // Parsing the JSON string to javascript object
      var fab= JSON.parse(response3);

      //Displaying in proper field
     $.each(fab, function(key, value){
      document.getElementById("eqoutput").innerHTML += '<br><label style="color:red;">'+ value.employee_no + '</label>' + '&nbsp' + value.par_no +  '&nbsp' + '<strong>' + value.date_issued_his + '</strong>' + '<hr />';
      });

                }
            });
        });
});

function unloadScrollBars(){
   document.documentElement.style.overflow = 'hidden';
   document.body.scroll = "no";
 }

function foggyDetails(details){
  var invId = details.value;
  $.ajax({
    url: "test.php",
    method: "GET",
    data: {"invId": invId},
    success: function(response) {

      // Parsing the JSON string to javascript object
      var reu = JSON.parse(response);

      //Displaying in proper field
      $("#foggy").text(reu.eq_inv_id);
      $("#jibu").text(reu.eq_inv_id);
      $("#foggy2").text(reu.empl_no);
      $("#foggy5").text(reu.eqdesc);
      $("#foggy6").text(reu.tag_no);
      $("#foggy7").text(reu.serial_no);
      $("#foggy8").text(reu.model_no);
      $("#foggy9").text(reu.ip_add);
      $("#foggy10").text(reu.date_issued);
      $("#foggy11").text(reu.eq_state);
      $("#foggy12").text(reu.eq_condition);
      $("#foggy13").text(reu.date_purch);
      $("#foggy14").text(reu.price);
      $("#foggy15").text(reu.curr_equip_loc);
      $("#foggy16").text(reu.remarks);
      $("#foggy17").text(reu.par);
      $("#foggy19").text(reu.brand);
      $("#foggy20").text(reu.eq_inv_id);

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

     var name = reu.empl_no;
     jeban = reu.empl_no;
     figa = reu.eq_inv_id;

     $.ajax({
       url: "returnname.php",
       method: "GET",
       data: {"name": name},
       success:function(response2){

         // Parsing the JSON string to javascript object
         var figi= JSON.parse(response2);

           //Displaying in proper field
           $("#foggy3").text(figi.empl_firstname);
           $("#foggy4").text(figi.middlename);
           $("#foggy18").text(figi.empl_lastname);
       }
     });
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
}  //end of foggyDetails

function jibu(){
  window.location="about.php?section=overview&selaction=&action=&emp_no="+jeban;
  }

function medi(){
window.location="eqremove.php?id="+figa;
}

function eraseFunction(){
        document.getElementById("eqoutput").innerHTML="";
        $('#historyModal').modal('hide');
        unloadScrollBars();
        document.getElementById("exampleModalCenter").style.overflow ="scroll";
    }
</script>

 <div id="footer" class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
</html>
