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
	</style>
</head>
<body align="center">
<header>
		<nav class="navbar navbar-inverse navbar-fixed-top bg-dark" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="admin.php" class="navbar-brand"><img src="../images/1.png" alt="" width="40" height="35"></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">導覽按鈕</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav" >
						<!--<li class="dropdown">
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
								<li><a href="rank.php?sale=salehigh">熱銷高到低</a></li>
							</ul>
						</li>-->
						<li><a href="insert.php">新增產品</a></li>
						<li><a href="mge.php">訂單管理</a></li>
							<li><a href="mebmge.php">查詢會員</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right" >
					<li class="logout">
						
							<?php
						 session_start();
							echo "<li class='dropdown'>";
							echo "<a href='homepage.php' class='dropdown-toggle' data-toggle='dropdown'>";
							   //顯示名稱                        
						    echo "<font color='white'>admin</font>";                                 
							echo  "<span class='caret'></span>";
							echo "</a>";
							echo "<ul class='dropdown-menu'>";
							echo "<li><a href=admin.php?lgout=1>登出</a></li>";	
							echo "</ul>";
							echo "</li>";	
						if($_GET['lgout'])
						{
							echo"<script>alert('登出成功')</script>";
								echo"<script>window.location.href='homepage.php'</script>";
						}
						
						?>
						</li>		
					</ul>	
				
				</div>
			</div>	
			
		</nav>
		 	
	</header>
	<main class="form-signin">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data">	
					<h1>新增產品</h1>
					<br>
					<input type="text" class="form-control" name="product" placeholder="產品名稱" required autofocus>
					<br>
						<input type="text" class="form-control"  name="price" placeholder="價格" required autofocus>
					<br>
						<input type="text" class="form-control" name="quantity" placeholder="數量" required>
					<br>	
						<input type="file" class="form-control" name="images" placeholder="圖片位置"  required>					
						<div class="btn-group" role="group" >
						<p></p>
			<button class="w-50 btn btn-lg btn-default btn-primary" name="insert" value="新增" type="submit">新增</button></form>
	</div>
	
			</div>
		</div>
	</div>
	 <?php
  session_start();
$hn="localhost";
$db="game";
$un="linda";
$pw="456";

/*$hn="127.0.0.1";
$db="game";
$un="root";
$pw="ncutm514";*/
$db_link = @mysqli_connect($hn,$un,$pw,$db);
if($_FILES)
{
	$name=$_FILES["images"]["name"];
	move_uploaded_file($_FILES["images"]["tmp_name"],$name);
	$_SESSION['images']=$name;
}
	if($_POST['insert']=="新增")
	{
		$insert="INSERT INTO `product`(`product`, `price`, `quantity`, `images`) 
		VALUES ('".$_POST['product']."','".$_POST['price']."',".$_POST['quantity'].",'../images/".$_SESSION['images']."')";
										$result = mysqli_query($db_link, $insert);
										echo"<script>alert('新增成功')</script>";
										echo"<script>window.location.href='admin.php'</script>";
	
	}
	
mysqli_close($db_link);
?>
</main>
</body>
</html>