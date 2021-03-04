<?php
include("connection.php");
error_reporting(0);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="register.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  function phone_color(){
  document.getElementById("phone").style.backgroundImage = "url(/img/cell_phone2.png)";
  }

  function pwd_color(){
  document.getElementById("pwd").style.backgroundImage = "url(/img/key2.png)";
  }

  function otp_color(){
  document.getElementById("otp").style.backgroundImage = "url(/img/otp2.png)";
  }

  function rcode_color(){
  document.getElementById("rcode").style.backgroundImage = "url(/img/gift_card2.png)";
  }


  function footer_home_color(){
  document.getElementById("f_home").style.color ="#2196f3";
  }

  function footer_my_color(){
  document.getElementById("f_my").style.color ="#2196f3";
  }

  function onlyNumberKey(evt) { 
            
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 
  function goBack() {
    window.history.back();
  }

  function goto_login(){
    window.location.href = "login.php";

  }

  function show_error(){
  document.getElementById("error_div").style.display ="block";
  }

  function check_num(){
  document.getElementById("check_div").style.display ="block";
  }

</script>
</head>
<style>
  /*icon color change to #954697*/

  /*text-indent:30px; to left the text in text fields*/
  .header{
  background:blue;
  float:center;
  width: auto;
  height: 62px;
  margin:-10px;
  }

  /*container for footer buttons*/
  .footer{
  position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
  height:auto;
    background-color: white;
    color: grey;
    text-align: left;
  }

  /*login button in the middle*/
  .login_btn{
  background:#2196f3;
    border: none;
    color: white;
    padding: 14px 14px;
    text-align: center;
    text-decoration: none;
    font-size: 17px;
  border-radius: 2px;
  width:15%;

  }
  .login_btn:hover{ /*when hover on login button change color*/
  background:#33A1C9;
  }

  /*buttons in the footer*/
  .footer_btn{
  background:white;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
  border-radius: 2px;
  width:auto;
  }
  .footer_btn:hover{ /*when hover on footer buttons change color*/
  background:#C0C0C0;
  }

  /*reg & forgot pwd buttons*/
  .reg_btn{
  background:#D3D3D3;
    border: none;
    color: black;
    padding: 11px 15px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
  border-radius: 2px;
  width:10%;
  }
  .reg_btn:hover{ /*hower effect on reg & forgot pwd buttons*/
  background:#A9A9A9;
  }


  /*div which have centererd elements*/
  .center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
    border: none; 
  }


</style>

</head>
<body id="body_gradient" style="font-family: Roboto,sans-serif;">

<!-- Header for back button and login text at top -->
<div class="header">
  <br>&emsp;
  <img onclick="goBack()" alt="home.html" src="/assets/arrow.png" width="25" height="25">

  <b style="margin-left:16px;margin-bottom:10px;font-size:20px;color:white;">Register</b>
</div>

<div id="error_div" style="background:red;float:center;display:none;height:40px;margin-top:12px;">
  <p style="color:white;font-size:20px;margin:10px;">
  Mobile Number Already Exist!
  </p>
</div>

<div id="check_div" style="background:red;float:center;display:none;height:40px;margin-top:12px;">
  <p style="color:white;font-size:18px;margin:10px;">
  PLEASE CHECK YOUR MOBILE NUMBER!!
  </p>
</div>
<center>
<form action="" method="GET"> 
  <!-- phone number-->
  <input id="phone" name="pnumber" onfocus="this.value='+91'"  onclick="phone_color()" onkeypress="return onlyNumberKey(event)" style="background-image: url('/img/cell_phone.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px" maxlength="13" autocomplete="off" type="text" placeholder="Mobile Number" required /><br>
  
  <!-- otp-->
  <input id="otp"  onclick="otp_color()" onkeypress="return onlyNumberKey(event)" style="background-image: url('/img/otp.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px;width:75%;" maxlength="6" autocomplete="off" type="text" placeholder="Varification Code" required />
  <button style="width:auto;outline:none;" class="reg_btn">OTP</button>

  <!-- password-->
  <input id="pwd" name="passwd" onclick="pwd_color()" style="background-image: url('/img/key.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="password" placeholder="Password" required /><br>

  <!-- recommendation code-->
  <input id="rcode" name="reffral"  onclick="rcode_color()" style="background-image: url('/img/gift_card.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="text" placeholder="Recommendendation Code" required /><br><br>

  <input style="margin-left:25px;" type="checkbox" checked><b style="color:black;font-size=5px;">I read and agree to  </b><a href="home.html" style="text-decoration:none;color:purple;"> Terms & Conditions</a>
 <br><br>
  <!-- Register button -->
  
  <input type="submit" style="width:250px;outline:none;" name="submit"  class="login_btn" value="Register">
  
