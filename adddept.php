<!DOCTYPE html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
$position=$_SESSION['SESS_ROLE'];
//emplno
function createRandomdept() {
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
$deptno='DEPT-'.createRandomdept();
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
      <h2 style="text-align:center">Add a Department</h2>
    <hr>
    <ul>
      <li><a href="manage_empl.php">Add Employee</a></li><br>
      <li><a href="addposition.php">Add Position</a></li><br>
      <li><a href="adddept.php">Add Department</a></li><br>
        <li><a href="adddeply.php">Add Deployment/PRJ SITE</a></li><br>
    </ul>
  </div>

<div class="form-addempl">
  <form action="savedept.php" method="POST" class="form-addempl">
    <span>Department ID </span><input type="text" id ="dept_id" name="dept_id" class="" value="<?php echo $deptno;?>" style="background-color:#ccc;" readonly><br><br>
    <span>Department Name</span><br><input type="text" id ="dept_name" name="dept_name" style="width:265px; height:30px;" required><br><br>
    <span>Location</span><br>
    <select name="loc_dept" style="width:265px; height:30px;">
      <option></option>
      <?php $sql="SELECT * FROM Deployment";
      $result=mysqli_query($conn, $sql);
      for($i=0; $row = mysqli_fetch_assoc($result); $i++){
      ?>
        <option><?php echo $row['deployment']; ?></option>
        <?php
      }

      ?>
      </select><br><br>
    <span>Date Created</span><br><input type="date" id ="date_created" name="date_created" style="width:265px; height:30px;" required><br><br>
    <input type="submit" id ="submit" name="submit" value="Submit" style="width:267px;">
</form>
  </div>
  <div style="overflow-y:auto;overflow-x:auto;height:400px;background-color:white;width:400px;margin-top:-350px;margin-left:820px;">
    <h3 style="text-align:center;position:sticky;color:white;background-color:green;top:0;">Departments</h3>
    <table>
      <tr>
        <th width="8px">Dept ID</th>
        <th width="10px">Dept</th>
        <th width="8px">Date Created</th>
        <th width="5px">Action</th>
      </tr>
      <?php
      $sql="SELECT * FROM dept_tbl ORDER BY dept_name";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
       ?>
      <tr>
        <td><?php echo $row['dept_id'];?></td>
        <td><?php echo $row['dept_name'];?></td>
        <td><?php echo $row['date_created'];?></td>
        <td><button value="<?php echo $row['dept_id'];?>" data-toggle="modal" data-target="#editModaldept" onclick="DeptDetails(this)" class="btn btn-outline-warning">Edit</button>&nbsp<button onclick="deptDelete(this)" value="<?php echo $row['dept_id'];?>" class="btn btn-outline-danger" >Delete</button></td>
      </tr>
      <?php
    }
     ?>
   </table>
  </div>

  <!--DEPT Modal-->
  <!-- Modal -->
  <div class="modal fade" id="editModaldept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label>Department ID</label><br>
        <form action="editdept2.php" method="POST" class="ajax">
        <input type="text" id="deptid" name="deptid" readonly style="background-color:#ccc"><br>
        <label>Department</label><br>
        <input type="text" id="dept" name="dept" required><br><br><br>
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
function DeptDetails(details){

  var deptid = details.value;
 $.ajax({
    url: "editdept.php",
    method: "POST",
    data: {"deptid" : deptid},
    success: function(response){
      var domu=JSON.parse(response);

      figi1=domu.dept_id;
      figi2=domu.dept_name;
      document.getElementById("deptid").value =figi1;
      document.getElementById("dept").value =figi2;
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

function deptDelete(deldept){
  var deldept=deldept.value;
 if(confirm('You are about to delete a department. Press "ok" to proceed.')){
   window.location="deletedept.php?dept=" + deldept;
 }
}
</script>
</body>
</html>
