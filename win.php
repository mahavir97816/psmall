<?php
session_start();
include("connection.php");
error_reporting(0);

$id = $_SESSION['id'];
$q_avail = "SELECT * from wallet where user_id = $id";
$run_q_avail = mysqli_query($conn,$q_avail);
$wallet_result = mysqli_fetch_assoc($run_q_avail);
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ps Club</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="win.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
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

/*recharge button color change on hover function*/
function recharge_color(){
document.getElementById("recharge1").style.color ="#954697";
document.getElementById("recharge").src = "/img/recharge1.png";
}

function recharge_color1(){
document.getElementById("recharge1").style.color ="black";
document.getElementById("recharge").src = "/img/recharge.png";
}

/*withdraw button color change on hover function*/
function withdraw_color(){
document.getElementById("withdraw1").style.color ="#954697";
document.getElementById("withdraw").src = "/img/withdraw1.png";
}

function withdraw_color1(){
document.getElementById("withdraw1").style.color ="black";
document.getElementById("withdraw").src = "/img/withdraw.png";
}

/*transaction button color change on hover function*/
function transaction_color(){
document.getElementById("transaction1").style.color ="#954697";
document.getElementById("transaction").src = "/img/transaction1.png";
}

function transaction_color1(){
document.getElementById("transaction1").style.color ="black";
document.getElementById("transaction").src = "/img/transaction.png";
}


/*bank card button color change on hover function*/
function card_color(){
document.getElementById("card1").style.color ="#954697";
document.getElementById("card").src = "/img/card1.png";
}

function card_color1(){
document.getElementById("card1").style.color ="black";
document.getElementById("card").src = "/img/card.png";
}

/*Promotion button color change on hover function*/
function promotion_color(){
document.getElementById("promotion1").style.color ="#954697";
document.getElementById("promotion").src = "/img/gift_card2.png";
}

function promotion_color1(){
document.getElementById("promotion1").style.color ="black";
document.getElementById("promotion").src = "/img/gift_card.png";
}

/*win button color change on hover function*/
function win_color(){
document.getElementById("win1").style.color ="#954697";
document.getElementById("win").src = "/img/win1.png";
}

function win_color1(){
document.getElementById("win1").style.color ="black";
document.getElementById("win").src = "/img/win.png";
}

/*secure button color change on hover function*/
function secure_color(){
document.getElementById("secure1").style.color ="#954697";
document.getElementById("secure").src = "/img/secure1.png";
}

function secure_color1(){
document.getElementById("secure1").style.color ="black";
document.getElementById("secure").src = "/img/secure.png";
}

/*about button color change on hover function*/
function about_color(){
document.getElementById("about1").style.color ="#954697";
document.getElementById("about").src = "/img/about1.png";
}

function about_color1(){
document.getElementById("about1").style.color ="black";
document.getElementById("about").src = "/img/about.png";
}

function hr1(){
document.getElementById("hr1").style.visibility ="";
document.getElementById("hr2").style.visibility ="hidden";
}

function hr2(){
document.getElementById("hr2").style.visibility ="";
document.getElementById("hr1").style.visibility ="hidden";
}





</script>
</head>
<!-- style section start -->
<style>
/*input fields icon color change to #954697*/
/*text-indent:30px; to left the text in text fields*/
/* yellow color for icons #FFD700*/


/* The Modal (background) */
.modal {
 z-index: 1; /* Sit on top */
display:none;
position:fixed;
top:50%;
left:50%;
transform:translate(-50%,-50%);
width:80%;
height:auto;
  overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: black;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 99%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatecenter;
  animation-duration: 0.5s
}


/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 10px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

@keyframes animatecenter {
  from {-50%; opacity:0}
  to {50%; opacity:1}
}

