
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
            <li><a href="introduce.php">工人介紹</a></li>
			<?php if(isset($_SESSION['user'])){ echo '<li><a href="memberdata.php">個人成就 & 個人資料</a></li>'; }
		else {echo '';} ?>
            
			<?php if(isset($_SESSION['user'])){ echo '<li ><a href="logout.php">登出</a></li>'; }
		else {echo '';} ?>
		<?php if(isset($_SESSION['user']) && $_SESSION['user'] =="admin@admin"){ echo '<li><a href= "selectq.php ">管理介面</a></li>'; }
		else {echo '';} ?>
			<li ><a><?php if(isset($_SESSION['user'])){ echo $_SESSION['user']; }
		else {echo "";} ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="jumbotron">
      <div class="container">
        <h1>貢獻你的題目</h1>
        <p>新奇、好玩、特別</p>
      </div>
    </div>
    <div class="container">
       
   
        <form action="addq.php" method="POST">
            <h3><span class="glyphicon glyphicon-search" aria-hidden="true">題目</span></h3>
            <input name ="ques" type="text" class="form-control" placeholder="Text input" required >
            <h3><span class="glyphicon glyphicon-search" aria-hidden="true">答案選項</span></h3>
            <div class="jumbotron">
              <div class="container">
                    <p>選項 Ａ：</p><input name="ans1" type="text" class="form-control" placeholder="Text input" required >
                    <p>選項 Ｂ：</p><input name="ans2"type="text" class="form-control" placeholder="Text input" required>
                    <p>選項 Ｃ：</p><input name="ans3"type="text" class="form-control" placeholder="Text input" required>
                    <p>選項 Ｄ：</p><input name="ans4"type="text" class="form-control" placeholder="Text input" required>
              </div>
            </div>
            <h3><span class="glyphicon glyphicon-search" aria-hidden="true">正解</span></h3>
              <select  name ="ans_correct"class="form-control">
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
              </select>
            <h3><span class="glyphicon glyphicon-search" aria-hidden="true"><p>解釋</p></span></h3>
			<input name="cat" type="text" class="form-control" placeholder="Text input" required>

            <br>
          <center><button name="add" type="submit" class="btn btn-sucess">ADD</button></center>
          </form>
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



    <?php
  
    $pass = '';//密碼要記得改
  $dbname = 'nccuknowledge';
  $link = @mysqli_connect('localhost','root',$pass ,$dbname);

  if (!mysqli_select_db($link, $dbname) )
      die("無法開 $dbname 資料庫!<br/>");
  else{



      //$memberid= $_POST["ans2"];
      //$question=  $_POST['ques'];
      //$ans1=  $_POST['ans1'];
      //$ans2=  $_POST['ans2'];
      //$ans3=  $_POST['ans3'];
      //$ans4=  $_POST['ans4'];
      //$ans_correct=  $_POST['ans_correct'];
      //$cat = $_POST['cat'];

      //var_dump($_POST);

      mysqli_query($link, 'SET CHARACTER SET utf8');
      mysqli_query($link, "SET collaction = 'urf8_general_ci'");
      mysqli_query($link, 'SET NAMES utf8');
      mysqli_query($link, 'SET CHARTACTER_SET_CLIENT=utf8');
      mysqli_query($link, 'SET CHARACTER_SET_RESULT=utf8');

      $account = $_SESSION['user'];
      $check = "SELECT memberID FROM member WHERE memberAccount = '$account'";
      $chechresult= mysqli_query($link,$check);
      $checkdata = mysqli_fetch_array($chechresult);
      $ID = $checkdata[0];

      if (isset($_POST['add'])) {
    	    $question=  $_POST['ques'];
          $ans1=  $_POST['ans1'];
          $ans2=  $_POST['ans2'];
          $ans3=  $_POST['ans3'];
          $ans4=  $_POST['ans4'];
          $ans_correct=  $_POST['ans_correct'];
          $cat = $_POST['cat'];

           if (count($_POST) > 0) {
            foreach ($_POST as $k=>$v) {
                unset($_POST[$k]);
              }
             echo'<center><div class="alert alert-success" role="alert">新增成功</div></center>';            
			  
            }
			   // insert data
               $sql="INSERT INTO `nccuknowledge`.`tempquestion` (`tempID`, `memberID`, `tempQues`, `tempAns`, `tempCat`, `tempAns1`, `tempAns2`, `tempAns3`, `tempAns4`) VALUES (NULL, '$ID', '$question', '$ans_correct','$cat','$ans1','$ans2', '$ans3', '$ans4');";
               $result =mysqli_query($link,$sql);

               $show = 1 ;
			   
			   echo '<meta http-equiv="refresh" content="3;url=addq.php">';
			  
              mysqli_close($link);  
          }
              
  }?>


  </body>
</html>
