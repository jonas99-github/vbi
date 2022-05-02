<?php
include "connect.php";
include "header.php";

$a = $_POST['date_reorder'];
$b = $_POST['project'];
$c = $_POST['location'];
$d = $_POST['title'];
//invid
function createRandomorderno() {
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
$reorder='RD-'.createRandomorderno();
?>
<html>
<body style="background-color:white;">
<center><img src="icon/logo4.png" height="100" width="380" style="float:center" ></center>
<center><label style="color:blue;">Purok 3, Bagumbayan, Daraga, Albay; Telefax: (052) 483 4153; E-mail: verzontal@yahoo.com</label></center>
  <center><h3>Administration Division<h3></center>
<center><h2>Reorder request</h2></center><br>
<div><label>REORDER REQS NO:&nbsp</label><strong><?php echo $reorder;?></strong><label style="float:right;">Date:&nbsp<?php echo $a;?></label></div>
<label>Project:&nbsp</label><strong><label><?php echo $b;?></label></strong><br>
<label>Location:&nbsp</label><strong><label><?php echo $c;?></label></strong><br><br>
<label>Title:&nbsp</label><label><strong><?php echo $d;?></label></strong><br>

<table>
  <thead>
    <th width="12%">QUANTITY</th>
    <th width="12%">UNIT</th>
    <th width="12%">PRODUCT DESCRIPTION</th>
    <th width="12%">UNIT COST</th>
    <th width="12%">SUB TOTAL</th>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM save_reorder";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      ?>
    <tr>
      <td><?php echo $row['qty'];?></td>
      <td><?php echo $row['unit'];?></td>
      <td><?php echo $row['pdesc'];?></td>
      <td><?php echo $row['unit_cost'];?></td>
      <?php
      $a=$row['qty'];
      $b=$row['unit_cost'];
       ?>
      <td><?php echo $a * $b;?></td>
    </tr>
    <?php
    }
    ?>
    <thead>
      <tr>
        <th colspan="1"></th>
        <th colspan="1"></th>
        <th colspan="2" style="font-size: 12px; text-align: right;font-size: 12px; color: 'WHITE';"><strong>GRAND TOTAL:</strong></th>
        <td>
          <?php
          $total=0;
          $sql3="SELECT * FROM save_reorder";
          $result3=mysqli_query($conn,$sql3);
          while($row3=mysqli_fetch_assoc($result3)){
                $aaa=$row3['qty'];
                $bbb=$row3['unit_cost'];
                $res=$aaa*$bbb;
                $total += $res;
              }
              echo "<label><strong>" . $total . "</strong></label>";
          ?>
        </td>
      </tr>
    </thead>
   </tbody>
 </table><br><br><br>

 <label>Prepared by:</label>
 <label style="margin-left:650px;">Requested by:</label><br><br><br>
<input type="text" name="prepared" style="border: none;
border-color: transparent;" placeholder="Insert name here" required>
<input type="text" name="requested" style="border: none;
border-color: transparent;margin-left:550px;" placeholder="Insert name here" required><br><br><br><br>


<label>Checked by:</label><br><br>
<input type="text" name="prepared" style="border: none;
border-color: transparent;" placeholder="Insert name here" required><div style="float:right;margin-right:316px;">
<input type="text" name="president" value="DENNIS G. MACANDOG" style="border: none;
border-color: transparent;" readonly><br>
<label>General Manager</label><br>
</div>
<br><br><br>
<br><br><br><br><br><br>


<label> Note:</label><br>
<textarea name="note" style="border: none;
border-color: transparent;" Placeholder="..."></textarea>
<div style="margin-left:1100px;padding-bottom:400px;">
  <button id="button1" class="btn btn-primary" onclick="myFunction()">PRINT</button>
</div>
<script>
function myFunction(){
  document.getElementById("button1").style.display = "none";
  window.print();
  window.location.reload();
}
</script>
</body>
</html>