/*increment/decrement buttons in modal*/
.contract_btn{
background:black;
  border: none;
  color: yellow;
  text-align: center;
  text-decoration: none;
  font-size: 15px;
border-radius: 2px;
font-weight:bold;
margin:0px;
height:38px;
}
.contract_btn:hover{ /*hower effect on bet buttons*/
background:yellow;
color:black;
}

/*cancel & confirm button in modal*/
.modal_footer_btn{
background:black;
  border: none;
  color: yellow;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  font-size: 15px;
border-radius: 2px;
font-weight:bold;
margin:5px;
}
.modal_footer_btn:hover{ /*hower effect on  buttons*/
background:#181818;
}
</style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<div class="header">
<br>
<b style="margin:20px;color:white;font-size:20px;">Available balance:&#8377; <?php echo $wallet_result['available_balance']; ?></b><br>

<button onclick="location.href='recharge.html'" style="Margin:20px;position:relative" class="recharge_button">Recharge</button>
<button  class="rules_btn">Read Rules</button>
</div>


<div style="width:100%;height:50px;margin-top:5px">
<div onclick="hr1()" style="width:50%;height:50px;float:left">
<p style="text-align:center;margin-top:15px;color:yellow"><b>Parity</b></p>
</div>
<div onclick="hr2()" style="width:50%;height:50px;float:right">
<p style="text-align:center;margin-top:15px;color:yellow"><b>Sapre</b></p>
</div>
</div>
<hr id="hr1" style="margin-top:0px;color:yellow;border: 1px dashed yellow;width:48%;float:left;">
<hr id="hr2" style="visibility:hidden;margin-top:0px;color:yellow;border: 1px dashed yellow;width:48%;float:right;">


<!-- holder for bet buttons -->
<div class="timer_holder">
<!--Period number holder -->
<div style="height:75px;width:50%;background:none;float:left">
<b style="font-size:30px;color:yellow;">&#127942;</b><b style="font-size:20px;color:yellow;">Period</b><br><br>
<b id="round" style="font-size:30px;color:yellow;margin:10px;"> </b>
</div>

<!--countdown text holder -->
<div style="height:75px;width:50%;background:none;float:right">
<b style="font-size:20px;color:yellow;float:right;margin-right:5px">Count Down</b><br>

<!--cloak holder holder -->
<div style="float:right;background:;margin-top:0px;width:100%;height:30px">
<span style="text-align:center;border-radius:4px;height:100%;width:50px;background:grey;float:right;margin-right:5px;"><b id="mins" style="font-size:30px;color:yellow;"></b></span>



<span style="text-align:center;border-radius:4px;height:100%;width:20px;float:right;margin-right:5px;"><b style="font-size:30px;color:yellow;">:</b></span>

<span  style="text-align:center;border-radius:4px;height:100%;width:50px;background:grey;float:right;margin-right:5px;"><b id="secs" style="font-size:30px;color:yellow;"></b></span>


</div>
</div>
</div>



<div class="color_holder">

<button id="join_green" onclick="join_green()" style="margin:10px;float:left;position:relative;" class="green_button">Join Green</button>

<button id="join_voilet" onclick="join_voilet()" style="margin-left:6%;margin-right:6%;position:relative" class="voilet_button">Join Voilet</button>

<button id="join_red" onclick="join_red()" style="margin:10px;float:right;position:relative" class="red_button">Join Red</button>
</div>

<p style="text-align:center;margin-left:1%;">

<input onclick="num='Select 0';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="0">

<input onclick="num='Select 1';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="1">

<input onclick="num='Select 2';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="2">

<input onclick="num='Select 3';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="3">

<input onclick="num='Select 4';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="4">

<input onclick="num='Select 5';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="5">

<input onclick="num='Select 6';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="6">

<input onclick="num='Select 7';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="7">

<input onclick="num='Select 8';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="8">

<input onclick="num='Select 9';join_number();" type="button" style="width:50px;outline:none;" class="bet_btn" value="9">
</p>

