
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
	if(isset($_SESSION['user'])){
		$acc = $_SESSION['user'];
		$com = "SELECT * FROM member WHERE memberAccount = '$acc'";
		$result =mysqli_query($link,$com);
		$row = mysqli_fetch_array($result);
		$oriemail =$row[1];
		//$oripass = $row[2];
		$oriName = $row[4];
		
		}
	if (isset($_POST["Name_modify"])){
		if(isset($_POST['pwd_modify']) && !empty($_POST['pwd_modify'])){
		if($_POST["pwd_modify"] == $_POST["pwd_modify2"]){
			$newName= $_POST["Name_modify"];
			$newpwd = $_POST["pwd_modify2"];
			$sql_update = "Update member Set memberName = '$newName', memberPwd = '$newpwd' WHERE memberAccount = '$acc'";
			$result1 =mysqli_query($link,$sql_update);
			echo '<meta http-equiv="refresh" content="0;url=datachange.php">';
		}
	    else{ echo '<meta http-equiv="refresh" content="0;url=error.php">';	
		}
	}else{ echo '<meta http-equiv="refresh" content="0;url=error.php">';	}
	}
	mysqli_close($link);	
	}
	
	
	?>
  <div class="jumbotron">
      <div class="container">
        <h1>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 個人頁面
		</h1>
        <p>姓名:<?php if(isset($_SESSION['user'])){ echo $oriName; }
		else {echo "你還沒登入喔";} ?></p><br>
		<p>帳號:<?php if(isset($_SESSION['user'])){ echo $oriemail; }
		else {echo "你還沒登入喔";} ?></p><br>
		</div>
    </div>
   
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
			<li class="active"><a href="memberdata.php">個人成就 & 個人資料</a></li>
            
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

    

     

    <div class="container">
        <form method="POST">

          <div class="col-lg-3">

           <img class="img-circle" src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/1002643_738474766162883_2017843211_n.jpg?oh=5be4df3065752dafc67388200efef3f1&oe=5576A1EA&__gda__=1438253125_5ee79c005ad24368fcce52088311e6e2" width="140" height="140">
            
            <input type="file" id="exampleInputFile">
          </div>  


          <div class="col-lg-6">
           <h3>姓名:</h3> <input value = "<?php if(isset($_SESSION['user'])){ echo $oriName; }
		else {echo "你還沒登入喔";} ?>"  name="Name_modify" class="form-control" placeholder="Text input">

           

           <h3>密碼修改</h3>
            <input type="password" name="pwd_modify" class="form-control" id="exampleInputPassword1" placeholder="Password" >

           <h3>再次確認</h3>
            <input type="password" name="pwd_modify2" class="form-control" id="exampleInputPassword1" placeholder="Password" >

           <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">修改</button>

          </div>

          </form>
             

        <div class="col-lg-10">
              <hr>

			<table class="table table-striped">
                    
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
                    
					$sql = "SELECT * FROM member
							WHERE memberAccount = '$_SESSION[user]' LIMIT 1";
					$result =mysqli_query($link,$sql);
					$member=mysqli_fetch_assoc($result);
					
					$sql = "SELECT COUNT(*) FROM answer, member 
							WHERE answer.memberID = member.memberID 
							AND memberAccount = '$_SESSION[user]'";
					$result =mysqli_query($link,$sql);
					$total=mysqli_fetch_array($result);
					
					
					echo "<tbody>";
					
					echo "<tr><td><h3><span class='glyphicon glyphicon-search' aria-hidden='true'> 總答對題數</h3></td><td><h3>".$totalcorrect[0]."</h3></td>";
					echo "<tr><td><h3><span class='glyphicon glyphicon-search' aria-hidden='true'> 總答題數</h3></td><td><h3>".$total[0]."</h3></td></tr>";	
					//echo "</tr><td>答題正確率</td><td>".$totalcorrect[0]/$total[0]."</td>";
					echo "<tr><td ROWSPAN=3><h3><span class='glyphicon glyphicon-headphones' aria-hidden='true'> 求救數量</h3></td>";
					echo "<td><h3>刪去法</td><td><h3>".$member['memberRes1']."</td></tr>";
					echo "<tr><td><h3>玩家答案</td><td><h3>".$member['memberRes2']."</td></tr>";
					echo "<tr><td><h3>跳過</td><td><h3>".$member['memberRes3']."</td></tr>";
					echo "<tr><td><h3><span class='glyphicon glyphicon-sunglasses' aria-hidden='true'> 累積成就</h3></td><td></td><td></td></tr>";
					
					$sql = "SELECT * FROM achievement
							WHERE achID IN (SELECT achID FROM memberach a,member m 
											WHERE memberAccount='$_SESSION[user]' 
											AND a.memberID=m.memberID)";
					$result =mysqli_query($link,$sql);
					
					while($ach=mysqli_fetch_array($result)){
						echo "<td></td><td><h3>".$ach['achName']."</td><td valign='center'>".$ach['achDesc']."</td></tr>"; 
					}
					
                    echo "</tbody>";
				  }
				?>
				
			</table>
         </div>






  </div>

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
