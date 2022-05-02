<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
$emp_no=$_GET['emp_no'];
$sql="SELECT *FROM empl_tbl WHERE empl_no='$emp_no'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$emp_fname = $row['empl_firstname'];
$emp_middlename = $row['middlename'];
$empl_lastname = $row['empl_lastname'];
?>
</style>
</head>
<body>
  <div class="first-header">
    <ul>
    <li><a href="dashboard.php">Search Employee</a></li>
    <li><a href="manage_empl.php">Manage Employee</a><li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'] ."   "; ?></li>
    </ul>
  </div>
  <div class="profile-nav">
    <ul>
    <li><a href="about.php?section=overview&emp_no=<?php echo $_GET['emp_no']; ?>">Timeline</a></li>
    <li><a href="about.php?section=overview&emp_no=<?php echo $_GET['emp_no']; ?>">About</a><li>
    </ul>
    </div>
    <div class="about-div">
    <h3>About</h3>
        </div>

    <div class="profile-sidenav">
      <img src="icon/jonas.jpg"  height="150" width="150">
          <ul class="mainmenu">
            <li><a href="about.php?section=overview&emp_no=<?php echo $_GET['emp_no'];?>">Overview</a></li>
            <li><a href="about.php?section=employee&emp_no=<?php echo $_GET['emp_no'];?>">Employee</a></li>
            <li><a href="about.php?section=equipment&emp_no=<?php echo $_GET['emp_no'];?>">Equipment</a></li>
            <li><a href="about.php?section=equimpment_history&emp_no=<?php echo $_GET['emp_no'];?>">Equipment History</a></li>
            <li><a href="about.php?section=deployment_history&emp_no=<?php echo $_GET['emp_no'];?>">Deployment History</a></li>
            <li><a href="about.php?section=par&emp_no=<?php echo $_GET['emp_no'];?>">Property Acknowledgement Receipt</a></li>
          </ul>
        </nav>
 </div>
 <div class="profile-div">
   <?php
   $section=$_GET['section'];
        if($section=='overview'){
      ?>
    <center><div class="aboutcontent-div">overview</div></center>
          <?php
        }
        elseif($section=='employee'){
        ?>
        <center><div class="aboutcontent-div">employee</div></center>
        <?php
      }
      elseif($section=='equipment'){
        $sql2="SELECT*FROM eq_inv WHERE empl_no='$emp_no'";
        $result2=$conn->query($sql2);
        $row=$result2->fetch_assoc();
        $eq_desc_id=$row['eq_desc_id'];
        $sql3="SELECT*FROM eq_desc WHERE eq_desc_id='$eq_desc_id'";
        $result3=$conn->query($sql3);
        $row=$result3->fetch_assoc();
        $eq_desc = $row['eq_desc'];
    ?>
      <center><div class="aboutcontent-div">equipment<br>
      <label>Equipment Description:<?php echo $eq_desc; echo $eq_desc_id;?></label></div>
      <a href="equip_assign.php?emp_no=<?php echo $emp_no;?>"<button>Assign equipment</button></a></center>
  <?php
    }
    elseif($section=='equipment_history'){
    ?>
    <center><div class="aboutcontent-div">equipment history</div></center>
    <?php
  }
  elseif($section=='deployment_history'){
  ?>
  <center><div class="aboutcontent-div">deployment_history</div></center>
  <?php
  }
  elseif($section=='par'){
  ?>
  <center><div class="aboutcontent-div">property acknowledgment receipt</div></center>
  <?php
  }
  ?>
 </div>
</body>
</html>
