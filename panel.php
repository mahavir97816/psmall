<?php
session_start();
include("connection.php");
error_reporting(0);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/home/kali/Desktop/orionclub/assets/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>

function phone_color(){
document.getElementById("phone").style.backgroundImage = "url(/assets/cell_phone2.png)";
}

function pwd_color(){
document.getElementById("pwd").style.backgroundImage = "url(/assets/key2.png)";
}


function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 



function show_error(){
document.getElementById("error_div").style.display ="block";
}

</script>
</head>
<style>

/*text-indent:30px; to left the text in text fields*/
.header{
background:blue;
float:center;
width: auto;
height: 62px;
margin:-10px;
}

/*login button in the middle*/
.login_btn{
background:#2196f3;
  border: none;
  color: white;
  padding: 14px 14px;
  text-align: center;
  text-decoration: none;
  font-size: 14px;
border-radius: 2px;
width:15%;
}
.login_btn:hover{ /*when hover on login button change color*/
background:#33A1C9;
}

</style>

</head>
<body id="body_gradient">
<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;
<b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Admin Login</b>
</div>

<div id="error_div" style="background:red;float:center;display:none;;margin-top:12px;">
<p style="color:white;font-size:20px;margin:10px;">
Mobile Number or Password Wrong!
</p>
</div>

<center>
<form action="" method="POST">
<!-- text fields for password & number -->
<input id="phone" name="pnumber" onfocus="this.value='+91'" onclick="phone_color()" onkeypress="return onlyNumberKey(event)" style="margin-top:30px;margin-left:%;outline:none;text-indent:45px" maxlength="13" autocomplete="off" type="text" placeholder="Mobile Number" required><br>
<input id="pwd" name="passwd" onclick="pwd_color()" style="margin-top:30px;margin-left:%;outline:none;text-indent:50px;" maxlength="8" autocomplete="off" type="password" placeholder="Password" required><br>

<!-- login button -->

<p style="text-align:center;margin-top:30px;">
<input type="submit" style="width:250px;outline:none;" name="submit" class="login_btn" value="Login">
</p>

</form>
</center>
<?php

if(isset($_POST['submit']))
{

  $phone = $_POST['pnumber'];
  $passwd = $_POST['passwd'];
 

   //checking the username and passwords from database
  $query = "SELECT * from admins where phone_number='$phone' && password='$passwd'";
  $data = mysqli_query($conn,$query);
  $total = mysqli_num_rows($data);
  $result = mysqli_fetch_assoc($data);
  
  

  if($result['status']==1 && $total==1)
  {
    
    $_SESSION['phonenumber'] = $phone;
    header('location:control_center.php');
  }

  else
  {
    echo '<script type="text/javascript">',
    'show_error();',
    '</script>';

  }
  
}

?>




</body>
</html>
