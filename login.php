<?php
ob_start();
session_start();
?>
<html>
<head>
<link rel="icon" href="Qes.png" type="login.jpg">
<title>Quiz Time</title>
</head>
<style>
.tab
{ height:70px;
  width:1335px;
  background:#2479C4;  
}
table,th,td 
{ border:1px solid black;
  border:none;
  border-collapse:collapse;
  border-top-style:;
  border-right-style:;
  border-bottom-style:;
}
.triangle-right 
{ width:0px;
  height:1px;
  border-top:179px solid transparent;
  border-left:200px solid #191970;
  border-bottom:179px solid transparent;
}
.triangle-arrow 
{ width:0px;
  height:1px;
  border-top:179px solid #53CF25;
  border-left:200px solid transparent;
  border-bottom:179px solid #53CF25;
}
.button1:hover 
{
  box-shadow: 0 12px 16px 0 rgba(255,255,255,0.24),0 17px 50px 0 rgba(255,255,255,0.24);
  transform:scale(1.03);
  color:white;
}
a:link 
{
  text-decoration: none;
}
a:visited 
{
  text-decoration: none;
}
a:hover 
{
  text-decoration: underline;
}
a:active 
{
  text-decoration: underline;
}
.sbi
{ background:#191970;
  height:359px;width:347px;
  margin-left:27px;
  margin-top:15px;
}
::placeholder
{
color:white;
opacity:0.3; 
font-weight:normal;   
}
</style>
<body>
<div class="tab">
<img style="margin-left:540" src="Qes.png" height="65" width="65" align="left">
<b><font size=40 color=white>Quiz Time</font></b>
</div>
<font size="20" color= face="Calibri" style="padding-top:100px;margin-left:450px">Online Assessment System</font>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886 style="margin-left:20px">Login to OAS</font></div>
<img style="margin-top:-46px;margin-right:1128px" src="arrow.png" height="50" width="60" align="right">
<div class="sbi_tab" style="padding:10px;height:22px;width:1123px;background:#CFE8FE;margin-left:190px;margin-top:-42px"><marquee><font color="red" face="Calibri">Online Assessment System</font></marquee></div>
<img style="margin-top:15px;position:relative" src="login.jpg" height="600" width=100% align="left">
<div style="position:relative;height:450px;width:300px;margin-left:50px;margin-top:90px;background:#53CF25;opacity:0.5"></div>    
   <div class="triangle-right" style="opacity:0.8;margin-left:477px;margin-top:-402px;position:absolute"></div>
   <div class="triangle-arrow" style="opacity:0.8;margin-left:527px;margin-top:-402px;position:absolute"></div>
   <div class="triangle-right" style="opacity:0.8;margin-left:727px;margin-top:-402px;position:absolute;border-left:200px solid #53CF25;"></div>
<div class="sbi" style="opacity:0.8;margin-top:-402px;margin-left:130px;position:relative;background-size:320px 300px;background-repeat:no-repeat;background-position:center" align="top">
<img style="position:relative;margin-left:130;margin-top:-548;opacity:0.6" src="log.png" height="90" width="90" align="left">  
<div style="position:absolute">    
<br><br>
<font color=white face="Calibri" size=2 style="margin-left:25px;font-weight:100;font-size:14px">(</font><font size=2 face="Calibri" color="#F76367" style="font-weight:100;font-size:14px">CARE</font><font face="Calibri" color=white style="font-weight:100;font-size:14px">:Username and password are case sensitive.)</font>
<br><br><font color=white face="Calibri" size=3 align="left" style="margin-left:25px">Username*</font>
<form action="" method="post">
<input type="text" name="username" placeholder="Username" style="background:#1770C1;border:none;margin-left:24px;height:35px;width:300px;padding-left:10px;outline:none;color:white;border-radius:3px"><br>
<font color=white face="Calibri" size=3 align="left" style="margin-left:25px">Pasaword*</font><br>
<input type="password" name="password" placeholder="Password" style="background:#1770C1;border:none;margin-left:24px;height:35px;width:300px;padding-left:10px;outline:none;color:white;border-radius:3px">
<font color=white face="Calibri" size=3 align="left" style="margin-left:25px">Role*</font><br>
<!--  -->
    <select name="role" id="cars" style="background:#1770C1;border:none;margin-left:24px;height:35px;width:300px;padding-left:10px;outline:none;color:white;border-radius:3px">
      <option value="none">Select</option>
      <option value="0">Teacher</option>
      <option value="1">Student</option>
    </select>
<br>
<?php
     if(isset($_POST['submit']))
        {    $uname=$_POST['username'];
             $pass=$_POST['password'];
             $role=$_POST['role'];
             if(empty($uname) || empty($pass) || $role=='none')
               {  if(empty($uname))
                    { echo '<script>alert("Enter Username")</script>'; }
                  elseif(empty($pass))
                    { echo '<script>alert("Enter Password")</script>'; }
				  else
				    { echo '<script>alert("Select Role")</script>'; }
               }
             else
               { $conn=new mysqli("localhost","root","","oas");
                   if ($conn->connect_error)
                        { die("Connection failed:".$conn->connect_error);
                        } 
                   $query="SELECT * FROM user_list WHERE user='".$uname."'";
                   $exist=mysqli_num_rows(mysqli_query($conn,$query));
                   $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
                   if($exist==0)
                        { echo '<div style="margin-left:24px"><font color="#F76367" face="Calibri" style="font-weight:200;font-style:normal">Wrong Username or Password</font><br></div>';}
                   else 
                        { if($result['pass']==$pass && $result['role']==$role)
                             {  $_SESSION['user']=$result['user'];
                                header("location:home.php");
                             }
                          else
                             {  echo '<div style="margin-left:24px"><font color="#F76367" face="Calibri" style="font-weight:200;font-style:normal">Wrong Username or Password</font><br></div>';}
                        }
               }
        }  
?><br>
<button class="button1" type="submit" name="submit" style="margin-left:24px;background:blue;border:none;height:31px;width:100;color:white">Login</button>
<button class="button1" type="reset" name="reset" style="margin-left:20px;background:blue;border:none;height:31px;width:100;color:white">Reset</button>
<br><br>
<a href="register.php" style="margin-left:25px"><font color="white" face="Calibri" style="font-weight:100;font-style:normal">New User ? Register here/Activate</a><br>
</form>
</div>
</div>
<div class="sbi_tab" style="background:#2C2D30;height:150px;margin-top:143px">
<img style="margin-left:20px;margin-top:10px" src="Verisign.png" height="90" width="150" align="left">
<ul type="square"  style="margin-left:190px;padding-top:22px"><font color="white" face="Calibri">
<li>Mandatory fields are marked with an asterisk (*)</li>
<li>Do not provide your username and password anywhere other than in this page</li>
<li>Your username and password are highly confidential.Never part with them.</li>
</font></ul><br>
<font color="white" face="Calibri" style="margin-left:25px">This site is certified by Verisign as a secure and trusted site. All information sent or received in this site is encrypted using 256-bit encryption
</div>
<div class="sbi_tab" style="background:#171718;height:35px;width:1320px;padding-left:15px;padding-top:15px">
<font color="white">Copyright : Quiz Time</font>
</div>
</body>
</html>