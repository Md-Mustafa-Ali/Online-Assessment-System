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
	$id=$_SESSION['cour'];
    $query="SELECT * FROM students WHERE user='".$id."'";
    $exist=mysqli_num_rows(mysqli_query($conn,$query));
    $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
	$query="SELECT * FROM ".$id."";
	$result2=mysqli_query($conn,$query);
	$row=mysqli_num_rows($result2);
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
<form method="post" action="">
  <?php
      if($row>0)
	   { while($row=mysqli_fetch_assoc($result2))
		  { echo $row['sno'].". ".$row['questions']."<br><br>";
	        echo '<input type="radio" name="'.$row['sno'].'" value="1">';
	        echo $row['op1']."<br>";
			echo '<input type="radio" name="'.$row['sno'].'" value="2">';
			echo $row['op2']."<br>";
			echo '<input type="radio" name="'.$row['sno'].'" value="3">';
			echo $row['op3']."<br>";
			echo '<input type="radio" name="'.$row['sno'].'" value="4">';
			echo $row['op4']."<br><br><br>";
		  }
	   }
  ?>
  <button class="button" type="submit" name="submit" style="margin-left:500px;margin-top:40px;border-radius:5px;border:none;outline:none;height:40px;width:110px;color:white">Submit</button>
<?php
	  if(isset($_POST['submit']))
	   {  $sum=0;
          while($ques)
          { if(!empty($_POST[$ques]))
             {  $query2="SELECT * FROM ".$id." WHERE sno='".$ques."'";
		        $cor=mysqli_fetch_assoc(mysqli_query($conn,$query2));
		        if($_POST[$ques]==$cor['ans'])
				  $sum++;
		     }
			 $ques--;
		  }
		  $query2="UPDATE ".$_SESSION['user']." SET op='".$sum."' WHERE courses='".$_SESSION['cour']."'";
		  mysqli_query($conn,$query2);
		  $_SESSION['score']=$sum;
          header("location:result.php");
       }
  ?>
</form>
</div>
</body>
</html>