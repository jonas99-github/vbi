<html>
<body>

  <form action="about.php?section=equipment&emp_no=<?php echo $row['empl_no'];?>" method="POST">
  <input type="submit" name="submit" value="Go to profile">
  </form>
  <?php
  if($position=='IT Admin'){
    ?>
  <a href="updequipinv.php?emp_no=<?php echo $row['empl_no'];?>&id=<?php echo $row['eq_inv_id'];?>">Update EQ</a>
<?php
}
?>
<button>Assign equipment</button>
</body>
</html>
