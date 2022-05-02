<?php
include "connect.php";

      $sql5="SELECT * FROM eq_inv
      WHERE eq_condition ='Undistributed' GROUP BY curr_equip_loc";
      $result5=mysqli_query($conn, $sql5);
      while($row5=mysqli_fetch_assoc($result5)){
          $a = $row5['curr_equip_loc'];

       
        }
         $sql2="SELECT * FROM deployment WHERE deployment";
         $result2=mysqli_query($conn, $sql2);
         while($row2=mysqli_fetch_assoc($result2)){
            $b = $row2['deployment'];
            echo $b . "<br>";
        }
        ?>
