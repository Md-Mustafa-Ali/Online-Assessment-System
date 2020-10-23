<?php 
ob_start();
session_start();
if(!isset($_SESSION['score']))
    header("location:login.php");
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
{ height:auto;
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
  background:#008000;
  border-radius:5px;
}
.button:hover 
{ transform:scale(1.03);
  outline:none;
  background:#00b300;
  border-radius:5px;
}
.button1:hover
{ transform:scale(1.1);
}
<?php
    $conn=new mysqli("localhost","root","","oas");
    if ($conn->connect_error)
     { echo '<script>alert("Enter Username")</script>';
     } 
	$id="algoritms";
    $query="SELECT * FROM ".$_SESSION['user']." WHERE courses='".$_SESSION['cour']."'";
    $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
	$row=mysqli_num_rows($result);
	$ques=$row;
?>
</style>
</head>
<body>
<div class="tab">
<img style="margin-left:4" src="Qes.png" height="65" width="65" align="left">
<font face="Calibri" size=15 color=#ff80aa>OAS</font>
</div><br><br>
<div class="box" style="margin-left:60px;display:block;overflow:auto">
<form method="post">
<font size=5 style="color:black;margin-left:460px">Your Score : <?php echo $_SESSION['score']; ?> / <?php echo $result['max']; ?></font><br>
<button class="button" type="submit" name="ok" style="margin-left:500px;margin-top:40px;border-radius:5px;border:none;outline:none;height:40px;width:110px;color:white">OK</button>
</form>
<?php
 if(isset($_POST['ok']))
  {  session_destroy();
     header("location:login.php");  
  }
?>
</div>
</body>
</html>