<div style="width:100%;height:50px;margin-top:0px;background:none">
<p style="text-align:center;margin-left:1%;">
&#127942;<br>
<b style="font-size:20px;color:yellow;margin:10px;">Parity Record</b>
</p>
</div>
<hr style="border:1px dashed yellow;margin-top:0px;">

<table style="width:100%;color:yellow;text-align:center">
<tr>
<th>Period</th>
<th>Price</th>
<th>Number</th>
<th>Color</th>
</tr>

<tr>
<td>xxxxxx</td>
<td>xxxxxx</td>
<td>xxxxxx</td>
<td>xxxxxx</td>
</tr>

<tr>
<td>xxxxxx</td>
<td>xxxxxx</td>
<td>xxxxxx</td>
<td>xxxxxx</td>
</tr>
</table>
<hr style="border:1px dashed yellow;margin-top:0px;">

<div style="width:100%;height:50px;margin-top:0px;background:none">
<p style="text-align:center;margin-left:1%;">
<br>
<b style="font-size:20px;color:yellow;margin:10px;">My Parity Record</b>
</p>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" id="modal-header">
      <h2 id="pop_heading"> </h2>
    </div>
    <div class="modal-body"><br>
<b style="color:yellow">Contract Money</b>
<br>
<br>
	<div style="float:left;width:auto;height:auto;outline: #4CAF50 solid 1px;">
	      <button onclick="select_contract_10();ind=10;" id="contract_amount_10" style="outline:none;" class="contract_btn">10</button>
      <button id="contract_amount_100" onclick="select_contract_100();ind=100" style="outline:none;" class="contract_btn">100</button>

      <button onclick="select_contract_1000();ind=1000;" id="contract_amount_1000" style="outline:none;" class="contract_btn">1000</button>

      <button onclick="select_contract_10000();ind=10000" id="contract_amount_10000" style="outline:none;" class="contract_btn">10000</button>
	</div><br><br><br>
<b style="color:yellow;">Contract Count</b>
<br><br>
<button onclick="decrease()" style="outline:none;background:yellow;color:black;" class="bet_btn">&minus;</button>

<input id="multiply" type=text" style="width:50%;height:40px;outline:none;color:yellow;text-align:center;background:none;font-size:30px;box-sizing:border-box;border:2px black;" readonly>

<button onclick="increase()" style="outline:none;background:yellow;color:black;" class="bet_btn">&plus;</button>




<p style="color:yellow">Total contract money is <i id="total_betting">10</i> </p>


<input type="checkbox">
<label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>
    
    <br><br>

<div style="float:right;width:99%;height:auto;background:;"> 
<button style="float:right;outline:none;color:blue;" class="modal_footer_btn">CONFIRM</button>

<button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
</div>
<br><br><br>
    </div>
  </div>

</div>

<script>
var num="";
var ind=10;
var h= new Date().getHours();
var m= new Date().getMinutes();
var s= new Date().getSeconds();
var past_seconds=(60*60*h)+(60*m)+s;
var current_round=past_seconds/180+1;

var period = parseInt(current_round);

document.getElementById("round").innerHTML=period;