</form>
</center>
 
<?php
if(isset($_GET['submit']))
{

    // storing form data into variables
      $phone = $_GET['pnumber'];
      $passwd = $_GET['passwd'];
      $code = $_GET['reffral'];
  
    
    //checking if number already exist or not
    $check_query = "SELECT * from users where phone_number='$phone'";
    $checking = mysqli_query($conn,$check_query);
    $rows_found = mysqli_num_rows($checking);

    if($rows_found>0)
    {
      //if 1 row found,means number exist.So show error message
      echo '<script type="text/javascript">',
      'show_error();',
      '</script>';
    }

    else 
    {
    //if number not registered then find the length of the phone number provided by user.
    $l = strlen($phone);
    
    //if length is less than 13 means number wrong, so show error message.
    if($l!=13)
    {
      echo '<script type="text/javascript">',
      'check_num();',
      '</script>'; 
    }

      //if the given number if correct, then this section will run.
    else
    {       
      //to find the id of the new user here we find the total records.
        $q= "SELECT * from users";
        $d = mysqli_query($conn,$q);
        $getid= mysqli_num_rows($d);
        $getid = $getid+1001; //total records + 1 will be the new id of the new user.


      
      //inserting into the users table
        $query = "INSERT INTO users Values('$getid','$phone','$passwd','$code','$getid','1')";
        $data = mysqli_query($conn,$query);
      
        if($data)
      {
      //inserting into the wallet table
      $query_wallet = "INSERT into wallet values('$getid','$getid','0')";
      mysqli_query($conn,$query_wallet);
      
      //to find the order number.
      $od= "SELECT * from recharge";
      $d_r = mysqli_query($conn,$od);
      $order= mysqli_num_rows($d_r);
      $order = $order+1; //total records + 1 will be the new order number.
      

      //finding unique promotion id to insert
      $sql_promotion= "SELECT * from promotion";
      $data_sql_promotion = mysqli_query($conn,$sql_promotion);
      $promotion_id= mysqli_num_rows($data_sql_promotion);
      $promotion_id = $promotion_id+1001; //total records + 1 will be the new id of the new user.


      //inserting into promotion table
      $inserting = "INSERT INTO promotion values('$promotion_id','0','0','$getid')";
      mysqli_query($conn,$inserting);

      
      //checking the old bonus and number of refrals of the refering account
      $refrals = mysqli_query($conn,"SELECT * from promotion where promotion_id ='$code'");
      $refrals_result  =  mysqli_fetch_assoc($refrals);
      $number_of_refrals = $refrals_result['refrals'];
      $total_bonus = $refrals_result['bonus'];
      $number_of_refrals = $number_of_refrals+1;
      $total_bonus=$total_bonus+128;

      $add_refral = "Update promotion set bonus = '$total_bonus' ,refrals='$number_of_refrals' where promotion_id ='$code' ";
      mysqli_query($conn,$add_refral);       
    
       //if data inserted succesfuly , goto login page
        echo '<script type="text/javascript">',
        'goto_login();',
        '</script>';
      }

        else
        {
          echo '<script>alert("Please Try Again Later!")</script>';
          header("location:login.php"); 
        }
      } 
    }
  }
?>

<br><br><br><br>
<!-- footer start -->
<div class="footer">

  <!-- home button in footer -->
  <button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

  <!-- My account button in footer -->
  <button  onclick="footer_my_color();location.href='my_account.php'" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>

</div>

</body>
</html>
