
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

          </a>      </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <!--<li><a href="rule.php">遊戲規則</a></li>-->
            <?php if(isset($_SESSION['user'])){ echo '<li><a href="addq.php">貢獻題庫</a></li>'; }
		else {echo '';} ?>
            <li><a href="rank.php">玩家排名</a></li>
            <li ><a href="introduce.php">工人介紹</a></li>
			<li><a href="memberdata.php">個人成就 & 個人資料</a></li>

            
			<?php if(isset($_SESSION['user'])){ echo '<li ><a href="logout.php">登出</a></li>'; }
		else {echo '';} ?>
		<?php if(isset($_SESSION['user']) && $_SESSION['user'] =="admin@admin"){ echo '<li><a href= "selectq.php ">管理介面</a></li>'; }
		else {echo '';} ?>
			<li ><a><?php if(isset($_SESSION['user'])){ echo $_SESSION['user']; }
		else {echo "";} ?></a></li>
		
		 <?php
			
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
				//set up 5 random questions and go to game.php
				if(isset($_POST['start1'])||isset($_POST['start2'])||isset($_POST['start3'])||isset($_POST['start4'])){

          $_SESSION['randomNo'][0]=$_SESSION['randomNo'][1]=$_SESSION['randomNo'][2]=$_SESSION['randomNo'][3]=$_SESSION['randomNo'][4]=0;

					if(isset($_POST['start4'])){
              $_SESSION['questionCat']='綜合';
            $sql = "SELECT formalID 
                    FROM formalquestion 
                    WHERE formalID NOT IN 
                          (SELECT formalID 
                           FROM answer a,member m 
                           WHERE memberAccount='$_SESSION[user]' 
                           AND a.memberID=m.memberID)";
                  //ORDER BY rand()";
          }
					else{
            if(isset($_POST['start1'])){
              $_SESSION['questionCat']='政大';
            }
            else if(isset($_POST['start2'])){
  						$_SESSION['questionCat']='娛樂';
  					}
  					else if(isset($_POST['start3'])){
  						$_SESSION['questionCat']='科普';
  					}          
  					$sql = "SELECT formalID 
  							    FROM formalquestion 
  							    WHERE formalCat='$_SESSION[questionCat]'
  							    AND formalID NOT IN 
                          (SELECT formalID 
  												 FROM answer a,member m 
  												 WHERE memberAccount='$_SESSION[user]' 
  												 AND a.memberID=m.memberID)";
  							  //ORDER BY rand()";
					}
          $result = mysqli_query($link,$sql);
															
					$i=0;
          $numbers=array();
					while($Random = mysqli_fetch_array($result)){
						$numbers[]=$Random["formalID"];
						$i++;
					}

          //sorting by a new way at http://www.myxzy.com/post-356.html
          //$numbers = range (1,20); //将1到20组成一个数组 
          shuffle ($numbers); //对数组进行随机排序

          for($j=0;$j<5;$j++){
            $_SESSION['randomNo'][$j]= $numbers[$j];
          }

					$_SESSION['count_all']=0;
					$_SESSION['count_correct']=0;
					//echo $_SESSION['questionCat']."<br>"."<br>".$_SESSION['randomNo'][0]."<br>".$_SESSION['randomNo'][1]."<br>".$_SESSION['randomNo'][2]."<br>".$_SESSION['randomNo'][3]."<br>".$_SESSION['randomNo'][4];
					header("refresh:0.5 ; url = game.php");
					//header("Location: game.php");
				}
			}
		 ?>
          </ul>


         <!--  <form class="navbar-form navbar-right" >
            <div class="form-group">
              <input type="text"  placeholder="E-mail" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">登入</button>
          <button type="button" class="btn btn-success" onclick="location.href='login.php'">註冊</button>-->
			
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
        <br>
		 <br>
		  <br>
		   <br>
        <h1>政大知識王</h1>
        <p>This game system is create by NCCU ADB Group 10. Enjoy it!</p>
        <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->

	  
	  <form method='POST' action=''>
      <div class="row">
        <div class="col-md-3">
            <div class="jumbotron">
             <p>類別一</p>
               <p><h2>政大</h2></p>
              <p><input type='submit' class='btn btn-primary btn-lg btn-default' value='開始遊戲' name='start1'></p>
            </div>

        </div>
        <div class="col-md-3">
            <div class="jumbotron">
             <p>類別二</p>
               <p><h2>娛樂</h2></p>
              <p><input type='submit' class='btn btn-primary btn-lg btn-success' value='開始遊戲' name='start2'></p>
            </div>

       </div>
    
        <div class="col-md-3">
            <div class="jumbotron">
             <p>類別三</p>
               <p><h2>科普</h2></p>
              <p><input type='submit' class='btn btn-primary btn-lg btn-warning' value='開始遊戲' name='start3'></p>
            </div>

        </div>
        <div class="col-md-3">
            <div class="jumbotron">
             <p>類別四</p>
               <p><h2>綜合</h2></p>
              <p><input type='submit' class='btn btn-primary btn-lg btn-danger' value='開始遊戲' name='start4'></p>
            </div>

       </div>
     </div>
	 </form>

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