switch(m)
{
case 0:
var next_round=180-s;
break;

case 1:
var next_round=120-s;
break;

case 2:
var next_round=60-s;
break;

case 3:
var next_round=180-s;
break;

case 4:
var next_round=120-s;
break;

case 5:
var next_round=60-s;
break;

case 6:
var next_round=180-s;
break;

case 7:
var next_round=120-s;
break;

case 8:
var next_round=60-s;
break;

case 9:
var next_round=180-s;
break;

case 10:
var next_round=120-s;
break;

case 11:
var next_round=60-s;
break;

case 12:
var next_round=180-s;
break;

case 13:
var next_round=120-s;
break;

case 14:
var next_round=60-s;
break;

case 15:
var next_round=180-s;
break;

case 16:
var next_round=120-s;
break;

case 17:
var next_round=60-s;
break;

case 18:
var next_round=180-s;
break;

case 19:
var next_round=120-s;
break;

case 20:
var next_round=60-s;
break;

case 21:
var next_round=180-s;
break;

case 22:
var next_round=120-s;
break;

case 23:
var next_round=60-s;
break;

case 24:
var next_round=180-s;
break;

case 25:
var next_round=120-s;
break;

case 26:
var next_round=60-s;
break;

case 27:
var next_round=180-s;
break;

case 28:
var next_round=120-s;
break;

case 29:
var next_round=60-s;
break;

case 30:
var next_round=180-s;
break;

case 31:
var next_round=120-s;
break;

case 32:
var next_round=60-s;
break;

case 33:
var next_round=180-s;

break;case 34:
var next_round=120-s;
break;

case 35:
var next_round=60-s;
break;

case 36:
var next_round=180-s;
break;

case 37:
var next_round=120-s;
break;

case 38:
var next_round=60-s;
break;

case 39:
var next_round=180-s;
break;


case 40:
var next_round=120-s;
break;

case 41:
var next_round=60-s;
break;

case 42:
var next_round=180-s;
break;

case 43:
var next_round=120-s;
break;

case 44:
var next_round=60-s;
break;

case 45:
var next_round=180-s;
break;

case 46:
var next_round=120-s;
break;

case 47:
var next_round=60-s;
break;

case 48:
var next_round=180-s;
break;

case 49:
var next_round=120-s;
break;

case 50:
var next_round=60-s;
break;

case 51:
var next_round=180-s;
break;

case 52:
var next_round=120-s;
break;

case 53:
var next_round=60-s;
break;

case 54:
var next_round=180-s;
break;

case 55:
var next_round=120-s;
break;

case 56:
var next_round=60-s;
break;

case 57:
var next_round=180-s;
break;58
case 4:
var next_round=120-s;
break;

case 59:
var next_round=60-s;
break;

case 60:
var next_round=180-s;
break;
}




var timeInSecs;
var ticker;
function startTimer(secs) {
timeInSecs = parseInt(secs);
ticker = setInterval("tick()", 1000); 
}

function tick( ) {
var secs = timeInSecs;
if(secs<=30 && secs>0)
{
timeInSecs--; 
}

else if (secs > 0) {
timeInSecs--; 
}

else {
clearInterval(ticker);
startTimer(3*60);
reload1();
}

var days= Math.floor(secs/86400); 
secs %= 86400;
var hours= Math.floor(secs/3600);
secs %= 3600;
var mins = Math.floor(secs/60);
secs %= 60;
var sec_load=( (mins < 10) ? "0" : "" ) + mins;
document.getElementById("secs").innerHTML =sec_load;

var min_load=( (secs < 10) ? "0" : "" ) + secs;
document.getElementById("mins").innerHTML = min_load;

}

startTimer(next_round); 
function reload1()
{
window.setTimeout(function () {
  window.location.reload();
}, 300);

}


// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



function exit_pop() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function join_number()
{
document.getElementById("multiply").value="1";
modal.style.display="block";
document.getElementById("contract_amount_10").style.background="yellow";
document.getElementById("contract_amount_10").style.color="black";
document.getElementById("pop_heading").style.color="black";
document.getElementById("pop_heading").innerHTML=num;
document.getElementById("modal-header").style.background="yellow";

}


function join_green()
{
document.getElementById("multiply").value="1";
document.getElementById("pop_heading").innerHTML="Join Green";
modal.style.display="block";
document.getElementById("contract_amount_10").style.background="yellow";
document.getElementById("contract_amount_10").style.color="black";
}

function join_voilet()
{
document.getElementById("modal-header").style.background="#9900CC";
document.getElementById("multiply").value="1";
document.getElementById("pop_heading").innerHTML="Join Voilet";
modal.style.display="block";
document.getElementById("contract_amount_10").style.background="yellow";
document.getElementById("contract_amount_10").style.color="black";
}

