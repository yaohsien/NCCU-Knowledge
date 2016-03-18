
<!DOCTYPE html>
<html lang="en">
  <head>
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
    <link href="jumbotron.css" rel="stylesheet">
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


   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       <a class="navbar-brand" href="home1.php"> 
            <span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true">GROUP10</span>

          </a>       

       </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
           
          </ul>


          <form class="navbar-form navbar-right">

            <button type="submit" class="btn btn-danger">我要求救</button>
          </form>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php
	
session_start();
if(isset($_SESSION['user'])){
	$_SESSION['correct']='N';
/*	if($_SESSION['count_all']>=5){
		$_SESSION['count_all']=0;
		$_SESSION['count_correct']=0;
	}*/
	
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
		$randomID=0;
		$countplus = $_SESSION['count_all']+1;
		switch ($countplus) {
			case '1':
				$randomID=$_SESSION['randomNo'][0];
				break;
			case '2':
				$randomID=$_SESSION['randomNo'][1];
				break;
			case '3':
				$randomID=$_SESSION['randomNo'][2];
				break;
			case '4':
				$randomID=$_SESSION['randomNo'][3];
				break;
			case '5':
				$randomID=$_SESSION['randomNo'][4];
				break;
		}
		$progbar = $countplus*20;
		$sql ="SELECT * FROM formalquestion WHERE formalID='$randomID' LIMIT 1";
		//$sql ="SELECT * FROM formalquestion WHERE formalCat='$_SESSION[questionCat]'";
		$result =mysqli_query($link,$sql);
		//$question = mysqli_fetch_assoc($result);
		$question = mysqli_fetch_array($result);



		echo"
		<div class='jumbotron'>
		  <div class='container'>
			<h1>Q".$countplus.":<br>".$question["formalQues"]."</h1>
		  </div>
		</div>
		<div class='container'>

		<div class='progress'>
		  <div class='progress-bar' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: ".$progbar."%;'>
		  ".$progbar."%
		  </div>
		</div>
		<div class='row'>";
		
		//↓↓判定答對答錯
		if (isset($_POST['answer'])) {
			$_SESSION['count_all']++;
			if($_POST['answer']==$question["formalAns"]){
				$_SESSION['count_correct']++;
				$_SESSION['correct']='Y';
				echo "<div class='jumbotron' align='center' size='10'><h2><font color='green'><b>答對了!</b></font></h2></div>";
			}
			else
				echo "<div class='jumbotron' align='center' size='10'><h2><font color='red'><b>答錯啦!</b></font></h2></div>";
			


			//$sql2 = "UPDATE formalquestion SET formalAnsch1=formalAnsch1+1 WHERE formalID='$question[formalID]'";
			//echo $question['formalID'];
			switch ($_POST['answer']) {
				case 'A':
					$sql2 = "UPDATE formalquestion SET formalAnsch1=formalAnsch1+1 WHERE formalID='$question[formalID]'";
					//echo 'A';
					break;
				case 'B':
					$sql2 = "UPDATE formalquestion SET formalAnsch2=formalAnsch2+1 WHERE formalID='$question[formalID]'";
					//echo 'B';
					break;
				case 'C':
					$sql2 = "UPDATE formalquestion SET formalAnsch3=formalAnsch3+1 WHERE formalID='$question[formalID]'";
					//echo 'C';
					break;
				case 'D':
					$sql2 = "UPDATE formalquestion SET formalAnsch4=formalAnsch4+1 WHERE formalID='$question[formalID]'";
					//echo 'D';
					break;
			}
			
			$result2 =mysqli_query($link,$sql2);
			$sql3 = "SELECT memberID from member WHERE memberAccount= '$_SESSION[user]'";
			$result3 =mysqli_query($link,$sql3);
			$mID=mysqli_fetch_array($result3);
			$sql4 = "INSERT INTO answer (memberID,formalID,answerCorrect) VALUES ('$mID[0]' ,'$question[formalID]','$_SESSION[correct]')";
			$result4 =mysqli_query($link,$sql4);
			
			if($_SESSION['count_all']<5){
				header("refresh: 1 ; url = game.php");
			}
			else{
				header("refresh: 1 ; url = result.php");
			}
		}


		echo"
		<form method='POST' action=''>
			<div class='col-md-3' align='center'>
				<div class='jumbotron'>";
				   echo "<p><input type='submit' class='btn btn-primary btn-lg btn-default' value='A' name='answer'></p>";
				echo"<p>".$question["formalAns1"]."</p>
				</div>
			</div>
			
			<div class='col-md-3' align='center'>
				<div class='jumbotron'>";
				   echo "<p><input type='submit' class='btn btn-primary btn-lg btn-default' value='B' name='answer'></p>";
				echo"<p>".$question["formalAns2"]."</p>
				</div>
			</div>
		
			<div class='col-md-3' align='center'>
				<div class='jumbotron'>";
				   echo "<p><input type='submit' class='btn btn-primary btn-lg btn-default' value='C' name='answer'></p>";
				echo"<p>".$question["formalAns3"]."</p>
				</div>
			</div>
			
			<div class='col-md-3' align='center'>
				<div class='jumbotron'>";
				   echo "<p><input type='submit' class='btn btn-primary btn-lg btn-default' value='D' name='answer'></p>";
				echo"<p>".$question["formalAns4"]."</p>
				</div>
			</div>
		   	</form>
			
		</div>	";

		mysqli_close($link); 
	}
}

else{
	echo "<div class='jumbotron' align='center' size='10'><p><p><b>請先登入再開始遊戲</b></p></p></div>";
	header("refresh: 1.5; url = home.php");
}
?>
		<!-- 
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">貢獻題庫</button>
            <button type="button" class="btn btn-default">全玩家排名</button>
            <button type="button" class="btn btn-default">個人成就 & 個人資料</button>
          </div>


          <p>
        <button type="button" class="btn btn-lg btn-default">貢獻題庫</button>
        <button type="button" class="btn btn-lg btn-primary">全玩家排名</button>
        <button type="button" class="btn btn-lg btn-success">個人成就 & 個人資料</button>
        <button type="button" class="btn btn-lg btn-info">小圖</button>
         </p> -->

      </div><!-- /container -->

      <hr>

    <footer class="footer">
      <div class="container">
          <center><p>&copy; ADB GROUP 10</p></center>
                      
      </div>

    </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
