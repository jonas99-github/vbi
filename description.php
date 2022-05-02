<!DOCTYPE html>
<head><title>Verzontal PH</title>
  <?php include('header.php');
  //invid
  function createRandomdescid() {
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
  $descid='desc-'.createRandomdescid();
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
  <div class="navi-mngempl">
    <h2 style="text-align:center">Add Equipment Description/Brand</h2>
    <hr/>

<div class="">
<form action="savedesc.php" method="POST">
  <input type="hidden" name="descid" style="width:265px;" value="<?php echo $descid;?>" readonly><br><br>
  <span>Description </span><br><input type="text" name="desc" style="height:30px;width:265px;" required><br><br>
  <input type="submit" value="Submit" style="width:267px;">
</form>
<form action="savebrand.php" method="POST" style="margin-top:-120px;margin-left:300px;">
  <span>Brand: </span><br><input type="text" name="brand" style="height:30px;width:265px;" required><br><br>
  <input type="submit" value="Submit" style="width:267px;">
</form>
</div>
<!--*desc-->
<div class="content-add-desc">
  <h3 style="text-align:center;">Equipment</h3>
    <table>
      <tr>
        <th width="10px">DESC</th>
        <th width="5px">Action</th>
      </tr>
      <?php
      $sql="SELECT * FROM eq_desc ORDER BY eqdesc";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        ?>
      <tr>
      <td><?php echo $row['eqdesc'];?></td>
      <!--trigger modal-->
      <td><button value="<?php echo $row['eq_desc_id'];?>" data-toggle="modal" data-target="#editModaldesc" onclick="foggyDetails(this)" class="btn btn-outline-warning">Edit</button><button onclick="foggyDeleteDesc(this)" value="<?php echo $row['eq_desc_id'];?>" class="btn btn-outline-danger" >Delete</button></td>
      </tr>
      <?php
    }
     ?>
    </table>

</div>
<!--Brand-->
<div class="content-add-brand">
  <h3 style="text-align:center;">Brand</h3>
  <table>
    <tr>
      <th width="10px">BRAND</th>
      <th width="5px">Action</th>
    </tr>
  <?php
  $sql2="SELECT * FROM brand ORDER BY brand";
  $result2=mysqli_query($conn, $sql2);
  while($row2=mysqli_fetch_assoc($result2)){
    ?>
    <tr>
      <td><?php echo $row2['brand'];?></td>
      <td><button data-toggle="modal" data-target="#editModalbrand" value="<?php echo $row2['brandid'];?>" class="btn btn-outline-warning" onclick="foggyDetails2(this)" >Edit</button><button onclick="foggyDeleteBrand(this)" value="<?php echo $row2['brandid'];?>" class="btn btn-outline-danger">Delete</button></td>
    </tr>
    <?php
  }
   ?>
  </table>
</div>
</div>

<!--DESC Modal-->
<!-- Modal -->
<div class="modal fade" id="editModaldesc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Equipment Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label>Description ID</label><br>
      <form action="editdesc2.php" method="POST" class="ajax">
      <input type="text" id="descid" name="descid"readonly style="background-color:#ccc"><br>
      <label>Equipment Description</label><br>
      <input type="text" id="eqdesc" name="eqdesc" required><br><br><br>
      <input type="submit" name="submit" style="margin-left:200px;" class="btn btn-primary" value="submit">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!--Brand Modal EDIT-->
<!-- Modal -->
<div class="modal fade" id="editModalbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Brand ID</label><br>
        <form action="editbrand.php" method="POST" class="ajax">
        <input type="text" id="brandid" name="brandid"readonly style="background-color:#ccc"><br>
        <label>Brand</label><br>
        <input type="text" id="brand" name="brand" required><br><br><br>
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

function foggyDetails(details){
  var descid = details.value;
 $.ajax({
    url: "editdesc.php",
    method: "POST",
    data: {"descid" : descid},
    success: function(response){
      var domu=JSON.parse(response);

      figi1=domu.eq_desc_id;
      figi2=domu.eqdesc;
      document.getElementById("descid").value =figi1;
      document.getElementById("eqdesc").value =figi2;
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

function foggyDetails2(details2){   //start of foggyDetails2
  var brandid = details2.value;
 $.ajax({
    url: "editbrand.php",
    method: "POST",
    data: {"brandid" : brandid},
    success: function(response3){
      var domu2=JSON.parse(response3);

      fig1=domu2.brandid;
      fig2=domu2.brand;
      document.getElementById("brandid").value =fig1;
      document.getElementById("brand").value =fig2;
    }
 });

 //Start of Update Modal2
 $('form.ajax').on('submit', function(){
     var that = $(this),
         url = "editbrand2.php",
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
 });    //end of update modal2
}//end of foggyDetail2

//Bug: redirect.php was included in the  deletion process because some items does not disappear when deleted until it is manually reloaded

function foggyDeleteDesc(deldesc){
 var desc=deldesc.value;
if(confirm('You are about to delete an equipment description. Press "ok" to proceed.')){
  $.ajax({
    url: "deletedesc.php",
    type: "POST",
    data: {"desc" : desc},
    dataType: "text",
    success: function(response4){
        alert(response4);
        location.reload();
    }
  });
}
}

function foggyDeleteBrand(delbrand){
  var brand=delbrand.value;
 if(confirm('You are about to delete an equipment brand. Press "ok" to proceed.')){
   $.ajax({
     url: "deletebrand.php",
     type: "POST",
     data: {"brand" : brand},
     dataType: "text",
     success: function(response5){
         alert(response5);
         location.reload();
     }
   });
 }
}
</script>

</body>
</html>
