<?php session_start(); 
?>
<html>
<head>
</head>
<body>
<?php
if( $_SESSION['user']!="admin@admin"){
	echo'<meta http-equiv="refresh" content="0;url= home1.php">';
}
else{
    
	//echo "<center><div class='texttype'><a href='add.php'>新增學生資料</a> &nbsp;&nbsp;&nbsp; <a href='del.php'>刪除學生資料</a></div></center>";

	$pass = '';//密碼要記得改
	$dbname = 'nccuknowledge';
	$link = @mysqli_connect('localhost','root',$pass,$dbname);

	if (!mysqli_select_db($link, $dbname) )
   		die("無法開 $dbname 資料庫!<br/>");
	else{
		mysqli_query($link, 'SET CHARACTER SET utf8');
		mysqli_query($link, "SET collaction = 'urf8_general_ci'");
		mysqli_query($link, 'SET NAMES utf8');
		mysqli_query($link, 'SET CHARTACTER_SET_CLIENT=utf8');
		mysqli_query($link, 'SET CHARACTER_SET_RESULT=utf8');

		$sql ="SELECT * FROM member ORDER BY memberID ASC";
		$result =mysqli_query($link,$sql);

		if(isset($_GET["id"])){
			$id=$_GET['id'];
			$SQLL="DELETE FROM `nccuknowledge`.`tempquestion` WHERE `tempquestion`.`tempID`='$id'";
			$result2 =mysqli_query($link,$SQLL);
				
			if (!$result2){
				echo "<center><div class='texttype'><font size=5>刪除失敗！</font></div>".mysqli_error($link)."</center>";}
			else{
				echo "<center><div class='texttype'><font size=5>".$id."刪除完成</font></div></center>";
				echo "<center>等候自動跳轉回管理介面，如未跳轉請點選&nbsp&nbsp<a href='searchmodify.php'>回管理介面</a></center>";
				header("refresh: 0.05 ; url = selectq.php");
			}
			
		}




	}
	mysqli_close($link);
}
?>

</body>
</html>