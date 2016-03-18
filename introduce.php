
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
            <li><a href="rank.php">玩家排名</a></li>
            <li class="active"><a href="introduce.php">工人介紹</a></li>
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
        <h1>關於我們的TEAM</h1>
        <p>Say "Hi" to everyone!</p>
      </div>
    </div>


<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        

        <div class="col-lg-4">
          <img class="img-circle" src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/1002643_738474766162883_2017843211_n.jpg?oh=5be4df3065752dafc67388200efef3f1&oe=5576A1EA&__gda__=1438253125_5ee79c005ad24368fcce52088311e6e2" width="140" height="140">
          <h2>CEO</h2>
          <p>麥兜</p>
        </div><!-- /.col-lg-4 -->


        <div class="col-lg-4">
          <img class="img-circle" src="https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/11082574_876461802411841_500561931727430650_n.jpg?oh=8cb1c3247dc8a707d7d4163a7a1c4129&oe=55AFAC53&__gda__=1437216200_95185267c32bbed6bf30672c3b7257f9" width="140" height="140">
          <h2>DESIGNER</h2>
          <p>WADE CHEN</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="https://scontent-sjc.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/483572_446414978753201_257377145_n.jpg?oh=0f7363e9d2adefa8aa6c665c456e93b7&oe=5573001E" width="140" height="140">
          <h2>Product Manager</h2>
          <p>張良碩</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/v/t1.0-1/10404302_846800555340818_6533769880218544257_n.jpg?oh=07751c4318de64aa4d7cc8020b009d12&oe=55AC1BA6&__gda__=1433986412_9994cff479e76a491e54324084670c7f" width="140" height="140">
          <h2>HACKER</h2>
          <p>Lili</p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
          <img class="img-circle" src="https://scontent-sjc.xx.fbcdn.net/hphotos-frc3/v/t1.0-9/547404_567098069998316_1543025190_n.jpg?oh=312ab41a94e0b8bc91563bdc1486695b&oe=55A98C70" width="140" height="140">
          <h2>MARKETING</h2>
          <p>彭彭</p>
        </div><!-- /.col-lg-4 -->


        <div class="col-lg-4">
          <img class="img-circle" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/v/t1.0-1/10616583_769754396423726_5204733917190938381_n.jpg?oh=bfcfa0db026b12d97a216161dfc4e45f&oe=55721F8E&__gda__=1437617476_61ac88f2f15f708b936f84b7319e0e2c" width="140" height="140">
          <h2>CODER</h2>
          <p>蔡耀賢</p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->
    
   


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>© 2014 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>

    </div>


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