function join_red()
{
document.getElementById("modal-header").style.background="#E00000";
document.getElementById("multiply").value="1";
document.getElementById("pop_heading").innerHTML="Join Red";
modal.style.display="block";
document.getElementById("contract_amount_10").style.background="yellow";
document.getElementById("contract_amount_10").style.color="black";
}

function select_contract_100()
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*100;
document.getElementById("total_betting").innerHTML=total_betting;

document.getElementById("contract_amount_100").style.background="yellow";
document.getElementById("contract_amount_100").style.color="black";

document.getElementById("contract_amount_10").style.background="black";
document.getElementById("contract_amount_10").style.color="yellow";

document.getElementById("contract_amount_1000").style.background="black";
document.getElementById("contract_amount_1000").style.color="yellow";

document.getElementById("contract_amount_10000").style.background="black";
document.getElementById("contract_amount_10000").style.color="yellow";
}

function select_contract_10()
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*10;
document.getElementById("total_betting").innerHTML=total_betting;

document.getElementById("contract_amount_10").style.background="yellow";
document.getElementById("contract_amount_10").style.color="black";

document.getElementById("contract_amount_100").style.background="black";
document.getElementById("contract_amount_100").style.color="yellow";

document.getElementById("contract_amount_1000").style.background="black";
document.getElementById("contract_amount_1000").style.color="yellow";

document.getElementById("contract_amount_10000").style.background="black";
document.getElementById("contract_amount_10000").style.color="yellow";
}

function select_contract_1000()
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*1000;
document.getElementById("total_betting").innerHTML=total_betting;

document.getElementById("contract_amount_1000").style.background="yellow";
document.getElementById("contract_amount_1000").style.color="black";

document.getElementById("contract_amount_10").style.background="black";
document.getElementById("contract_amount_10").style.color="yellow";

document.getElementById("contract_amount_100").style.background="black";
document.getElementById("contract_amount_100").style.color="yellow";

document.getElementById("contract_amount_10000").style.background="black";
document.getElementById("contract_amount_10000").style.color="yellow";
}

function select_contract_10000()
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*10000;
document.getElementById("total_betting").innerHTML=total_betting;

document.getElementById("contract_amount_10000").style.background="yellow";
document.getElementById("contract_amount_10000").style.color="black";

document.getElementById("contract_amount_10").style.background="black";
document.getElementById("contract_amount_10").style.color="yellow";

document.getElementById("contract_amount_1000").style.background="black";
document.getElementById("contract_amount_1000").style.color="yellow";

document.getElementById("contract_amount_100").style.background="black";
document.getElementById("contract_amount_100").style.color="yellow";
}

function decrease()
{
var dec=document.getElementById("multiply").value;
dec--;
document.getElementById("multiply").value=dec;

if(ind==10)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*10;
document.getElementById("total_betting").innerHTML=total_betting;
}

else if(ind==100)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*100;
document.getElementById("total_betting").innerHTML=total_betting;
}

else if(ind==1000)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*1000;
document.getElementById("total_betting").innerHTML=total_betting;
}

else if(ind==100)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*10000;
document.getElementById("total_betting").innerHTML=total_betting;
}

}

function increase()
{
var dec=document.getElementById("multiply").value;
dec++;
document.getElementById("multiply").value=dec;

if(ind==10)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*10;
document.getElementById("total_betting").innerHTML=total_betting;
}

else if(ind==100)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*100;
document.getElementById("total_betting").innerHTML=total_betting;
}

else if(ind==1000)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*1000;
document.getElementById("total_betting").innerHTML=total_betting;
}

else if(ind==100)
{
var multi=document.getElementById("multiply").value;
var total_betting= multi*10000;
document.getElementById("total_betting").innerHTML=total_betting;
}
}
</script>


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
