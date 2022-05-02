<!DOCTYPE html>
<head><title>Undistributed</title>
<?php include ("header.php"); ?>
</head>

<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='IT Admin' || $position=='HR and Admin Manager' || $position=='Admin Staff'){
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
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <?php
     if($position=='HR and Admin Manager'){
      ?>
      <li><a href="undistributed.php">Undistributed</a></li>
        <?php
    }
    ?>
    <?php
     if($position=='IT Admin' || $position=='Admin Staff'){
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
    <?php
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choose a Project Site / Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="codegen_undis.php" method="POST">
          <input type="hidden" name="oldloc" value="<?php echo $_GET['loc'];?>">
          <select name="loc_proj" class="form-control" required>
          <option></option>
    <?php
      $sql="SELECT * FROM deployment ";
       $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          ?>
         <option><?php echo $row['deployment'];?></option>
         <?php
        }
        ?>
      </select><br><br>
     <input type="submit" class="btn btn-primary" value="Save changes">
     </form>
      </div>
      <div class="modal-footer">
         <label style="font-size:12px;color:red;">Warning! Adding an already existing location/project site will deploy the equipment to that location/project site with a different PAR/MR number.</label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- add equipment-->
<!-- Modal -->
<div class="modal fade" id="addEQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choose a PAR / MR number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="codegen_undis2.php" method="POST">
          <input type="hidden" name="loc" value="<?php echo $_GET['loc'];?>">
          <select name="choosepar" class="form-control" required>
          <option></option>
    <?php
    echo $a=$_GET['loc'];
      $sql2="SELECT * FROM deployment INNER JOIN eq_inv on deployment.deployment=eq_inv.curr_equip_loc WHERE deployment='$a' and eq_condition='Undistributed' GROUP BY par";
       $result2=mysqli_query($conn,$sql2);
        while($row2=mysqli_fetch_assoc($result2)){
          ?>
         <option><?php echo $row2['par'];?></option>
         <?php
        }
        ?>
      </select><br><br>
     <input type="submit" class="btn btn-primary" value="Save changes">
     </form>
      </div>
      <div class="modal-footer">
        <label style="font-size:12px;">To add equipment with a different PAR/MR number, click the "Add" button from the Project Site / Location vertical side navigation</label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float:right;">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="vertical-nav">
  <div style="overflow-y:auto;height:600px;">
  <label style="margin-left:10px;font-size:22px;"><strong>Project Site / Location</strong></label>
  <ul>
    <?php
    $sql2="SELECT * FROM eq_inv WHERE eq_condition='Undistributed' GROUP BY curr_equip_loc";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
      ?>
    <li><a href="undistributed.php?loc=<?php echo $row2['curr_equip_loc'];?>"><?php echo $row2['curr_equip_loc'];?></a></li>
    <?php
  }
  if($position=='IT Admin'){
   ?>
    <li><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="margin-left:20px;">
ADD
</button></li>
<?php
}
?>
        </ul>
      </div>
        </div>
        <?php $a = isset($_GET['loc']) ? $_GET['loc'] : null;
              $b = isset($_GET['assign']) ? $_GET['assign'] : null;
        ?>
        <div class="aboutcontent-undistributed">
          <div class="alert alert-primary" role="alert" style="text-align:center;">
        Undistributed Equipment - <?php echo $a;?>
            </div>
            <?php
            if($a==null){
                if($b==''){
                  if($position=='IT Admin'){
                 ?>
                    <a href='undistributed.php?assign=yes' class="btn btn-warning" onclick="window.location='assign-session.php'" style="padding:4px;margin:2px;font-size:12px;float:right;">Assign equipment</a>
            
                <?php
                      }
                    }
                if($b=='yes'){
                echo "<a href='undistributed.php' class='btn btn-danger' style='padding:4px;margin:2px;font-size:12px;float:right;'>Cancel assignment</a> ";
                            }
                        }
            if(isset($a)){
                if($b==''){
                  if($position=='IT Admin'){
                 ?>
                    <a href='undistributed.php?loc=<?php echo $a;?>&assign=yes' class="btn btn-warning" onclick="window.location='assign-session.php'" style="padding:4px;margin:2px;font-size:12px;float:right;">Assign equipment</a>
            
                <?php
                 }
                      }
                if($b=='yes'){
                echo "<a href='undistributed.php?loc=$a' class='btn btn-danger' style='padding:4px;margin:2px;font-size:12px;float:right;'>Cancel assignment</a> ";
                             }
                          }
          
               ?>
          <table style="margin-top:10px;width:900px;text-align:center;">
          <tr>
             <?php
              if($position=='IT Admin'){
              ?>
          <th>Action</th>
          <?php
        }
        ?>
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
               <tbody>
                 <?php
                $a = isset($_GET['loc']) ? $_GET['loc'] : null;
                 $sql3="SELECT * FROM eq_inv WHERE curr_equip_loc='$a' and eq_condition='Undistributed'";
                 $result3=mysqli_query($conn,$sql3);
                 while($row3=mysqli_fetch_assoc($result3)){
                   ?>
                  
                  <tr style="font-size:13px;">
                    <?php
                    if($position=='IT Admin'){ 
                     ?>
                      <td>
                        <?php
                        if($b=='yes'){
                          $item=$row3['eq_inv_id'];
                          ?>  <form action="getcheckedbox.php?loc=<?php echo $_GET['loc'];?>" id="submit" method="POST" class="ajax">
                                <input type='checkbox' name='item[]' value="<?php echo $item;?>" form='submit'>
                                <?php
                                     }
                                     if($b==''){
                             ?>
                        <button onclick="removeUn(this)" value="<?php echo $row3['eq_inv_id'];?>" class="btn btn-danger" style="font-size:10px; padding:3px;">Remove</button>
                        <?php
                      }
                      ?>
                      </td>
                      <?php
                    }
                    ?>
                      <td style="color:green;"><a href="equipment.php?section=all&q=<?php echo $row3['eq_inv_id'];?>"><?php echo $row3['eq_inv_id'];?></a></td>
                      <td><a href="viewpar2.php?par=<?php echo $row3['par'];?>"><?php echo $row3['par'];?></a></td>
                      <td><strong><?php echo $row3['eqdesc'];?></strong></td>
                      <td><?php echo $row3['brand'];?></td>
                      <td><?php echo $row3['tag_no'];?></td>
                      <td><?php echo $row3['serial_no'];?></td>
                      <td><?php echo $row3['model_no'];?></td>
                      <td><?php echo $row3['ip_add'];?></td>
                      <td><?php echo $row3['eq_state'];?></td>
                      <td><?php echo $row3['eq_condition'];?></td>
                      <td><?php echo $row3['date_issued'];?></td>
                      <td><?php echo $row3['date_purch'];?></td>
                      <td><?php echo $row3['price'];?></td>
                      <td><?php echo $row3['curr_equip_loc'];?></td>
                      <td><?php echo $row3['remarks'];?></td>
                  </tr>
                  <?php
                }
                 ?>
               </tbody>
          </table>
          <?php
            if($b=='yes'){
              ?>  
          <input type='submit' name='submit' value='Click to submit chosen items' form='submit' class='btn btn-warning' style='font-size:13px; padding:5px;'>
          </form>   
          <?php
             }
         if($b==''){
           if($position=='IT Admin'){
           ?>
           <button class="btn btn-success" style="padding:1px;font-size:15px;" value="Add equipment" data-target="#addEQ" data-toggle="modal" value="<?php echo $_GET['loc'];?>">Add equipment</button>
        <?php
      }
    }
        ?>
</div>
<div style="background-color:white;margin-top:20px;border-radius:3px;margin-left:200px;display:none;
  width:930px;"> <div class="alert alert-primary" role="alert" style="text-align:center;">PAR/MR Section</div>
  Hi

</div>
<script>
  function removeUn(details){
if(confirm("Remove equipment?")){
  var removeu=details.value;
  $.ajax({
    url: "remove-un.php",
    method: "POST",
    data: {"removeu" : removeu},
    success: function(response){
      alert(response);
      window.location.reload();
    }
  });
  return false;
  }
}
</script>
</body>
<html>
