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
<?php  
if( $_SESSION['user']!="admin@admin"){
	echo'<meta http-equiv="refresh" content="0;url= home1.php">';
}
else{

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
			if (!$result){
				echo "<center><div class='texttype'><font size=5>修改失敗！</font></div>".mysqli_error($link)."</center>";}
			else{
				echo "<center><div class='texttype'><font size=5>".$id."修改完成</font></div></center>"; 
				echo "<center>等候自動跳轉回學生資料頁面，如未跳轉請點選&nbsp&nbsp<a href='searchmodify.php'>回首頁</a></center>";
				header("refresh: 2.5 ; url = searchmodify.php");
			}
			
		}
			
				
	}
   					
				
			
			
		        
		
		echo "</table></center>";
mysqli_close($link);}
	
?>

</body>
</html>