<!DOCTYPE html>
<html lang="en">
<head><title>Verzontal Equip. Monitoring</title>
<meta charset="UTF-8">
<?php include ("connect.php"); ?>
<link rel="icon" type="image/png" href="icon/logo2.png" />
<link rel="stylesheet" type="text/css" href="css/indexstyle.css" />
</head>
<body>
  <br>
  <br>
  
 
  <img src="icon/index.png" height="40" weight="110">

   <div class="box">
     <h2>Login</h2>
     <form action="login.php" method="post">
       <div class="inputBox">
         <input type="text" name="uname" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Username</label>
       </div>
       <div class="inputBox">
         <input type="password" name="psw" onkeyup="this.setAttribute('value', this.value);" value="" required>
         <label>Password</label>
       </div>
       <input type="submit" name="sign-in" value="Sign In">
     </form>
   </div>
</body>
</html>
