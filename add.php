<?php session_start(); 
?>
<html>
<head>
	<title>NccuKnowledge</title>       
	<meta http-equiv="Content-Type:text/html; charset=utf8">  <!--  使用utf8編碼   -->

	<!--  useing css   -->
	<style type="text/css">   
		.texttype{
			font-size: larger;
			font-family: "微軟正黑體";
		}
		.tabletype{
			font-family: "微軟正黑體";		
		}
	</style> 
</head>
<body>
	<center><form method="POST" action="">
		<div member='texttype'>【新增會員資料】</div></br>
		<div member='tabletype'>會員ID：<input type="text" required="required" name="memberID" maxlength=11></div></br>
		<div member='tabletype'>會員帳號：<input type="text" required="required" name="memberAccount"></div></br>
		<div member='tabletype'>會員密碼：<input type="text" name="memberPwd"></div></br>
		<div member='tabletype'>會員照片：<input type="text" name="memberPic" ></div></br>
		<div member='tabletype'>會員名字：<input type="text" name="memberName" ></div></br>
		<div member='tabletype'>刪去法：<input type="text" name="memberRes1" ></div></br>
		<div member='tabletype'>推薦答案：<input type="text" name="memberRes2" ></div></br>
		<div member='tabletype'>跳過此題：<input type="text" name="memberRes3" ></div></br>
		<input type="submit" value="送出">
		<input type="reset" value="重設">
	</center></form>
	<center><div member='texttype'><a href='searchmodify.php'>回管理介面</a></div></center></br>
<?php
if( $_SESSION['user']!="admin@admin"){
	echo'<meta http-equiv="refresh" content="0;url= home1.php">';
}
else{
   	$pass = '';//密碼要記得改
	$dbname = 'nccuknowledge';
	$link = @mysqli_connect('localhost','root',$pass ,$dbname);

	if (!mysqli_select_db($link, $dbname) )
   		die("無法開 $dbname 資料庫!<br/>");
	else{
		mysqli_query($link, 'SET CHARACTER SET utf8');
		mysqli_query($link, "SET collaction = 'urf8_general_ci'");
		mysqli_query($link, 'SET NAMES utf8');
		mysqli_query($link, 'SET CHARTACTER_SET_CLIENT=utf8');
		mysqli_query($link, 'SET CHARACTER_SET_RESULT=utf8');
		if(isset($_POST["memberID"])){
			$memberID=$_POST['memberID'];
			$memberAccount=$_POST['memberAccount'];
			$memberPwd=$_POST['memberPwd'];
			$memberPic=$_POST['memberPic'];
			$memberName=$_POST['memberName'];
			$memberRes1=$_POST['memberRes1'];
			$memberRes2=$_POST['memberRes2'];
			$memberRes3=$_POST['memberRes3'];

			$sql="INSERT INTO `nccuknowledge`.`member` (`memberID`, `memberAccount`, `memberPwd`, `memberPic`, `memberName`, `memberRes1`, `memberRes2`, `memberRes3`) 
			VALUES ('$memberID','$memberAccount','$memberPwd','$memberPic','$memberName','$memberRes1','memberRes2','memberRes3')";
			$result =mysqli_query($link,$sql);
			
			 header( "Location: validate.php?id=$memberID" );
		}
	mysqli_close($link);	}
	}
?>
</body>
</html>