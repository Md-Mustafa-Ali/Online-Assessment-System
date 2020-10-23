<html>
<head>
<title>oas</title>
<style>
<?php
 ob_start();
 session_start();
?>
.content 
{ background-color:#0f315c;
  width:92%;
}
}
::placeholder 
{ color:white;
  opacity:0.3; 
  font-weight:normal;   
}
.space
{ width:96%;
  background:#021f43;
  height:27px;
  margin-left:0px;
  margin-top:10px;
}
.details
{ width:98%;
  background:#000033;
  height:572px;
  margin-left:0px;
  margin-top:5px; 
  padding-bottom:50px;
}
.sbi_tab
{ height:88px;
  width:1335px;
  background:#2479C4;  
}
.button2:hover 
{
  box-shadow: 0 12px 16px 0 rgba(255,255,255,0.24),0 17px 50px 0 rgba(255,255,255,0.24);
  transform:scale(1.03);
  color:white;
}
.button1:hover 
{
  box-shadow: 0 12px 16px 0 rgba(255,255,255,0.24),0 17px 50px 0 rgba(255,255,255,0.24);
  transform:scale(1.03);
  color:white;
}
</style>
</head>
<body>
<p id="test"></p>
<div class="sbi_tab">
<img style="margin-left:550" src="Qes.png" height="65" width="65" align="left">
<b><font size=40 color=white>Quiz Time</font></b>
</div>
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:350px">User Driven Registration - New User</font> 
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>New User Registration</font></div>
<img style="margin-top:-46px;margin-right:1105px" src="arrow.png" height="50" width="60" align="right">
<div class="sbi_tab" style="padding:10px;height:22px;width:1123px;background:#CFE8FE;margin-left:190px;margin-top:-42px"></div><br>
<div class="details" style="padding-left:40px;margin-left:270px;width:65%"><br><font style="color:white">REGISTER</font><br>  
<div class="space" style="outline:none;background-color:#191970;width:94.9%;border:0px;padding-top:9px;text-align:left">
<font style="color:white">&nbsp;&nbsp;PERSONAL&nbsp; DETAILS</font></div><br>         
<div id="myDropdown" class="content" style="padding-left:25px;padding-top:17px;padding-bottom:17px;height:78%">
<font color=red face="Calibri">ALL fields are required</font><br><br>
      <form action="register.php" method="post"><font face="Californian FB" color="white">
<font style="color:white;padding-left:0px;padding-right:130px">UID*</font>
<input type="text" name="UID" placeholder="UID" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="9">
<font color=white face="Calibri" style="font-weight:100;font-size:14px">(UID issued from institute)</font>
<br><br>
<font style="color:white;padding-left:0px;padding-right:88px">Username *</font>
<input type="text" name="username" placeholder="Username" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="100">
<br><br>
<font style="color:white;padding-left:0px;padding-right:91px">Password *</font>
<input type="text" name="password" placeholder="Password" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="100">
<br><br>
<font style="color:white;padding-left:0px;padding-right:33px">Confirm Password *</font>
<input type="text" name="con_password" placeholder="Password" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="100">
<br><br>
<font style="color:white;padding-left:0px;padding-right:51px">Mobile Number *</font>
<input type="text" name="Mobile_Number" placeholder="Mobile Number" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:13px" maxlength="10">
<font color=white face="Calibri" style="font-weight:100;font-size:14px">(Please enter registered Mobile Number)</font>
<br><br>
<font style="color:white;padding-left:0px;padding-right:98px">Email ID *</font>
<input type="text" name="Email" placeholder="Email" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="50">
<br><br><br>
<button class="button1" type="submit" name="submit" style="margin-left:24px;background:blue;border:none;height:35px;width:110;color:white">Register</button>
<button class="button1" type="reset" name="reset" style="margin-left:30px;background:blue;border:none;height:35px;width:110;color:white">Reset</button>
</form>
<?php
    function validate($value,$num)
      { if(is_numeric($value) && $num==strlen($value))
           return true;
        else
           return false;
      }
    function val_e($value)
      { if(filter_var($value,FILTER_VALIDATE_EMAIL))
           return true;
        else
           return false;
      }
    if(isset($_POST['submit']))
        { $UID=$_POST['UID'];
          $UN=$_POST['username'];
          $P=$_POST['password'];
          $CP=$_POST['con_password'];
          $MN=$_POST['Mobile_Number'];
          $EM=$_POST['Email'];
          if(empty($UID) || empty($UN) || empty($P) || empty($CP) || empty($MN) || empty($EM))
               echo '<script>alert("All fields are required")</script>';  
          else{ if(validate($UID,9)==false)
                   echo '<script>alert("Enter valid UID")</script>';
                elseif($P!=$CP)
                   echo '<script>alert("Password must be same")</script>';
                elseif(validate($MN,10)==false)
                   echo '<script>alert("Enter valid mobile number")</script>';
                elseif(val_e($EM)==false)
                   echo '<script>alert("Enter valid Email ID")</script>';
                else
                   {  $conn=new mysqli("localhost","root","","institute"); 
                      if ($conn->connect_error)
                        { die("Connection failed:".$conn->connect_error);
                        } 
                      $query="SELECT * FROM name_institute WHERE Teacher_UID='".$UID."'";
                      $exist=mysqli_num_rows(mysqli_query($conn,$query));
                      $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
                      if($exist==0)
                          echo '<script>alert("UID not found........Your are not the teacher of institute")</script>';
                      elseif($result['mobile']!=$MN)
                          echo '<script>alert("Please enter registerd mobile number")</script>';
                      else
                         { mysqli_close($conn);
						   $conn=new mysqli("localhost","root","","oas");
					       $query="SELECT * FROM teachers WHERE UID='".$UID."'";
					       $test=mysqli_num_rows(mysqli_query($conn,$query));
                           if($test>0)
                              echo '<script>alert("You are already registered")</script>';
						   else
						     { mysqli_query($conn,"INSERT INTO user_list (user,pass,role) VALUES('".$UN."','".$P."','0')");
                               mysqli_query($conn,"INSERT INTO teachers (UID,user) VALUES('".$UID."','".$UN."')");
					           echo '<script>alert("Success.......registered with OAS!")</script>';
							   header("location:login.php");
							 }
                         }
                   }
              }
        }
?>
</div></div>
<div class="sbi_tab" style="background:#2C2D30;height:150px">
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