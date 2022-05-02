<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
$position=$_SESSION['SESS_ROLE'];
?>
</head>

<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='IT Admin' || $position=='Admin Staff'){
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
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <li><a href="reorder.php">Make Reorder Request</a></li>
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
    <?php
}
if($position=='HR and Admin Manager')
{
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
<div class="vertical-nav">
  <ul>
      <li><a href="transaction.php">Transaction Feeds</a></li>
      <li><a href="deleq.php">Deleted Equipment</a></li>
       <!--<li><a href="">Pending employee assignments</a></li> -->
      <!-- <li><a href="">Pending deployment/project site assignments</a></li> -->
      <hr />
        </ul>
      </div>
    <div style="background-color:white;margin-left:399px;margin-right:350px;font-size:30px;font-family:arial;border-color:#DCDCDC;border-style:solid;border-width:1px;border-radius:2px;color:#060737;">Transactions</div>
        <div class="aboutcontent-div-transac"><br><br>
                                              <br><br>
    <?php
    $sql="SELECT * FROM transac_inv ORDER BY transac_uid DESC";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
      ?>
      <div style="border-style:solid;border-color:#DCDCDC;border-width:1px;border-radius:5px;margin:10px;background-color:white;width:600px;">

        <?php
        $bbb=$row['transac_eqid'];
        $sql4="SELECT * FROM eq_inv WHERE eq_inv_id='$bbb'";
        $result4=mysqli_query($conn,$sql4);
        while($row4=mysqli_fetch_assoc($result4)){
          $desc=$row4['eqdesc'];
          $par=$row4['par'];
        }

            if ($row['transac_type']=='Assigned an Equipment'){
            ?>
           Unique ID: <?php echo $row['transac_uid'];?> <label style="float:right;"><?php echo $row['transac_date'];?></label><br>
            <?php echo $row['transac_pos'];?>
            <?php echo $row['transac_type'];?> :

            <?php
            $hh=$row['transac_eqid'];
            $sql4="SELECT * FROM eq_inv WHERE eq_inv_id='$hh'";
            $result4=mysqli_query($conn,$sql4);
            while($row4=mysqli_fetch_assoc($result4)){
              echo "<strong><a href='equipment.php?section=all&q=$hh'>" . $row4['eqdesc'] . "</a></strong>";
            }
            echo " to ";
              $ff=$row['transac_empl'];
            $sql3="SELECT * FROM empl_tbl WHERE empl_no='$ff'";
            $result3=mysqli_query($conn,$sql3);
            while($row3=mysqli_fetch_assoc($result3)){
             echo "<a href='timeline.php?emp_no=$ff'>". $row3['empl_firstname'] . " " . $row3['middlename'] . " ". $row3['empl_lastname'] . "</a>";
            }
            echo " ". $row['transac_loc'];
            $sql7="SELECT * FROM eq_inv WHERE eq_inv_id = '$hh'";
            $result7=mysqli_query($conn,$sql7);
            while($row7=mysqli_fetch_assoc($result7)){
              $par=$row7['par'];
              echo " ". "<a href='viewpar.php?par=$par'>" . $row7['par'] . "</a>";
            }
          }
        if($row['transac_type']=='Transferred an Equipment'){
          $rr=$row['transac_transferredto'];
          $sql11="SELECT * FROM empl_tbl WHERE empl_no='$rr'";
          $result11=mysqli_query($conn,$sql11);
          while($row11=mysqli_fetch_assoc($result11)){
            $ee=$row['transac_eqid'];
            $sql12="SELECT * FROM eq_inv WHERE eq_inv_id='$ee'";
            $result12=mysqli_query($conn,$sql12);
            while($row12=mysqli_fetch_assoc($result12)){

            echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>" . $row['transac_pos'] ." ". $row['transac_type'] . ": "."<strong>". "<a href='equipment.php?section=all&q=$ee'>" . $row12['eqdesc'] . "</a>" . "</strong>" . " to " . "<a href='timeline.php?emp_no=$rr'>" . $row11['empl_firstname'] . " " . $row11['middlename'] . " " . $row11['empl_lastname'] ."</a>". " ". $row['transac_loc'];
        }
        }
        }
        if($row['transac_type']=='Updated a PAR remark'){
          $mm=$row['transac_empl'];
        echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label>" . "<br>" . $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='about.php?section=equipment&action=&selaction=&emp_no=$mm#tablerem'>" . $row['transac_remark'] . "</a>" . " " . "<br><br>" . $row['transac_eqid'];
        }

        if($row['transac_type']=='Changed an employee Deployment'){
        $kk=$row['transac_empl'];
        echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label>" . "<br>" . $row['transac_pos'] . " " . $row['transac_type'] . "<br>" . "Changes: " . "<strong><a href='about.php?section=deployment_history&action=&selaction=&emp_no=$kk#deploy1'>" . $row['transac_loc'] . "</a></strong>";
        }
        if($row['transac_type']=='Edited employee information'){
        $gg=$row['transac_empl'];
        $sql13="SELECT * FROM empl_tbl WHERE empl_no='$gg'";
        $result13=mysqli_query($conn,$sql13);
        while($row13=mysqli_fetch_assoc($result13)){
        echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label>" . "<br>" . $row['transac_pos'] . " " . $row['transac_type'] . " of " . "<a href='about.php?section=employee&action=&selaction=&emp_no=$gg'>" . $row13['empl_firstname'] . " " . $row13['middlename'] . " " . $row13['empl_lastname'] ."</a>";
        }
        }
        if($row['transac_type']=='Updated a deployment changes remark'){
          $gg=$row['transac_empl'];
          echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label>" . "<br>" . $row['transac_pos'] . " " . $row['transac_type'] . " for " . "<a href='about.php?section=&action=&selaction=&section=deployment_history&emp_no=$gg#deploy_change'>" . $row['transac_loc']  . "</a> <br>" . " Remark: " . $row['transac_remark'];

        }
        if($row['transac_type']=='removed an equipment'){
          $qq=$row['transac_empl'];
          $sql9="SELECT * FROM empl_tbl WHERE empl_no='$qq'";
          $result9=mysqli_query($conn,$sql9);
          while($row9=mysqli_fetch_assoc($result9)){
            echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right'>" . $row['transac_date'] . "</label>" . "<br>";
            echo $row['transac_pos'] ." ". $row['transac_type'] . " from ". "<a href=''>" . $row9['empl_firstname'] . " " . $row9['middlename'] . " " . $row9['empl_lastname'] . "</a>" . ": ";
            $invi=$row['transac_eqid'];
            $sql10="SELECT * FROM eq_inv WHERE eq_inv_id='$invi'";
            $result10=mysqli_query($conn,$sql10);
            while($row10=mysqli_fetch_assoc($result10)){
              echo "<strong><a href='equipment.php?section=all&q=$invi'>" . $row10['eqdesc'] . "</a></strong>";
            }
        }
        }
        if ($row['transac_type']=='Edited employee remark'){
            $qq=$row['transac_empl'];
          echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
          $sql8="SELECT * FROM empl_tbl WHERE empl_no='$qq'";
          $result8=mysqli_query($conn,$sql8);
          while($row8=mysqli_fetch_assoc($result8)){
          echo $row['transac_pos'] . " " . $row['transac_type'] . " of " . " " . "<a href=''>".$row8['empl_firstname']." ".$row8['middlename']." ".$row8['empl_lastname']."</a>" . "</strong><br>";
          echo "Changes: " . "<strong>" . $row['transac_remark'] . "</strong>";
          }
        }
          if ($row['transac_type']=='Added an Equipment description'){
              $qq=$row['transac_empl'];
              echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

              echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
          }
          if ($row['transac_type']=='Added a Brand'){
              $qq=$row['transac_empl'];
              echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

              echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
          }
              if ($row['transac_type']=='Added an employee'){
                $jj=$row['transac_empl'];
                $sql5="SELECT * FROM empl_tbl WHERE empl_no='$jj'";
                $result5=mysqli_query($conn,$sql5);
                while($row5=mysqli_fetch_assoc($result5)){
                    echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                      echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='timeline.php?emp_no=$jj'>" . $row5['empl_firstname']." ".$row5['middlename']." ".$row5['empl_lastname']. "</a>";
              }
            }
            if ($row['transac_type']=='Edited an Equipment Description'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
            }
            if ($row['transac_type']=='Edited a Brand'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
            }
              if ($row['transac_type']=='Deleted a Description'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Deleted an Equipment Brand'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Added a Location'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_loc'];
              }
              if ($row['transac_type']=='Edited a Location'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Deleted a Location'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Added a position'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Added a department'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Added a deployment'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Edited a position'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Edited a department'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Edited a deployment'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Deleted a position'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Deleted a department'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Deleted a deployment'){
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";
                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . $row['transac_eqid'];
              }
              if ($row['transac_type']=='Added an Equipment'){
                  $qq=$row['transac_eqid'];
                  $sql6="SELECT * FROM eq_inv WHERE eq_inv_id='$qq'";
                  $result6=mysqli_query($conn,$sql6);
                  while($row6=mysqli_fetch_assoc($result6)){
                    $fd=$row6['eqdesc'];
                  echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='equipment.php?section=all&q=$qq'>" . $fd . "</a>" . "<br>" . $row['transac_loc'];
                }
              }
              if ($row['transac_type']=='DEPLOYED an undistributed Equipment'){
                $qq=$row['transac_eqid'];
                $sql6="SELECT * FROM eq_inv WHERE eq_inv_id='$qq'";
                $result6=mysqli_query($conn,$sql6);
                while($row6=mysqli_fetch_assoc($result6)){
                  $fd=$row6['eqdesc'];
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

                echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='equipment.php?section=all&q=$qq'>" . $fd . "</a>" . "<br>" . $row['transac_empl'];
              }
            }
            if ($row['transac_type']=='Updated an Equipment Information'){
                  $qq=$row['transac_eqid'];
                  $sql6="SELECT * FROM eq_inv WHERE eq_inv_id='$qq'";
                  $result6=mysqli_query($conn,$sql6);
                  while($row6=mysqli_fetch_assoc($result6)){
                    $fd=$row6['eqdesc'];
                  echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='equipment.php?section=all&q=$qq'>" . $fd . "</a>" . "<br>" . $row['transac_loc'];
                }
              }
              if ($row['transac_type']=='Deleted an Equipment'){
                  $qq=$row['transac_eqid'];
                  $sql6="SELECT * FROM deletedeq WHERE deleted_eqid='$qq'";
                  $result6=mysqli_query($conn,$sql6);
                  while($row6=mysqli_fetch_assoc($result6)){
                    $fd=$row6['deleted_eqdesc'];
                  echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='equipment.php?section=all&q=$qq'>" . $fd . "</a>" . "<br>" . $row['transac_loc'];
                }
              }
              if($row['transac_type']=='removed an equipment from the undistributed section'){
             $qq=$row['transac_eqid'];
                $sql6="SELECT * FROM eq_inv WHERE eq_inv_id='$qq'";
                $result6=mysqli_query($conn,$sql6);
                while($row6=mysqli_fetch_assoc($result6)){
                  $fd=$row6['eqdesc'];
                echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

                echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='equipment.php?section=all&q=$qq'>" . $fd . "</a>" . "<br>" . $row['transac_empl'];
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
<html>
