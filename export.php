<?php
include "connect.php";
$a=$_POST["query"];
$state=$_POST["state-sess"];
$condition=$_POST["condition-sess"];
$output="";
if($state=='allstate' && $condition=='allcondition'){
  $sql = (
    "SELECT *
     from eq_inv
     left JOIN empl_tbl
        on eq_inv.empl_no=empl_tbl.empl_no
     WHERE
       eq_inv_id LIKE '%$a%'
       OR eq_assign_id='$a'
       OR eqdesc LIKE '%$a%'
       OR brand LIKE '%$a%'
       OR eq_inv.empl_no LIKE '%$a%'
       OR tag_no LIKE '%$a%'
       OR serial_no LIKE '%$a%'
       OR model_no LIKE '%$a%'
       OR ip_add LIKE '%$a%'
       OR curr_equip_loc LIKE '%$a%'
       OR remarks LIKE '%$a%'
       OR par LIKE '%$a%'
     AND (eq_state='new'
       OR eq_state='old'
       OR eq_state='Unknown state')
     AND (eq_condition='Available/Unassigned'
       OR eq_condition='assigned'
       OR eq_condition='repair'
       OR eq_condition='missingpart'
       OR eq_condition='missingeq'
       OR eq_condition='refurbished'
       OR eq_condition='Unknown condition')
     ORDER BY empl_firstname
          , empl_lastname
          , middlename  ASC"
      );
    }

elseif($state=='allstate' AND ($condition=='Available/Unassigned' OR $condition=='assigned' OR   $condition=='repair' OR $condition=='missingpart' OR $condition=='missingeq' OR $condition=='defective' OR $condition=='refurbished' OR $condition=='Unknown condition')){
  $sql = (
    "SELECT *
    from eq_inv
    left JOIN empl_tbl
      on eq_inv.empl_no=empl_tbl.empl_no
    WHERE
    eq_condition='$condition'
    AND (eq_state='new'
      OR eq_state='old'
      OR eq_state='Unknown state')
    AND (eq_inv_id LIKE '%$a%'
      OR eq_assign_id='$a'
      OR eqdesc LIKE '%$a%'
      OR brand LIKE '%$a%'
      OR eq_inv.empl_no LIKE '%$a%'
      OR tag_no LIKE '%$a%'
      OR serial_no LIKE '%$a%'
      OR model_no LIKE '%$a%'
      OR ip_add LIKE '%$a%'
      OR curr_equip_loc LIKE '%$a%'
      OR remarks LIKE '%$a%'
      OR par LIKE '%$a%')
    ORDER BY empl_firstname
      , empl_lastname
      , middlename  ASC"
      );
    }
elseif($condition=='allcondition' AND ($state=='new' OR $state=='old' OR $state=='Unknown state')){
  $sql = (
    "SELECT *
    from eq_inv
    left JOIN empl_tbl
      on eq_inv.empl_no=empl_tbl.empl_no
      WHERE eq_state='$state'
      AND (eq_condition='Available/Unassigned'
        OR eq_condition='assigned'
        OR eq_condition='repair'
        OR eq_condition='missingpart'
        OR eq_condition='missingeq'
        OR eq_condition='refurbished'
        OR eq_condition='Unknown condition')
      AND (eq_inv_id LIKE '%$a%'
          OR eq_assign_id='$a'
          OR eqdesc LIKE '%$a%'
          OR brand LIKE '%$a%'
          OR eq_inv.empl_no LIKE '%$a%'
          OR tag_no LIKE '%$a%'
          OR serial_no LIKE '%$a%'
          OR model_no LIKE '%$a%'
          OR ip_add LIKE '%$a%'
          OR curr_equip_loc LIKE '%$a%'
          OR remarks LIKE '%$a%'
          OR par LIKE '%$a%')
      ORDER BY empl_firstname
        , empl_lastname
        , middlename  ASC"
      );
    }
elseif($condition=='working' AND ($state=='new' OR $state=='old' OR $state=='Unknown state')){
            $sql = (
              "SELECT *
              from eq_inv
              left JOIN empl_tbl
                on eq_inv.empl_no=empl_tbl.empl_no
              WHERE
                eq_state='$state'
                AND(eq_inv_id LIKE '%$a%'
                    OR eq_assign_id='$a'
                    OR eqdesc LIKE '%$a%'
                    OR brand LIKE '%$a%'
                    OR eq_inv.empl_no LIKE '%$a%'
                    OR tag_no LIKE '%$a%'
                    OR serial_no LIKE '%$a%'
                    OR model_no LIKE '%$a%'
                    OR ip_add LIKE '%$a%'
                    OR curr_equip_loc LIKE '%$a%'
                    OR remarks LIKE '%$a%'
                    OR par LIKE '%$a%')
                AND (eq_condition='Available/Unassigned'
                    OR eq_condition='assigned')
                ORDER BY empl_firstname
                    , empl_lastname
                    , middlename  ASC"
                    );
                    }
