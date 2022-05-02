<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
$position=$_SESSION['SESS_ROLE'];
//deployid
function createRandomdeployid() {
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
$deployid='DNO-'.createRandomdeployid();

 ?>
</head>
<body>
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
     if($position=='HR and Admin Manager'){
      ?>
    <li><a href="manage_empl.php">Manage Employee</a></li>
    <?php
  }
  ?>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <?php
     if($position=='IT Admin'){
      ?>
    <li><a href="reorder.php">Make Reorder Request</a></li>
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
	<!-- Information -->
	<div class="navi-mngempl"><br>
      <h2 style="text-align:center;">Add a Deployment / Project Site</h2>
      <hr>
    <ul>
      <li><a href="manage_empl.php">Add Employee</a></li><br>
      <li><a href="addposition.php">Add Position</a></li><br>
      <li><a href="adddept.php">Add Department</a></li><br>
      <li><a href="adddeply.php">Add Deployment/PRJ SITE</a></li><br>
    </ul>
  </div>

<div class="form-addempl">
  <form action="savedeply.php" method="POST" class="form-addempl">
    <span>Deployment/Prject Site  ID </span><input type="text" id ="loc_id" name="deply_id" value="<?php echo $deployid;?>" style="background-color:#ccc;" readonly><br><br>
    <span>Deployment/Project Site</span><br><input type="text" id ="deploy" name="deploy" style="width:265px; height:30px;"><br><br>
    <span>Date Created</span><br><input type="date" id ="date_created" name="date_created" style="width:265px; height:30px;"><br><br>
    <input type="submit" id ="submit" name="submit" value="Submit" style="width:267px;">
</form>
  </div>
  <div style="overflow-y:auto;overflow-x:auto;height:400px;background-color:white;width:900px;margin-top:100px;margin-left:20px;margin-bottom:50px;">
    <h3 style="text-align:center;position:sticky;color:white;background-color:green;top:0;">Locations</h3>


    <table>
      <tr>
        <th width="8.8%">ID</th>
        <th width="50%">LOCATIONS</th>
        <th width="8%">Date Created</th>
        <th width="8.8%">Action</th>
      </tr>
      <?php
      $sql="SELECT * FROM deployment ORDER BY deployment";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        ?>
      <tr>
        <td><?php echo $row['deply_id'];?></td>
        <td><?php echo $row['deployment'];?></td>
        <td><?php echo $row['date_created'];?></td>
        <td><button value="<?php echo $row['deply_id'];?>" data-toggle="modal" data-target="#editModaldeploy" onclick="DeployDetails(this)" class="btn btn-outline-warning">Edit</button>&nbsp<button onclick="deployDelete(this)" value="<?php echo $row['deply_id'];?>" class="btn btn-outline-danger" >Delete</button></td>
      </tr>
      <?php
        }
         ?>
    </table>
  </div>

  <!--Deploy Modal-->
  <!-- Modal -->
  <div class="modal fade" id="editModaldeploy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Deployment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label>Deployment ID</label><br>
        <form action="editdeploy2.php" method="POST" class="ajax">
        <input type="text" id="deployid" name="deployid" readonly style="background-color:#ccc"><br>
        <label>Deployment</label><br>
        <input type="text" id="deployment" name="deployment" required style="width:300px;"><br><br><br>
        <input type="submit" name="submit" style="margin-left:200px;" class="btn btn-primary" value="submit">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  function DeployDetails(details){

    var deployid = details.value;
   $.ajax({
      url: "editdeploy.php",
      method: "POST",
      data: {"deployid" : deployid},
      success: function(response){
        var domu=JSON.parse(response);

        figi1=domu.deply_id;
        figi2=domu.deployment;
        document.getElementById("deployid").value =figi1;
        document.getElementById("deployment").value =figi2;
      }
   });

   //Start of Update Modal
   $('form.ajax').on('submit', function(){
       var that = $(this),
           url = that.attr('action'),
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
       success: function(response2){
        alert(response2) ? "" : location.reload();

       }
     });
       return false;
   });    //end of update modal

  }//end of foggyDetails

  function deployDelete(deldeploy){
    var deldeploy=deldeploy.value;
   if(confirm('You are about to delete a department. Press "ok" to proceed.')){
     window.location='deletedeploy.php?deploy=' + deldeploy;
   }
  }
  </script>

</body>
</html>
