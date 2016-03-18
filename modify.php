<?php session_start(); 
?>
<html>
<head>
	<title>NccuKnowledge管理介面</title>       
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

	$id = $_GET['id'];
	$pass = '';//密碼要記得改
	$dbname = 'nccuknowledge';
	$link = @mysqli_connect('localhost','root',$pass,$dbname);
	echo "<center><div class='texttype'>原資料</div></center>";
	if (!mysqli_select_db($link, $dbname) ){
		die("無法開 $dbname 資料庫!<br/>");}
	else{
		mysqli_query($link, 'SET CHARACTER SET utf8');
		mysqli_query($link, "SET collaction = 'urf8_general_ci'");
		mysqli_query($link, 'SET NAMES utf8');
		mysqli_query($link, 'SET CHARTACTER_SET_CLIENT=utf8');
		mysqli_query($link, 'SET CHARACTER_SET_RESULT=utf8');
		$sql_ori ="SELECT * FROM member WHERE memberID = '$id' ";
		$result_ori = mysqli_query($link,$sql_ori);
		$fieldsnum=mysqli_num_fields($result_ori);

		echo "<center><div class='tabletype'><table border=2>";
		echo "<td ALIGN='CENTER' VALIGN='CENTER' >會員ID</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >會員帳號</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >會員密碼</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >會員大頭貼</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >會員名字</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >刪去法</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >推薦答案</td>
		<td ALIGN='CENTER' VALIGN='CENTER' >跳過此題</td></tr>";
		while($row = mysqli_fetch_array($result_ori)){
			echo "<tr>"; 
			for($j=0;$j<$fieldsnum;$j++){
				if($row[$j]==null)
					echo "<td ALIGN='CENTER' VALIGN='CENTER' > 無</td>";
				else
					echo "<td ALIGN='CENTER' VALIGN='CENTER' > $row[$j] </td>";
			}
			echo"</tr>";
			$ID = $row[0];
			$Account = $row[1];
			$Pwd = $row[2];
			$Pic = $row[3];
			$Name = $row[4];
			$Res1 = $row[5];
			$Res2 = $row[6];
			$Res3 = $row[7];
		 }
		echo "</table></div></center></br>";
		
		if(isset($_POST["memberID"])){	//判斷拿到值，就開始動作
			$memberID=$_POST['memberID']; //拿到後面那個值，然後給他一個名稱，
			$memberAccount=$_POST['memberAccount'];
			$memberPwd=$_POST['memberPwd'];
			$memberPic=$_POST['memberPic'];
			$memberName=$_POST['memberName'];
			$memberRes1=$_POST['memberRes1'];
			$memberRes2=$_POST['memberRes2'];
			$memberRes3=$_POST['memberRes3'];
			$sql_update = "Update member Set memberID = '$memberID',memberAccount = '$memberAccount',memberPed = '$memberPwd',
			memberPic = '$memberPic', memberName = '$memberName' , memberRes1='$memberRes1' , memberRes2 = 'memberRes2' , memberRes3 = 'memberRes3'
			WHERE memberID = '$id'"; //memberID = '$memberID' 意思是，前面那個是資料庫的欄位，後面那個是剛剛給的變數名稱的值
			$result =mysqli_query($link,$sql_update);
			
			header('Location: validate.php?id='.$memberID);

			}
	mysqli_close($link);}
	}
?>
	<center><form method="POST" action="">
		<div class='texttype'>【修改會員資料】</div></br>
		
		<div member='tabletype'>會員ID：<input type="text" placeholder = "<?php echo $ID ;?>" required="required" name="memberID" maxlength=11></div></br>
		<div member='tabletype'>會員帳號：<input type="text" placeholder = "<?php echo $Account ;?>" required="required" name="memberAccount"></div></br>
		<div member='tabletype'>會員密碼：<input type="text" placeholder = "<?php echo $Pwd ;?>"name="memberPwd"></div></br>
		<div member='tabletype'>會員照片：<input type="text" placeholder = "<?php echo $Pic ;?>" name="memberPic" placeholder="例 0912-345-678"></div></br>
		<div member='tabletype'>會員名字：<input type="text" placeholder = "<?php echo $Name ;?>" name="memberName" placeholder="例 abc123@gmail.com"></div></br>
		<div member='tabletype'>刪去法：<input type="text" placeholder = "<?php echo $Res1 ;?>" name="memberRes1" placeholder="例 0912-345-678"></div></br>
		<div member='tabletype'>推薦答案：<input type="text" placeholder = "<?php echo $Res2 ;?>" name="memberRes2" placeholder="例 0912-345-678"></div></br>
		<div member='tabletype'>跳過此題：<input type="text" placeholder = "<?php echo $Res3 ;?>" name="memberRes3" placeholder="例 1/1"></div></br>
		<input type="submit" value="修改">
		<input type="reset" value="重設">
	</form>
	<div class='texttype'><a href='searchmodify.php'>回管理介面</a></div></center>
	
</body>

</html>