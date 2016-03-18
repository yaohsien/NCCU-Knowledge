



<?php session_start(); 
?>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>後台</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            後台管理系統
          </a>


        </div>

	    <ul class="nav navbar-nav navbar-right">
	            <li>
	            	<a href="home.php">
	            	 <span class="glyphicon glyphicon-home" aria-hidden="true">  回首頁</span>
					</a>
				</li>
	     </ul>
      </div>
  </nav>



 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li  class="active"><a href="searchmodify.php">會員管理 <span class="sr-only">(current)</span></a></li>
            <li ><a href="selectq.php">題目上架管理</a></li>
          </ul>
        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">會員資料

 			<a href="add.php">    
                <button type="button" class="btn btn-danger">新增會員</button>
            </a>  
           </h1>
        	    <table class="table table-striped">

        	    	<thead>
		                <tr>
		                  <th>會員ID</th>
		                  <th>帳號</th>
		                  <th>密碼</th>
		                  <th>姓名</th>
		                  <th>功能</th>               
		                </tr>
		             </thead>



<?php
if( $_SESSION['user']!="admin@admin"){
	echo'<meta http-equiv="refresh" content="0;url= home1.php">';
}
else{

	

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'nccuknowledge';
	$link = @mysqli_connect($host,$user,$pass,$dbname);

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
                   
		
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			$memberID = $row["memberID"];
			
			echo 
				"<td>".$row["memberID"]."</td>
				<td>".$row["memberAccount"]."</td>
				<td>".$row["memberPwd"]."</td>
				<td>".$row["memberName"]."</td>
				";
		 //    echo"<td><a href=\"modify.php?id=".$memberID."\">修改</a></td>";
			// echo"<td><a href=\"delet.php?id=".$memberID."\">刪除</a></td>";


			echo'<td>
				<div class="btn-group" role="group" aria-label="...">
                      <a href="modify.php?id='.$memberID.'">
                            <button type="button" class="btn btn-default">
                             修改
                             </button>
                        </a>  
                       <a href="delet.php?id='.$memberID.'">
                           	 <button type="button" class="btn btn-default">
                           	 刪除
                             </button>
                         </a>
                 </div>
                 </td>

			';
			
			}
			echo "</tr></div>";		
		}
		
		echo "</table>";
		mysqli_close($link);}
	?>


		             <tbody>




		             </tbody>	
        	    </table>


     	 </div>
      </div>
  </div>







		  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/docs/assets/js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>
</html>