
<!DOCTYPE html>
<?php session_start(); 
?>
<html lang="en">
  <head>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       <a class="navbar-brand" <?php if(isset($_SESSION['user'])){ echo 'href="home1.php"'; }
		else {echo 'href="home.php"';} ?> > 
            <span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true">GROUP10</span>

          </a>        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <!--<li><a href="rule.php">遊戲規則</a></li>-->
            <?php if(isset($_SESSION['user'])){ echo '<li><a href="addq.php">貢獻題庫</a></li>'; }
		else {echo '';} ?>
            <li><a href="rank.php">玩家排名</a></li>
            <li ><a href="introduce.php">工人介紹</a></li>
            
			<?php if(isset($_SESSION['user'])){ echo '<li ><a href="logout.php">登出</a></li>'; }
		else {echo '';} ?>
		<?php if(isset($_SESSION['user']) && $_SESSION['user'] =="admin@admin"){ echo '<li><a href= "searchmodify.php ">管理介面</a></li>'; }
		else {echo '';} ?>
			<li ><a><?php if(isset($_SESSION['user'])){ echo $_SESSION['user']; }
		else {echo "";} ?></a></li>
		
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>NccuKnowledge</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <br><br><br>
      <form class="form-signin" method="POST" >
        <h2 class="form-signin-heading">註冊會員</h2>
       
        <input type="text" id="inputName" name="nn" class="form-control" placeholder="姓名" required>
		<label for="inputName" class="sr-only">姓名</label><br>
		<input type="email" id="inputAccount" name="account" class="form-control" placeholder="E-mail" required>
		<label for="inputAccount" class="sr-only">帳號ID</label><br>
        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="密碼" required>
		<label for="inputPassword" class="sr-only">密碼</label>
        
		
       <br><!--
       <center> <img class="img-circle" src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/1002643_738474766162883_2017843211_n.jpg?oh=5be4df3065752dafc67388200efef3f1&oe=5576A1EA&__gda__=1438253125_5ee79c005ad24368fcce52088311e6e2" width="140" height="140">
            -->
        大頭貼<input type="file" id="exampleInputFile"></center> 
          
		  
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
       <button class="btn btn-lg btn-primary btn-block" type="reset">清除</button>
	   <button class="btn btn-lg btn-primary btn-block" type="submit">完成</button>
		
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
	<?php
	
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
		if(isset($_POST["account"])){
			$account = $_POST["account"];
			$pwd=$_POST['pwd'];
			$name=$_POST['nn'];
			
			$check = "SELECT memberAccount FROM member WHERE memberAccount = '$account'";
			$chechresult= mysqli_query($link,$check);
			$checkdata = mysqli_fetch_array($chechresult);
			if ($checkdata){  
			echo  '<center><h2 class="glyphicon glyphicon-user">這個帳號已經註冊過了喔!!!!</h2></center>';}
			else{

			$sql="INSERT INTO`nccuknowledge`.`member` (`memberAccount`, `memberPwd`,`memberName`) VALUES ('$account','$pwd','$name')";
			$result =mysqli_query($link,$sql);
			echo'<br>';
			echo '<button class="btn btn-lg btn-primary btn-block" type="button">註冊完成!!!3秒後回首頁</button>';
			echo '<meta http-equiv="refresh" content="0;url=home1.php">';
			
			$_SESSION['user']= $account;
			$_SESSION['count_all']=0;
		}}
		mysqli_close($link);	
	}?>
  </body>
</html>
