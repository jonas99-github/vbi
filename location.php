<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
//locid
//invid
function createRandomdlocid() {
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
$locid='LOC-'.createRandomdlocid();
 ?>
</head>
<body>
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
          <a href="" style="color:black;">Help</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
	<!-- Information -->
	<div class="navi-mngempl"><br>
    <h2 style="text-align:center;">Add Location / Project Site</h2>
<hr />
<div class="form-addempl" style="margin-left:-10px;">
  <form action="savelocation.php" method="POST" class="form-addempl">
    <span>Location ID </span><input type="text" id ="loc_id" name="loc_id" class="" value="<?php echo $locid;?>" style="width:180px; background-color:#ccc;" readonly><br><br>
    <span>Location /Project site</span><br><input type="text" id ="location" name="location" class="" value="" style="height:30px; width:265px;" required><br><br>
    <span>Date Created </span><br><input type="date" id ="date_created" name="date_created" class="" value="" style="height:30px; width:265px;" required><br><br>
    <input type="submit" id ="submit" name="submit" class="" value="Submit" style="width:267px;">
</form>
</div>
  </div>
  <div style="width:700px;background-color:white;margin-top:100px;position:absolute;margin-top:-270px;margin-left:500px;overflow-y:auto;overflow-x:auto;height:400px;width:680px;">
    <h3 style="text-align:center;position:sticky;background-color:green;top:0;color:white;">Locations / Project Sites</h3>
    <table style="width:670px;">
      <tr>
        <th>Location/Project site</th>
        <th>Date created</th>
        <th>Action</th>
      </tr>
    <?php
    $sql="SELECT * FROM deployment ORDER BY deployment ASC";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td><?php  echo $row['deployment'];?></td>
      <td><?php  echo $row['date_created'];?></td>
      <td><button value="<?php echo $row['deply_id'];?>" data-toggle="modal" data-target="#editModalpos" onclick="vamiDetails(this)" class="btn btn-outline-warning">Edit</button>&nbsp
        <button onclick="vamiDeleteLoc(this)" value="<?php echo $row['deply_id'];?>" class="btn btn-outline-danger">Delete</button></td>
      </tr>
      <?php
    }
     ?>
   </table>
</div>

<!--DESC Modal-->
<!-- Modal -->
<div class="modal fade" id="editModalpos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label>Location ID</label><br>
      <form action="editlocation2.php" method="POST" class="ajax">
      <input type="text" id="locid" name="locid"readonly style="background-color:#ccc"><br>
      <label>Location</label><br>
      <input type="text" id="loc" name="loc" required><br><br><br>
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
function vamiDetails(details){
  var locid = details.value;
 $.ajax({
    url: "editlocation.php",
    method: "POST",
    data: {"locid" : locid},
    success: function(response){
      var domu=JSON.parse(response);

      figi1=domu.deply_id;
      figi2=domu.deployment;
      document.getElementById("locid").value =figi1;
      document.getElementById("loc").value =figi2;
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

function vamiDeleteLoc(deleteloc){
  var deleteloc=deleteloc.value;
 if(confirm('You are about to delete a location. Press "ok" to proceed.')){
   window.open('deleteloc.php?loc=' + deleteloc);
window.location="redirect.php?p=loc";
 }
}
</script>
</body>
</html>
