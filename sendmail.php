<!-- Rahul N Dhole
     dholerahul@sggs.ac.in-->
<title>Fast Mail</title>
<body bgcolor="#FFFF99">
<?php
$a=rand(2,9); $b=rand(2,9); $c=$a+$b;
?>
<h1 align = "center" style = "color : blue">Fast Mail</h1>
<h3 align = "center" style = "color : green"><i>This is a emergency email service by </i><b>Softysolutions Team</b></h3>
<h3 align = "center" style = "color : green"><i>To send email quickly at very low internet speed</i></h3>
<?php
$message="";
$captchamsg="";
$history = "";
$conn = mysqli_connect("localhost","a1100935_fmail","password");
mysqli_select_db($conn, "a1100935_fmail");
$sql = 'SELECT COUNT(*) FROM sent';
$res = mysqli_query($conn, $sql);
$history = mysqli_fetch_array($res);
if(count($_POST)>0) {
//echo $_POST['captcha']."/".$_POST['captchaver'];
if($_POST['to']&&$_POST['from']&&$_POST['sub']&&$_POST['msg']&&$_POST['captcha']&&$_POST['captchaver']){
$to = $_POST['to'];
$subject = $_POST['sub'];
$msg = "".$_POST['msg']." This mail is sent by fast mail service from ip: ".$_SERVER['REMOTE_ADDR']."\r\n http://fastmail.softysolutions.in";
$txt = wordwrap($msg,150);
// Always set content-type when sending HTML email
$headers = "From: ".$_POST['from']. "\r\n" .
"BCC: fastmail@softysolutions.in";
$retval = false;
if($_POST['captchaver'] == $_POST['captcha']){
$conn = mysqli_connect("localhost","a1100935_fmail","password");
mysqli_select_db($conn, "a1100935_fmail");
// (`to`, `from`, `subject`, `message`, `ip`, `date`) 
$sql = "INSERT INTO `a1100935_fmail`.`sent` VALUES ('".$_POST['to']."', '".$_POST['from']."', '".$_POST['sub']."','".$_POST['msg']."','".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d h:i:s')."')";
$result = mysqli_query($conn, $sql);
if($result){
//$retval = mail($to,$subject,$txt,$headers);
$retval = true;
}else{
$message = "This website is out of service for 1 day";
}
}else
{
$captchamsg = "Invalid Captcha!!!";
}
if( $retval == true )  
   {
      $message = "Message sent successfully...";
   }
   else
   {
      $message = "Message could not be sent...";
   }

}
else{
$message = "Something is missing!!!";
}
}
?>
<h4 align = "right" style="font-family:Comic Sans MS" style="color:#0033CC" style="border style:solid"><?php if($history[0]!="") { echo "Total email's sent by us is ".$history[0]." only..."; } ?></h4>
<hr />
<!--<body bgcolor = "silver">-->
<div align = "center">
<span style = 'color:maroon'>
<form name="frmUser" method="post" action="">
<div class="message">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style = 'color:red'><?php if($message!="") { echo $message; } ?></span></div>
To:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "email" name = "to" size = "50" style="background:#99FFFF" style="font-family:Comic Sans MS" style="color:#0033CC" style="border style:solid"><br />
From:&nbsp&nbsp&nbsp&nbsp<input type = "email" name = "from" size = "50" value = "mail@softysolutions.in"  style="background:#99FFFF" style="font-family:Comic Sans MS" style="color:#0033CC" style="border style:solid"><br />
Subject:&nbsp<input type = "text" name = "sub" value = ""  size = "50" style="background:#99FFFF" style="font-family:Comic Sans MS" style="color:#0033CC" style="border style:solid"><br /><br />
Message<br />&nbsp&nbsp&nbsp&nbsp<textarea rows="7" cols="70" name = "msg"  size = "150" style="background:#99FFFF" style="font-family:Comic Sans MS" style="color:#0033CC" style="border style:solid">Type message of 150 characters only.</textarea><br  /><br />
<?php echo $a." + ".$b." = ";?><input type = "text" name = "captcha" style="background:#99FFFF" style="font-family:Comic Sans MS" style="color:#0033CC" style="border style:solid">
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style = 'color:red'><?php if($captchamsg!="") { echo $captchamsg; } ?></span></div>
<br />
<input type = "hidden" name = "captchaver" value = "<?php echo $c; ?>">
<input type = "submit" value = "Send mail">
</form>
<a href = "sendmail.php">Click here to refresh</a>
</span>
</div>
</body>
<hr />
</body>
