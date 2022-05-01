<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!--以IE瀏覽器相容模式來顯示，預設為微軟最新的edge瀏覽模式來顯示-->
	<meta name="viewport" content="width-device-width, initial-scale-1">
	<!--網頁寬度設定為行動裝置的螢幕寬度且縮放比例為1:1-->
	<title>登入</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--bootstrap核心 CSS 檔案-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!--bootstrap佈景主題 CSS 檔案-->
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--jquery核心檔案-->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--jquery核心 js 檔案-->
	
	<style>
		.panel-body{
			position:absolute;
			left:50%;
			top:50%;
			border-radius:10px;
			width:300px;
			height:450px;
			margin-left:-150px;
			margin-top:-200px;
			background-color:white;
		}
		  .btn{
  margin:3px !important;
}
.game-search{
			margin-top:6px;
		}
		.menu{

   position:fixed;
   right:0;
   top:90%;
   width:4em;
  }
  .navbar-brand{
			margin-top:-6px;
		}
  
	</style>
</head>
<body align="center">
<header>
		<nav class="navbar navbar-inverse navbar-fixed-top bg-dark" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="homepage.php" class="navbar-brand"><img src="../images/1.png" alt="" width="40" height="35"></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">導覽按鈕</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav" >
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								商品<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="list.php?list=PS5">PS5</a></li>
								<li><a href="list.php?list=PS4">PS4</a></li>
								<li><a href="list.php?list=NS">NS</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								選單<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="rank.php?down=down">價格高到低</a></li>
									<li><a href="rank.php?add=add">價格低到高</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right" >
						<li class="game-search">
							<form method="POST">
								<input type="search" name="game" id="game" class="form-control" placeholder="搜尋遊戲">
								<span class="glyphicon glyphicon-search form-control-feedback"></span><!--查詢-->
							</form>
						</li>			
						<li><a href="shop.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>	<!--購物車-->
						<li><a href="user.php"><span class="glyphicon glyphicon-user"></span></a></li>				<!--個人資料-->
						<?php
			session_start(); 
			if($_SESSION['success']!="")
			{
				echo "<li class='dropdown'>";
       echo "<a href='homepage.php' class='dropdown-toggle' data-toggle='dropdown'>";
       //顯示名稱                        
        echo "<font color='white'>".$_SESSION["name"]."</font>";                                 
       echo  "<span class='caret'></span>";
       echo "</a>";
       echo "<ul class='dropdown-menu'>";
       echo "<li><a href=homepage.php?lgout=1>登出</a></li>";
        
       echo "</ul>";
       echo "</li>";
			}	
			if($_GET['lgout']==1)
				{
					unset($_SESSION['success']);
					echo"<script>alert('登出成功')</script>";
					echo"<script>window.location.href='homepage.php'</script>";
				}				
			?> 
					</ul>	
				
				</div>
			</div>	
			
		</nav>
		 	
	</header>
	<main class="form-signin">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" method="POST">	
					<img src="../images/1.png" alt="" width="80" height="70">
					<h1>請註冊</h1>
					<br>
					<input type="text" class="form-control" name="name" placeholder="使用者名稱" required autofocus>
					<br>
						<input type="text" class="form-control"  name="ac" placeholder="帳號" required autofocus>
					<br>
						<input type="password" class="form-control" name="pw" placeholder="密碼" required>
					<br>															
						<div class="btn-group" role="group" >

<button class=" btn btn-lg  btn-primary" name="rg" value="註冊" type="submit">註冊</button>
	</div>
			</div>
		</div>
	</div>
	<?php
$hn="localhost";
$db="game";
$un="test";
$pw="123";

/*$hn="127.0.0.1";
$db="game";
$un="root";
$pw="ncutm514";*/
$db_link = @mysqli_connect($hn,$un,$pw,$db);
		
					if($_POST['name']!=""&&$_POST['ac']!=""&&$_POST['pw']!=""&&$_POST['rg']=="註冊")
					{
						$insert="INSERT INTO `user` (`name`, `ac`, `pw`,`authority`) VALUES ('".$_POST['name']."', 
							'".$_POST['ac']."', '".$_POST['pw']."', '使用者')";
							$result = mysqli_query($db_link, $insert);
						$_POST['rg']="";
						echo"<script>alert('註冊成功')</script>";
					    echo"<script>window.location.href='signin.php'</script>";
					}
	
				
					mysqli_close($db_link);		
		

	
?>
	</main>
</body>
</html>