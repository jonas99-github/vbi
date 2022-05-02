<?php
include "connect.php";
$a = $_POST['update-id'];
$b = $_POST['update-desc'];
$c = $_POST['update-brand'];
$d = $_POST['update-tag'];
$e = $_POST['update-serial'];
$f = $_POST['update-model'];
$g = $_POST['update-ip'];
$h = $_POST['update-state']; //new state
$i = $_POST['update-condition'];  //new condition
$j = $_POST['update-purch'];
$k = $_POST['update-price'];
$l = $_POST['update-loc'];
$m = $_POST['update-remark'];
$n = $_POST['old-cond'];  //old condition
$o = $_POST['up-empl'];
$p = $_POST['up-state']; //old state


if(!empty($o)){ //assigned

  if($i=='Available/Unassigned' || $i=='repair' || $i=='missingeq' || $i=='missingpart' || $i=='defective' || $i=='refurbished' || $i=='assigned' AND $n=='Undistributed'){
        echo "Notice: Update failed. Undistributed equipment cannot be changed.";
      }
  else if($i=='Undistributed' AND $n=='Available/Unassigned' || $n=='repair' || $n=='missingeq' || $n=='missingpart' || $n=='defective' || $n=='refurbished' || $n=='assigned'){
        echo "Notice: Update failed. Unable to change to undistributed equipment.";
      }

    else if($n=='repair' || $n=='missingeq' || $n=='missingpart' || $n=='defective' || $n=='refurbished' || $n=='assigned' and $i=='Available/Unassigned'){
        echo "Notice: Update failed. Assigned equipment cannot be changed to Available/Unassigned";
      }

      else{
          if($p=='Old' && $h=='New'){
            $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
            $result2=mysqli_query($conn,$sql2);
            $rowcount=mysqli_num_rows($result2);
                  if($rowcount > 1){
                    echo "Equipment with a history of more than one employee assigned to it cannot be changed to New";
                  }
                  else{
                  $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                      if (mysqli_query($conn, $sql)) {
                          echo "Equipment updated successfully!";
                          session_start();
                          $type="Updated an Equipment Information";
                          $pos=$_SESSION['SESS_ROLE'];
                          date_default_timezone_set('Asia/Manila');
                          $date=date('F j, Y g:i:a  ');
                          $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                          $result3 = $conn->prepare($sql3);
                          $result3->execute();
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
            }

      }
      else if ($p=='New' && $h=='Old'){
        $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
        $result2=mysqli_query($conn,$sql2);
        $rowcount=mysqli_num_rows($result2);
              if($rowcount < 2){
                echo "New equipment with a history of less than two employee assigned to it cannot be changed to Old";
              }
              else{
                $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                      if (mysqli_query($conn, $sql)) {
                          echo "Equipment updated successfully!";
                          session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
              }
      }
        else if($p=='Unknown state' && $h=='New'){
          $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
          $result2=mysqli_query($conn,$sql2);
          $rowcount=mysqli_num_rows($result2);
                if($rowcount > 1){
            echo "Equipment with a history of more than one employee assigned to it cannot be changed to New";
            }
            else{
              $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                    if (mysqli_query($conn, $sql)) {
                        echo "Equipment updated successfully!";
                        session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
            }
          }
          else if($p=='Unknown state' && $h=='Old'){
            $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
            $result2=mysqli_query($conn,$sql2);
            $rowcount=mysqli_num_rows($result2);
                  if($rowcount < 2){
              echo "Equipment with a history of less than two employee assigned to it cannot be changed to Old";
              }
              else{
                $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                      if (mysqli_query($conn, $sql)) {
                          echo "Equipment updated successfully!";
                          session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
              }
          }
        else{
          $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                if (mysqli_query($conn, $sql)) {
                    echo "Equipment updated successfully!";
                    session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
        }
  }
    return false;
}

if(empty($o)){

  if($i=='Available/Unassigned' || $i=='repair' || $i=='missingeq' || $i=='missingpart' || $i=='defective' || $i=='refurbished' || $i=='assigned' AND $n=='Undistributed'){
        echo "Notice: Update failed. Undistributed equipment cannot be changed.";
      }
    else if($i=='Undistributed' AND $n=='Available/Unassigned' || $n=='repair' || $n=='missingeq' || $n=='missingpart' || $n=='defective' || $n=='refurbished' || $n=='assigned'){
        echo "Notice: Update failed. Unable to change to undistributed equipment.";
      }
    else if($n=='repair' || $n=='missingeq' || $n=='missingpart' || $n=='defective' || $n=='refurbished' || $n=='Available/Unassigned' and $i=='assigned'){
      echo "Notice:Update failed. Available/Unassigned equipment cannot be changed to Assigned";
    }
      else{
          if($p=='Old' && $h=='New'){
            $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
            $result2=mysqli_query($conn,$sql2);
            $rowcount=mysqli_num_rows($result2);
                  if($rowcount > 1){
                    echo "Equipment with a history of more than one employee assigned to it cannot be changed to New";
                  }
                  else{
                  $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                      if (mysqli_query($conn, $sql)) {
                          echo "Equipment updated successfully!";
                          session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
            }

      }
      else if ($p=='New' && $h=='Old'){
        $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
        $result2=mysqli_query($conn,$sql2);
        $rowcount=mysqli_num_rows($result2);
              if($rowcount < 2){
                echo "New equipment with a history of less than two employee assigned to it cannot be changed to Old";
              }
              else{
                $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                      if (mysqli_query($conn, $sql)) {
                          echo "Equipment updated successfully!";
                          session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
              }
      }
        else if($p=='Unknown state' && $h=='New'){
          $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
          $result2=mysqli_query($conn,$sql2);
          $rowcount=mysqli_num_rows($result2);
                if($rowcount > 1){
            echo "Equipment with a history of more than one employee assigned to it cannot be changed to New";
            }
            else{
              $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                    if (mysqli_query($conn, $sql)) {
                        echo "Equipment updated successfully!";
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
            }
          }
          else if($p=='Unknown state' && $h=='Old'){
            $sql2="SELECT * FROM eq_history WHERE eqid='$a'";
            $result2=mysqli_query($conn,$sql2);
            $rowcount=mysqli_num_rows($result2);
                  if($rowcount < 2){
              echo "Equipment with a history of less than two employee assigned to it cannot be changed to Old";
              }
              else{
                $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                      if (mysqli_query($conn, $sql)) {
                          echo "Equipment updated successfully!";
                          session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
              }
          }
        else{
          $sql="UPDATE eq_inv SET eq_inv_id='$a', eqdesc='$b', brand='$c', tag_no='$d', serial_no='$e', model_no='$f', ip_add='$g', eq_state='$h', eq_condition='$i', date_purch='$j', price='$k', curr_equip_loc='$l', remarks='$m' WHERE eq_inv_id='$a'";
                if (mysqli_query($conn, $sql)) {
                    echo "Equipment updated successfully!";
                    session_start();
                    $type="Updated an Equipment Information";
                    $pos=$_SESSION['SESS_ROLE'];
                    date_default_timezone_set('Asia/Manila');
                    $date=date('F j, Y g:i:a  ');
                    $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
                    $result3 = $conn->prepare($sql3);
                    $result3->execute();
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
        }
  }
  return false;
}
 ?>