elseif($condition=='working' AND ($state=='allstate')){
                    $sql = ("SELECT *
                      from eq_inv
                      left JOIN empl_tbl
                        on eq_inv.empl_no=empl_tbl.empl_no
                      WHERE eq_condition IN ('Available/Unassigned','assigned')
                      AND eq_state IN ('new'
                      ,'old'
                      ,'Unknown state')
                      AND(eq_inv_id LIKE '%$a%'
                          OR eq_assign_id='$a'
                          OR eqdesc LIKE '%$a%'
                          OR brand LIKE '%$a%'
                          OR eq_inv.empl_no LIKE '%$a%'
                          OR tag_no LIKE '%$a%'
                          OR serial_no LIKE '%$a%'
                          OR model_no LIKE '%$a%'
                          OR ip_add LIKE '%$a%'
                          OR curr_equip_loc LIKE '%$a%'
                          OR remarks LIKE '%$a%'
                          OR par LIKE '%$a%')
                      ORDER BY empl_firstname
                        , empl_lastname
                        , middlename  ASC"
                      );
                    }
else{
		$sql = (
      "SELECT *
      from eq_inv
      left JOIN empl_tbl
        on eq_inv.empl_no=empl_tbl.empl_no
        WHERE eq_state='$state'
        AND eq_condition='$condition'
        AND(eq_inv_id LIKE '%$a%'
            OR eq_assign_id='$a'
            OR eqdesc LIKE '%$a%'
            OR brand LIKE '%$a%'
            OR eq_inv.empl_no LIKE '%$a%'
            OR tag_no LIKE '%$a%'
            OR serial_no LIKE '%$a%'
            OR model_no LIKE '%$a%'
            OR ip_add LIKE '%$a%'
            OR curr_equip_loc LIKE '%$a%'
            OR remarks LIKE '%$a%'
            OR par LIKE '%$a%')
        ORDER BY empl_firstname
        , empl_lastname
        , middlename  ASC"
      );
    }
		$result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      $output .= '
              <table class="table" bordered="1">
                <tr>
                      <th>EQUIPMENT ID</th>
                      <th>DESCRIPTION</th>
                      <th>BRAND</th>
                      <th>EMPLOYEE NUMBER</th>
                      <th>FIRST NAME</th>
                      <th>MIDDLENAME</th>
                      <th>LAST NAME</th>
                      <th>TAG NUMBER</th>
                      <th>SERIAL NUMBER</th>
                      <th>MODEL NUMBER</th>
                      <th>IP ADDRESS</th>
                      <th>DATE ISSUED</th>
                      <th>EQ STATE</th>
                      <th>EQ CONDITION</th>
                      <th>DATE PURCHASED</th>
                      <th>PRICE</th>
                      <th>LOCATION</th>
                      <th>REMARKS</th>
                      <th>PROPERTY ACKNOWLEDGEMENT RECEIPT</th>
                </tr>
      ';
      while($row=mysqli_fetch_array($result)){
        $output .='
              <tr>
                      <td>'.$row["eq_inv_id"].'</td>
                      <td>'.$row["eqdesc"].'</td>
                      <td>'.$row["brand"].'</td>
                      <td>'.$row["empl_no"].'</td>
                        <td>'.$row["empl_firstname"].'</td>
                          <td>'.$row["middlename"].'</td>
                          <td>'.$row["empl_lastname"].'</td>
                            <td>'.$row["tag_no"].'</td>
                              <td>'.$row["serial_no"].'</td>
                                <td>'.$row["model_no"].'</td>
                                  <td>'.$row["ip_add"].'</td>
                                  <td>'.$row["date_issued"].'</td>
                                    <td>'.$row["eq_state"].'</td>
                                      <td>'.$row["eq_condition"].'</td>
                                        <td>'.$row["date_purch"].'</td>
                                        <td>'.$row["price"].'</td>
                                          <td>'.$row["curr_equip_loc"].'</td>
                                            <td>'.$row["remarks"].'</td>
                                              <td>'.$row["par"].'</td>

              </tr>
        ';
      }
      $output .='</table>';
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=AreaEQMonitoring.xls");
      echo $output;

    }
 ?>
