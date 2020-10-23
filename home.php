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
.show
{ display:block;
  background-color:#DDD
}
.light
{ 
}
::placeholder 
{ color:white;
  opacity:0.3; 
  font-weight:normal;   
}
.nav
{ width:100%;
  background:#000033;
  height:50px;
  margin-top:0px;
}
.newa:hover
{ color:#4169e1;
  transform:scale(1.1);
}
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
{ height:350px;
  width:400px;
  border-radius:7px;
  background:white;
  margin-bottom:15px;
  box-shadow:1px 5px 13px #aaaaaa;
  box-shadow-left:7px #aaaaaa;
}
.box:hover
{ box-shadow:1px 5px 13px #aaaaaa;
  transform: scale(1.03);
  transition: transform 0.4s;
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
<?php
    $conn=new mysqli("localhost","root","","oas");
    if ($conn->connect_error)
     { echo '<script>alert("Enter Username")</script>';
     } 
	$id=$_SESSION['user'];
    $query="SELECT * FROM students WHERE user='".$id."'";
    $exist=mysqli_num_rows(mysqli_query($conn,$query));
    $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
	$query="SELECT * FROM ".$id."";
	$result2=mysqli_query($conn,$query);
	$row=mysqli_num_rows($result2);
	
?>
</style>
</head>
<body>
<div class="tab">
<img style="margin-left:4" src="Qes.png" height="65" width="65" align="left">
<font face="Calibri" size=15 color=#ff80aa>OAS</font>
</div>
<div class="tab" style="padding:10px;height:22px;width:180px;background:#ff0066" align="left"><font face="Calibri" size=4 color=#034886 style="margin-left:30px">Courses</font></div>
<img style="margin-top:-46px;margin-right:1123px" src="arrow.png" height="50" width="60" align="right">
<div class="tab" style="padding-left:80px;padding-top:8px;padding-bottom:10px;height:24px;width:1153px;background:#ff0066;margin-left:100px;margin-top:-42px">
<form method="get" id="form1"><button class="button1" type="submit" name="logout" style="margin-left:1035px;margin-top:-60px;background:#CFE8FE;border-radius:25px;border:none;outline:none;height:35px;width:100px;color:red"><b>Logout</b></button></form>
</div><br>
<form method="post">
<div style="display:flex;flex-wrap: wrap;">
<?php
	if($row>0)
      {  while($row=mysqli_fetch_assoc($result2))
          { ?>
	          <div class="box" style="margin-left:30px;margin-top:20px"><img src="course.jpg" height="200px" width="400px" style="border-top-left-radius:7px;border-top-right-radius:7px;padding-bottom:15px">
              <font face="Arial" size=5 style="margin-left:30px"><?php echo $row['courses'];?></font><br><br><br><br>
			  <?php if($row['flag']==0) 
			          { ?><font face="Arial" size=2 color="#008000" style="margin-left:30px"><u><?php echo "Course not started"; }?></u></font>
			  <?php if($row['flag']==1)
				      {	?><font face="Arial" size=2 color="#cccc00" style="margin-left:30px"><u><?php echo "Course completed"; }?></u></font>
			  <?php if($row['flag']==0) 
			          { ?><font face="Arial" size=2 style="margin-left:30px"><u><button class="button" type="submit" name="start" value="<?php echo $row['courses'];?>" style="background:#008000;margin-left:100px;border-radius:5px;border:none;outline:none;height:40px;width:110px;color:white"><?php echo "Start Course"; }?></button></u></font>
			  <?php if($row['flag']==1)
				      {	?><font face="Arial" size=2 style="margin-left:30px"><u><button style="background:#cccc00;margin-left:100px;border-radius:5px;border:none;outline:none;height:40px;width:110px;color:white" disabled><?php echo "Start Course"; }?></button></u></font>
			  
			  </div>
			  <?php
          }
      }
   ?>
</div>
</form>
<?php
   if(isset($_POST['start']))
     {  $_SESSION['cour']=$_POST['start'];
        header("location:Instructions.php"); 
     }
?>
<div class="tab" style="background:#2C2D30;height:150px">
<img style="margin-left:20px;margin-top:10px" src="Verisign.png" height="90" width="150" align="left">
<ul type="square"  style="margin-left:190px;padding-top:22px"><font color="white" face="Calibri">
<li>Mandatory fields are marked with an asterisk (*)</li>
<li>Do not provide your username and password anywhere other than in this page</li>
<li>Your username and password are highly confidential.Never part with them.</li>
</font></ul><br>
<font color="white" face="Calibri" style="margin-left:25px">This site is certified by Verisign as a secure and trusted site. All information sent or received in this site is encrypted using 256-bit encryption
</div>
<div class="tab" style="background:#171718;height:35px;width:1318px;padding-left:15px;padding-top:15px">
<font color="white">Copyright : Quiz Time</font>
</div>
</body>
</html>