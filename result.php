
<!DOCTYPE html>
<?php session_start();
?>

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
       <a class="navbar-brand" <?php if(isset($_SESSION['user'])){ echo 'href="home1.php"'; }
		else {echo 'href="home.php"';} ?> > 
            <span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true">GROUP10</span>

          </a>        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <!--<li><a href="rule.php">遊戲規則</a></li>-->
            <?php if(isset($_SESSION['user'])){ echo '<li><a href="addq.php">貢獻題庫</a></li>'; }
		else {echo '';} ?>
            <li class="active"><a href="rank.php">玩家排名</a></li>
            <li><a href="introduce.php">工人介紹</a></li>
			<?php if(isset($_SESSION['user'])){ echo '<li><a href="memberdata.php">個人成就 & 個人資料</a></li>'; }
		else {echo '';} ?>
            
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

  <div class="jumbotron">
      <div class="container">
        <br><h1>遊戲結果</h1>
       <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>   -->
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                      <h2></h2>               
              </tr>
            </thead>

                <?php
                  $dbname = 'nccuknowledge';
                  $link = @mysqli_connect('localhost','root',$pass ,$dbname);
                  if(!mysqli_select_db($link, $dbname))
                    die("無法開 $dbname 資料庫!<br/>");
                  else{
                    mysqli_query($link, 'SET CHARACTER SET utf8');
                    mysqli_query($link, "SET collaction = 'urf8_general_ci'");
                    mysqli_query($link, 'SET NAMES utf8');
                    mysqli_query($link, 'SET CHARTACTER_SET_CLIENT=utf8');
                    mysqli_query($link, 'SET CHARACTER_SET_RESULT=utf8');
                    
					$sql = "SELECT COUNT(*) FROM answer, member 
							WHERE answer.memberID = member.memberID 
							AND memberAccount = '$_SESSION[user]' 
							AND answerCorrect = 'Y'";
					$result =mysqli_query($link,$sql);
					$totalcorrect=mysqli_fetch_array($result);			
                    
					$sql = "SELECT memberID, memberName FROM member
							WHERE memberAccount = '$_SESSION[user]' LIMIT 1";
					$result =mysqli_query($link,$sql);
					$member=mysqli_fetch_assoc($result);
					
					$sql = "SELECT COUNT(*) FROM answer, member 
							WHERE answer.memberID = member.memberID 
							AND memberAccount = '$_SESSION[user]'";
					$result =mysqli_query($link,$sql);
					$total=mysqli_fetch_array($result);
					
					echo "<tbody>";
					
					echo "</tr><td><h3>姓名</h3></td><td><h3>".$member['memberName']."</h3></td>";
					echo "</tr><td><h3>本回合正確題數</h3></td><td><h3>".$_SESSION['count_correct']." / ".$_SESSION['count_all']."</h3></td>";
					echo "</tr><td><h3>總答對題數 / 總答題數</h3></td><td><h3>".$totalcorrect[0]." / ".$total[0]."</h3></td>";	
					//echo "</tr><td>答題正確率</td><td>".$totalcorrect[0]/$total[0]."</td>";
					echo "</tr><td><h3>ps. 10秒後自動跳轉頁面<td>";
                    echo "</tbody>";

					//↓↓判定總答題數成就↓↓
					if($total[0]>=50){
						$sql = "INSERT INTO memberach (memberID,achID) VALUES ('$member[memberID]' ,3)";
						$result =mysqli_query($link,$sql);
					}
					else if($total[0]>=30){		
						$sql = "INSERT INTO memberach (memberID,achID) VALUES ('$member[memberID]' ,2)";
						$result =mysqli_query($link,$sql);						
					}
					else if($total[0]>=5){				
						$sql = "INSERT INTO memberach (memberID,achID) VALUES ('$member[memberID]' ,1)";
						$result =mysqli_query($link,$sql);						
					}
					else{
						
					}
					//↓↓判定答對題數成就↓↓
					if($totalcorrect[0]>=50){			
						$sql = "INSERT INTO memberach (memberID,achID) VALUES ('$member[memberID]' ,6)";
						$result =mysqli_query($link,$sql);						
					}
					else if($totalcorrect[0]>=30){		
						$sql = "INSERT INTO memberach (memberID,achID) VALUES ('$member[memberID]' ,5)";
						$result =mysqli_query($link,$sql);						
					}
					else if($totalcorrect[0]>=5){			
						$sql = "INSERT INTO memberach (memberID,achID) VALUES ('$member[memberID]' ,4)";
						$result =mysqli_query($link,$sql);							
					}
					else{				
					
					}
					
                    mysqli_close($link);  
                  }
				  header("refresh: 10 ; url = home1.php");
				  
                  ?>
          </table>
        </div>
      </div>


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
