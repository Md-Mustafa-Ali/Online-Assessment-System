<?php 
ob_start();
session_start();
if(!isset($_SESSION['user']))
    header("location:login.php");
if(isset($_GET['logout']))
  {  session_destroy();
     header("location:login.php");  }
?>
<html>
<head>
<link rel="icon" href="Qes.png" type="login.jpg">
<title>SBI online</title>
<style>
.anchor
{ width:170px;
  color:#191970;
  display:block;
  text-decoration:none;
  font-size:20px;
  text-align:center;
  border-radius=5px;
  font-family:High Tower Text;
  font-weight:bold;
}
.tab
{ height:65px;
  width:100%;
  background:#800080;  
}
.box
{ height:400px;
  width:85%;
  padding:30px;
  border-radius:7px;
  background:white;
  margin-bottom:15px;
  box-shadow:0px 7px 30px #aaaaaa;
  box-shadow-left:7px #aaaaaa;
}
.button 
{ outline:none;
  color:green;
  border-radius:5px;
}
.button:hover 
{ transform:scale(1.03);
  outline:none;
  color:white;
  border-radius:5px;
}
.button1:hover
{ transform:scale(1.1);
}
</style>
</head>
<body>
<div class="tab">
<img style="margin-left:4" src="Qes.png" height="65" width="65" align="left">
<font face="Calibri" size=15 color=#ff80aa>OAS</font>
</div><br><br>
<div class="box" style="margin-left:60px">
<font size=5 style="color:green"><b>Important instructions for Proctored test:</b></font><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;• The proctoring test requires you to be connected to a reliable network connection. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Ensure that you are connected to an uninterrupted internet connection. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Ensure that you clear your browser's cache, history and cookies. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Do not cover your web camera while taking up the test. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Students using mobile phone for taking up the test, should place it a proper and undisturbed position so that it doesn't shake during the test. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Use only the calculator available on the screen, do not use your own calculator. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Make sure you have blocked all notifications in the mobile/laptop/desktop before starting the test. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Ensure that you are seated in a separate room with calm environment. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Ensure that you have a clear background and your face has proper lighting when in front of the web camera. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Both ears to be visible in the web camera feed during the test. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Do not turn away from the monitor during test. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Keep your phone connected to your system via USB cable (Not Bluetooth or Wifi) before the test starts. <br>
&nbsp;&nbsp;&nbsp;&nbsp;• Our Al powered proctoring test will detect in case of any suspicious activities like using mobile phone, getting help from friend. So do not involve in any activities which are 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;classified as suspicious activities as per the instructions.  <br>
<a href="test.php"><button class="button" name="next" style="background:#008000;margin-left:500px;margin-top:30px;border-radius:5px;border:none;outline:none;height:40px;width:110px;color:white">NEXT</button></a>
<?php
   if(isset($_POST['next']))
      header("location:test.php");
?>
</div>
</body>
</html>